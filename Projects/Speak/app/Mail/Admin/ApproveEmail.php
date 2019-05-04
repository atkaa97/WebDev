<?php

namespace App\Mail\Admin;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApproveEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /** @var User */
    protected $_user;

    /** @var string */
    protected $_password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $password)
    {
        $this->_user = $user;
        $this->_password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.registrations.approve', ['user' => $this->_user, 'password' => $this->_password]);
    }
}
