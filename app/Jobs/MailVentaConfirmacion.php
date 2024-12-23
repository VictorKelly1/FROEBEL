<?php

namespace App\Jobs;

use App\Mail\VentaConfirmacion;
use App\Models\Contacto;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MailConfirmacion implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $InfoMail;
    public $Contacto;

    public function __construct($InfoMail)
    {
        $this->InfoMail = $InfoMail;
    }

    public function handle()
    {
        $Contacto = Contacto::where('idReceptor', $this->InfoMail->first()->idPersona)
            ->where('TipoContacto', 'Email')
            ->first();
        Mail::to($Contacto->ValorContacto)->send(new VentaConfirmacion($this->InfoMail, $this->Contacto));
    }
}
