<?php

namespace App\Controllers\Client;


use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Pages\Profile\Profile;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Layouts\Footer;

class ProfileController
{
    // hiển thị danh sách
    public static function index()
    {
        Header::render();
        Profile::render();
        Footer::render();
    }
}
