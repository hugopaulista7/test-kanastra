<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserImportRequest;
use App\Jobs\FileImportJob;
use App\Models\ImportedFile;
use App\Repositories\ImportedFileRepository;

class UsersController extends Controller
{

    public function import(UserImportRequest $request)
    {
        $file = $request->file('users');
        if (!$file) {
            return response()->json(['message' => 'File not found!', 400]);
        }

        $imported = new ImportedFile(['name' => $file->getClientOriginalName()]);
        $imported->save();

        $storedFile = $file->store('csv', 'public');
        dispatch(new FileImportJob('public/storage/' . $storedFile))->onQueue('import');
        return response()->json(['message' => 'Importing file', 'name' => $imported->name], 200);

    }
}
