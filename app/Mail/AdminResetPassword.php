<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    protected $data = [];
    public function __construct($data=[])
    {
        $this->data = $data;
    }
    public function build()
    {
        return $this->markdown('admin-panel.emails.admin_reset_password')->subject('Reset Admin Account')->with('data',$this->data);
    }
}
