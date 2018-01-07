<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\schuldetails;
use App\schulen;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class CreateSchulcode extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $schulID;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($schulID)
    {
        $this->schulID = $schulID;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $schulID = $this->schulID;
        $schule = schulen::findOrFail($schulID);

        $schule->schulcode = str_random(8);
        $schule->schulcode_expire = Carbon::now()->addMonths(2);
        $schule->save();
        Mail::queue(['mail.schulcode', 'mail.schulcode_text'], ['schule' => $schule], function ($m) use ($schule) {
	        $m->to($schule->details->mail);
	        $m->subject('Neuer Schulcode für Schul-O-Mat');
        });
    }
}
