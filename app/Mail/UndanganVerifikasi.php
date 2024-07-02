<?php

namespace App\Mail;

use App\Models\prosestender;
use App\Models\undanganklarifikasi;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UndanganVerifikasi extends Mailable
{
    use Queueable, SerializesModels;
    public $prosestender;
    public $undangan;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(prosestender $prosestender, undanganklarifikasi $undangan)
    {
        $this->prosestender = $prosestender; 
        $this->undangan = $undangan;
    }   

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('kotakmasuk.verifmail')
        ->with([
            'prosestender' => $this->prosestender,
            'undangan' => $this->undangan,
        ]);
    }
}
