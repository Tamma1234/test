<?php

namespace App\Service;

use Illuminate\Support\Facades\Mail;

class SendMailService
{
    public function sendPaymentMail($email, $first_name, $last_name, $phone_number, $password)
    {
        Mail::send('admin.auth.send-mail', [
            'email' => $email,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'phone_number' => $phone_number,
            'password' => $password
        ], function ($mail) use ($email) {
            $mail->from('thientamjvb@gmail.com');
            $mail->to($email);
            $mail->subject('Thông báo đăng ký tài khoản');
        });
    }
}
