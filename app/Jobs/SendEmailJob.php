<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendEmailTest;
use App\Models\Count;
use Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $batch  =   Count::max('PatchNo');
        $batch  =   (!$batch)?1:$batch+1;
        $range  =   range(1, 1000000);
        foreach($range as $r){
            $newCount   =   new Count();
            $newCount->PatchNo  =   $batch;
            $newCount->currentCount  =   $r;
            $newCount->save();
        }
    }
}

?>
