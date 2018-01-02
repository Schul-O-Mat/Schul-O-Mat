<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\schulen;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;

class CheckSchulcode extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels, DispatchesJobs;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $schulen = schulen::all();
        foreach ($schulen as $schule) {
            if (Carbon::createFromFormat('Y-m-d H:i:s', $schule->schulcode_expire)->isPast() && config('app.env') == 'mailtest') {
                dispatch(new CreateSchulcode($schule->id));
            }
        }
    }
}
