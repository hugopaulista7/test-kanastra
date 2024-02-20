<?php

namespace App\Http\Controllers;

use App\Models\ImportedFile;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function index()
    {
        $files = ImportedFile::all();

        return response()->json(['files' => $files], 200);
    }
}
