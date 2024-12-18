<?php

namespace App\Jobs;

use App\Mail\ComunicadoPersonal;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MailPersonal implements ShouldQueue
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $InfoMail;
    public $Contacto;

    public function __construct($InfoMail)
    {
        $this->InfoMail = $InfoMail;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        $Contacto = $this->InfoMail->first()->Destinatarios . '@froebel.edu.mx';
        Mail::to($Contacto)->send(new ComunicadoPersonal($this->InfoMail));
    }
}
