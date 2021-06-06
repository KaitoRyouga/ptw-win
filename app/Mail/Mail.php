<?php
namespace App\Mail;

use App\Interfaces\Notification;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Mail implements Notification{
    public function send(){
        $mail = new PHPMailer(true);
    }
}