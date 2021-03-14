<?php

namespace App\Console\Commands;

use App\Mail\FinishProcessEmail;
use App\Models\File;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CheckFileStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file:check-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $files = File::where('status', 'PROCESSING')->get();
        foreach ($files as $file){
            Log::debug('notificando');
            Log::debug($file->user->email);
            //Mail::to($file->user->email)->send(new FinishProcessEmail());
            Mail::to('diego0123@gmail.com')->send(new \App\Mail\FinishProcessEmail());
        }
    }
}
