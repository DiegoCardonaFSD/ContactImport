<?php

namespace App\Jobs;

use App\Mail\FinishProcessEmail;
use App\Models\File;
use App\Models\User;
use App\Notifications\FileProcessFinished;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NotifyUserOfCompletedImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var User  */
    private User $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $files = File::where('status', 'PROCESSING')->get();
        $files->each(function ($file){
           if($file->contacts->count() > 0){
               $file->status = 'FINISHED';
           }elseif($file->failedContacts->count() > 0 && $file->contacts->count() == 0){
                $file->status = 'FAILED';
            }
            $file->save();
            Mail::to($file->user->email)->send(new FinishProcessEmail(['url' => route('contacts-import.index')]));
        });

    }
}
