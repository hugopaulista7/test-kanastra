<?php

namespace App\Jobs;

use App\Mail\UserCreated;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private array $rowData, private array $fieldMap)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $user = new User(
                [
                    'email' => $this->rowData[$this->fieldMap['email']],
                    'name' => $this->rowData[$this->fieldMap['name']],
                    'governmentId' => $this->rowData[$this->fieldMap['governmentId']],
                    'debtAmount' => $this->rowData[$this->fieldMap['debtAmount']],
                    'debtDueDate' => $this->rowData[$this->fieldMap['debtDueDate']],
                    'debtId' => $this->rowData[$this->fieldMap['debtId'] ?? $this->fieldMap['debtID']]
                ]
            );

            $user->save();
            Log::info($user, $this->fieldMap);
            Mail::to($user)->queue((new UserCreated($user))->onQueue('emails'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Log::info(json_encode($this->rowData));
            Log::info($this->fieldMap);
        }
    }
}
