<?php
namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;

class Controller
{
    protected $mail;
    public function __construct()
    {
        session_start();
    }

    public function mailInit()
    {
        $this->mail = null;

        $this->mail = new PHPMailer(true);

        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'ignmontvydas@gmail.com'; // SMTP username
        $this->mail->Password = 'dvxsihggslhmyksn'; // SMTP password
        $this->mail->SMTPSecure = 'tls'; // Enable TLS encryption
        $this->mail->Port = 587; // TCP port connect

        $this->mail->setFrom('ignmontvydas@gmail.com');
        $this->mail->isHTML(true);
    }
}
