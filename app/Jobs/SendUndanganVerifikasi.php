<?php

namespace App\Jobs;

use App\Mail\UndanganVerifikasi;
use App\Models\prosestender;
use App\Models\undanganklarifikasi;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendUndanganVerifikasi implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $prosestenderId;
    protected $undanganId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $prosestenderId, $undangan)
    {
        $this->email = $email;
        $this->prosestenderId = $prosestenderId;
        $this->undanganId = $undangan->id; // Assuming you want to pass the ID of the undanganverifikasi record
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $prosestender = prosestender::findOrFail($this->prosestenderId);
        $undangan = undanganklarifikasi::findOrFail($this->undanganId);

        Mail::to($this->email)->send(new UndanganVerifikasi($prosestender, $undangan));
    }
}
