<?php

namespace App\Helpers;

use App\Models\Source\SourceEmail;


class AppHelper
{

    public static function setMailConfig($email)
    {
        $settings = SourceEmail::where('email_id',$email)->first(); 
        $mailConfig = [
            'transport' => 'smtp',
            'host' => $settings->mail_host,
            'port' => '587',
            'encryption' => 'tls',
            'MAIL_ENCRYPTION' => null,
            'username' => $settings['user_name'],
            'password' => $settings['password'],
            'timeout' => null
        ];
        config(['mail.mailers.smtp' => $mailConfig]);
    }
}