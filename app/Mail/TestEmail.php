<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @param array $data
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = config('mail.from.address', 'tecmunity@gmail.com');
        $name = config('mail.from.name', 'TecMunity');
        $subject = 'Verificación de correo electrónico';
        $imagePath = public_path('img/Tecmunity_Logo.png'); // Ajusta según tu estructura de archivos

        return $this->view('emails.test')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([
                        'test_message' => $this->data['message'],
                        'verification_link' => $this->data['verification_link'],
                    ])
                    ->attach($imagePath, [
                        'as' => 'tec-munity-logo.png',
                        'mime' => 'image/png',
                    ]);
    }
}
?>
