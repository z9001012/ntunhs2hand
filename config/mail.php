<?php

return [


    'driver' => 'smtp',

    'host' => env('MAIL_HOST', 'smtp.gmail.com'),

    'port' => 587,


    'from' => ['address' => "z9001012@gmail.com", 'name' => "國北護二手書系統"],

    'encryption' => env('MAIL_ENCRYPTION', 'tls'),

    'username' => env('MAIL_USERNAME'),


    'password' => env('MAIL_PASSWORD'),

    'sendmail' => '/usr/sbin/sendmail -bs',


    'pretend' => false,

];
