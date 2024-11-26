<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Pages\Order\Index;
use App\Views\Client\Layouts\Header;

class OrderController
{
    // hiển thị danh sách
    public static function index()
    {

        $category = new Category();
        $categories = $category->getAllCategoryByStatus();


        $curl = curl_init();

        // Cấu hình cURL
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://bio.ziller.vn/api/qr/add",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 2,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer fdee16f4e42554c44fefba77ef1d733d",
                "Content-Type: application/json",
            ),
            CURLOPT_POSTFIELDS => json_encode(array(
                'type' => 'text',
                'data' => '2|99|0364402449|LE THI HUYNH NHU||0|0|50000|Thanh toán đơn hàng #123456|transfer_myqr',
                'background' => 'rgb(255,255,255)',
                'foreground' => 'rgb(0,0,0)',
                'logo' => 'https://firebasestorage.googleapis.com/v0/b/vuejs-cb0f7.appspot.com/o/logo.png?alt=media&token=6e90a4aa-c58a-4816-a2aa-e2d7fa239ffd',
            )),
        ));

        // Thực hiện yêu cầu cURL
        $response = curl_exec($curl);
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); // Lấy mã trạng thái HTTP

        // Kiểm tra lỗi cURL
        if ($response === false) {
            $errorMessage = curl_error($curl); // Lấy thông báo lỗi
            echo "Lỗi cURL: " . $errorMessage;
        } else {
            // Kiểm tra mã trạng thái HTTP
            if ($statusCode == 200) {
                // Dữ liệu trả về hợp lệ
                $qrData = json_decode($response, true); // Giải mã JSON
                // echo "<pre>";
                // var_dump($qrData); // Hiển thị dữ liệu trả về từ API để kiểm tra
                // echo "</pre>";

                if (isset($qrData['link'])) {
                    $qrImage = $qrData['link']; // Lấy đường dẫn đến mã QR
                } else {
                    $qrImage = null;
                    $errorMessage = "Không tìm thấy mã QR trong phản hồi từ API.";
                }
            } else {
                // Xử lý lỗi nếu API không trả về kết quả thành công
                $qrImage = null;
                $errorMessage = "Lỗi khi tạo mã QR. HTTP Status: " . $statusCode;
            }
        }

        // Dữ liệu đơn hàng giả định
        $orders = [
            [
                'id' => 1,
                'name' => 'Áo Hoodie Xám',
                'price' => 400000,
                'image' => 'item1.jpg',
                'status' => 1,
                'size' => 'M',
                'quantity' => 1
            ],
            [
                'id' => 2,
                'name' => 'Áo Hoodie Đen',
                'price' => 450000,
                'image' => 'item2.jpg',
                'status' => 1,
                'size' => 'L',
                'quantity' => 2
            ]
        ];

        // Dữ liệu để render giao diện
        $data = [
            'orders' => $orders,
            'qrImage' => $qrImage ?? null, // Truyền dữ liệu mã QR nếu có
            'errorMessage' => $errorMessage ?? null, // Truyền thông báo lỗi nếu có
            'categories' => $categories
        ];

        // Render giao diện
        Header::render(); // Hiển thị header
        Index::render($data); // Render trang đơn hàng với dữ liệu
        Footer::render(); // Hiển thị footer
    }
}
