<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\UndanganEmail;
use App\Models\jadwal;
use App\Models\nontender;

class SendUndanganEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $email;
    protected $nontender;
    protected $jadwal;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $nontender, $jadwal)
    {
        $this->email = $email;
        $this->jadwal = $jadwal;
        $this->nontender = $nontender;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Mengambil data undangan dari database berdasarkan ID
        $undanganData = nontender::findOrFail($this->nontender);
        $jadwal = jadwal::where('id_paket', $undanganData->id_paket)->get();
        // Kirim email menggunakan Mail facade
        Mail::to($this->email)->send(new UndanganEmail($undanganData, $jadwal));
    }
}
