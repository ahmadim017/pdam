<?php

namespace App\Mail;

use App\Models\jadwal;
use App\Models\nontender;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UndanganEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $nontender;
    public $jadwal;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(nontender $nontender, $jadwal) // Terima parameter Undangan
    {
        $this->nontender = $nontender; // Simpan data undangan ke dalam properti
        $this->jadwal = $jadwal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    return $this->view('kotakmasuk.mail')
                ->with([
                    'nontender' => $this->nontender,
                    'jadwal' => $this->jadwal
                ]);
    }
}
