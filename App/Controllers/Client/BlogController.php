<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Pages\Blog\Index;
use App\Views\Client\Layouts\Header;

class BlogController
{
    // hiển thị danh sách
    public static function index()
    {
        $blogs = [
            [
                'image' => 'blog1.jpg',
                'title' => '10 lý do để giúp đỡ bất kỳ loài động vật nào',
                'content' => 'Cốt lõi trong hoạt động của chúng tôi là ý tưởng rằng các thành phố là vườn ươm của
                        những thành tựu lớn nhất của chúng ta và niềm hy vọng tốt đẹp nhất cho một tương lai bền vững.'
            ],
            [
                'image' => 'blog2.jpg',
                'title' => 'Cách để nhận biết thú cưng của bạn đang đói',
                'content' => 'Cốt lõi trong hoạt động của chúng tôi là ý tưởng rằng các thành phố là vườn ươm của
                            những thành tựu lớn nhất của chúng ta và niềm hy vọng tốt đẹp nhất cho một tương lai bền vững.'
            ],
            [
                'image' => 'blog3.jpg',
                'title' => 'Ngôi Nhà Tốt Nhất Cho Thú Cưng Của Bạn',
                'content' => 'Cốt lõi trong hoạt động của chúng tôi là ý tưởng rằng các thành phố là vườn ươm của
                                những thành tựu lớn nhất của chúng ta và niềm hy vọng tốt đẹp nhất cho một tương lai bền vững.'
            ],
            
        ];
        $data = [
            'blogs' => $blogs,
        ];
        Header::render();
        Index::render($data);
        Footer::render();
    }
}
