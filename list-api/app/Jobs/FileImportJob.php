<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FileImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 1200;

    /**
     * Create a new job instance.
     */
    public function __construct(private string $file)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $fieldMap = [
            'name' => 0,
            'governmentId' => 1,
            'email' => 2,
            'debtAmount' => 3,
            'debtDueDate' => 4,
            'debtId' => 5
        ];

        $fileStream = fopen($this->file, 'r');

        $skipHeader = true;
        while (($row = fgetcsv($fileStream)) !== false) {
            if ($skipHeader) {
                $skipHeader = false;
                continue;
            }
            dispatch(new UserImportJob($row, $fieldMap))->onQueue('userImport');
        }

        fclose($fileStream);

        unlink($this->file);
    }
}
