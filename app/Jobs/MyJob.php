<?php

namespace App\Jobs;

use App\Models\Count;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
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
