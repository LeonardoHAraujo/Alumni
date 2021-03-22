<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class MfaMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $hash;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $hash)
    {
        $this->user = $user;
        $this->hash = $hash;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Access Authentication');
        $this->to($this->user->email, $this->user->name);

        return $this->view('mail.mailMfa', [
            'user' => $this->user,
            'hash' => $this->hash 
        ]);
    }
}
