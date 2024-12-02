<?php

namespace App\Helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use App\Models\User;

class AuthHelper
{
    public static function register($data)
    {

        $user = new User();

        // Bắt tồn tại username

        $is_exist = $user->getOneUserByUsername($data['username']);

        if ($is_exist) {
            NotificationHelper::error('exits_register', 'Tên đăng nhập đã tồn tại');
            return false;
        }

        $result = $user->createUser($data);

        if ($result) {
            NotificationHelper::success('register', 'Đăng ký thành công');
            return true;
        }

        NotificationHelper::success('register', 'Đăng ký thất bại');
        return false;
    }


    public static function login($data)
    {
        // Kiểm tra có tồn tại username trong databasae => nếu không: thông báo, trả về false
        $user = new User();

        // Bắt tồn tại username

        $is_exist = $user->getOneUserByUsername($data['username']);

        if (!$is_exist) {
            NotificationHelper::error('username', 'Tên đăng nhập không tồn tại');
            return false;
        }

        //Nếu có: kiểm tra password có trùng không => nếu không: thông báo, trả về flase
        // password người dùng nhập: $data['password']
        // password trong cơ sở dữ liệu: $is_exist['password']

        if (!password_verify($data['password'], $is_exist['password'])) {
            NotificationHelper::error('password', 'Mật khẩu không chính xác');
            return false;
        }

        //Nếu có: kiểm tra status == 0 => thông báo, trả về false

        if ($is_exist['status'] == 0) {
            NotificationHelper::error('status', 'Tài khoản đã bị khóa');
            return false;
        }
        //nếu có: kiểm tra remember => lưu session/cookie => thông báo thành công, trả về true

        if ($data['remember']) {
            // lưu cookie, lưu session
            self::updateCookie($is_exist['id']);
        } else {
            //lưu session
            self::updateSession($is_exist['id']);
        }

        NotificationHelper::success('login', 'Đăng nhập thành công');
        return true;
    }

    public static function updateCookie(int $id)
    {
        $user = new User();
        $result = $user->getOneUser($id);

        if ($result) {
            //Chuyển array thành string json để lưu vào cookie user
            $user_data = json_encode($result);

            //lưu cookie
            setcookie('user', $user_data, time() + 3600 * 24 * 30 * 12, '/');

            //lưu session
            $_SESSION['user'] = $result;
        }
    }

    public static function updateSession(int $id)
    {
        $user = new User();
        $result = $user->getOneUser($id);

        if ($result) {
            //lưu session
            $_SESSION['user'] = $result;
        }
    }

    public static function checkLogin(): bool
    {
        if (isset($_COOKIE['user'])) {
            $user = $_COOKIE['user'];
            $user_data = (array) json_decode($user);

            self::updateCookie($user_data['id']);

            // $_SESSION['user'] = (array) $user_data;

            return true;
        }

        if (isset($_SESSION['user'])) {
            self::updateSession($_SESSION['user']['id']);
            return true;
        }

        return false;
    }

    public static function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }

        if (isset($_COOKIE['user'])) {
            setcookie('user', '', time() - 3600 * 24 * 30 * 12, '/');
        }
        // Xóa cookie giỏ hàng
        if (isset($_COOKIE['cart'])) {
            setcookie('cart', '', time() - 3600, '/'); // Xóa cookie giỏ hàng
        }
        // Điều hướng về trang chủ hoặc trang đăng nhập
        header('Location: /login');
        exit();
    }

    public static function edit($id): bool
    {
        if (!self::checkLogin()) {
            NotificationHelper::error('login', 'Vui lòng đăng nhập để xem thông tin');
            return false;
        }

        $data = $_SESSION['user'];
        $user_id = $data['id'];

        if ($user_id != $id) {
            NotificationHelper::error('user_id', 'Không có quyền xem thông tin tài khoản này');
            return false;
        }

        return true;
    }

    public static function update($id, $data)
    {
        $user = new User();
        $result = $user->updateUser($id, $data);

        if (!$result) {
            NotificationHelper::error('update_user', 'Cập nhật thông tin tài khoản thất bại');
            return false;
        }

        if ($_SESSION['user']) {
            self::updateSession($id);
        }

        if ($_COOKIE['user']) {
            self::updateCookie($id);
        }

        NotificationHelper::success('update_user', 'Cập nhật thông tin tài khoản thành công');
        return true;
    }

    public static function changePassword($id, $data)
    {
        $user = new User();
        $result = $user->getOneUser($id);

        if (!$result) {
            NotificationHelper::error('account', 'Tài khoản không tồn tại');
            return false;
        }

        //kiểm tra mật khẩu cũ có trùng khớp với cơ sở dữ liệu không
        if (!password_verify($data['old_password'], $result['password'])) {
            NotificationHelper::error('password_verify', 'Mật khẩu cũ không chính xác');
            return false;
        }

        //Mã hóa mật khẩu trước khi lưu
        $hash_password = password_hash($data['new_password'], PASSWORD_DEFAULT);

        $data_update = [
            'password' => $hash_password,
        ];

        $result_update = $user->updateUser($id, $data_update);

        if ($result_update) {
            if (isset($_COOKIE['user'])) {
                self::updateCookie($id);
            }

            self::updateSession($id);

            NotificationHelper::success('change-password', 'Đổi mật khẩu thành công');
            return true;
        } else {
            NotificationHelper::error('change-password', 'Đổi mật khẩu thất bại');
            return false;
        }
    }

    public static function forgotPassword($data)
    {
        $user = new User();

        $result = $user->getOneUserByUsername($data['username']);

        return $result;
    }

    public static function resetPassword($data)
    {
        $user = new User();

        $result = $user->updateUserByUsernameAndEmail($data);

        return $result;
    }

    public static function middleware()
    {
        // var_dump($_SERVER['REQUEST_URI']);
        $admin = explode('/', $_SERVER['REQUEST_URI']);
        // var_dump($admin);
        $admin = $admin[1];

        if ($admin == 'admin') {
            if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
                NotificationHelper::error('admin', 'Tài khoản này không có quyền truy cập');
                header('location: /login');
                exit;
            }

            if (!isset($_SESSION['user'])) {
                NotificationHelper::error('admin', 'Vui lòng đăng nhập');
                header('location: /login');
                exit;
            }

            if ($_SESSION['user']['role'] != 'admin') {
                NotificationHelper::error('admin', 'Tài khoản này không có quyền truy cập');
                header('location: /login');
                exit;
            }
        }
    }

    public static function sendEmail($to, $name, $message)
    {
        header('Content-Type: text/html; charset=utf-8');
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'phamlyvibes2000@gmail.com';
            $mail->Password   = 'gvvy mbgp ggle kizj';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = '587';

            $mail->setFrom('phamlyvibes2000@gmail.com', 'Waggy');
            $mail->addAddress($to, $name);
            $mail->addReplyTo('phamlyvibes2000@gmail.com', 'Waggy');

            // Content for customer
            $customerBody = "
        <div style='font-family: Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 8px;'>
            <h2 style='color: #DEAD6F;'>Cảm ơn bạn đã liên hệ Waggy!</h2>
            <p>Chúng tôi đã nhận được lời nhắn từ bạn và sẽ phản hồi sớm nhất có thể.</p>
            <div style='padding: 10px; border: 1px solid #DEAD6F; border-radius: 5px; background-color: #fff;'>
                <strong>Lời nhắn của bạn:</strong>
                <p style='font-style: italic; color: #555;'>{$message}</p>
            </div>
            <p style='margin-top: 20px;'>Trân trọng,</p>
            <p><strong>Đội ngũ Waggy</strong></p>
        </div>";
            $mail->isHTML(true);
            $mail->Subject = 'Contact of Waggy';
            $mail->Body = $customerBody;
            $mail->AltBody = "Cảm ơn bạn đã liên hệ! Lời nhắn của bạn: {$message}";
            $mail->send();

            // Content for admin
            $adminBody = "
        <div style='font-family: Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 8px;'>
            <h2 style='color: #DEAD6F;'>Thông tin liên hệ từ khách hàng</h2>
            <div style='padding: 10px; border: 1px solid #DEAD6F; border-radius: 5px; background-color: #fff;'>
                <p><strong>Tên: </strong>{$name}</p>
                <p><strong>Email: </strong>{$to}</p>
                <p><strong>Điện thoại: </strong>{$_POST['phone']}</p>
                <p><strong>Lời nhắn:</strong><br>{$message}</p>
            </div>
        </div>";
            $mail->clearAddresses();
            $mail->addAddress('phamlyvibes2000@gmail.com', 'Waggy Admin');
            $mail->Subject = 'Customer contact information - Waggy';
            $mail->Body = $adminBody;
            $mail->AltBody = "Lời nhắn từ khách hàng: {$name} - {$message}";
            $mail->send();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }


    public static function sendEmailOrder($to, $name, $orderId, $totalAmount, $orderDate, $paymentMethod, $data)
    {
        $details = $data['order_details'];

        // Tạo nội dung chi tiết sản phẩm trong email cho khách hàng
        ob_start();
?>
        <table style="border-collapse: collapse;" border="1">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Kích thước/ Trọng lượng</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($details as $product) : ?>
                    <tr>
                        <td><?= htmlspecialchars($product['product_name']) ?></td>
                        <td><?= htmlspecialchars($product['variant_name']) ?></td>
                        <td><?= number_format($product['price'], 0, ',', '.') ?> VNĐ</td>
                        <td><?= htmlspecialchars($product['quantity']) ?></td>
                        <td><?= number_format($product['price'] * $product['quantity'], 0, ',', '.') ?> VNĐ</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
<?php
        $productTable = ob_get_clean();

        // Tạo nội dung email cho khách hàng
        $body = "
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                color: #333;
                margin: 20px;
                padding: 10px;
            }
            p {
                margin: 10px 0;
            }
            ul {
                list-style: none;
                padding: 0;
                margin: 10px 0;
            }
            li {
                margin-bottom: 8px;
            }
            strong {
                color: #2c3e50;
            }
            .order-details {
                background-color: #f9f9f9;
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 15px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            .table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 15px;
            }
            .table th, .table td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: center;
            }
            .table th {
                background-color: #f2f2f2;
            }
            .footer {
                margin-top: 20px;
                font-style: italic;
                color: #555;
            }
            .footer strong {
                color: #2c3e50;
            }
        </style>
        <p>Kính gửi <strong>$name</strong>,</p>
        <p>Cảm ơn bạn đã đặt hàng tại <strong>Waggy</strong>! Chúng tôi rất vui mừng thông báo rằng đơn hàng của bạn đã được tiếp nhận và đang được xử lý. Dưới đây là thông tin chi tiết về đơn hàng:</p>
        <div class='order-details'>
            <p><strong>Thông tin đơn hàng:</strong></p>
            <ul>
                <li><strong>Mã đơn hàng:</strong> $orderId</li>
                <li><strong>Ngày đặt hàng:</strong> $orderDate</li>
                <li><strong>Phương thức thanh toán:</strong> $paymentMethod</li>
                <li><strong>Trạng thái thanh toán:</strong> Đã thanh toán</li>
                <li><strong>Tổng giá trị đơn hàng:</strong> " . number_format($totalAmount, 0, ',', '.') . " VNĐ</li>
            </ul>
            <h4>Sản phẩm đã đặt</h4>
            $productTable
        </div>
        <p>Chúng tôi sẽ liên hệ lại với bạn ngay khi đơn hàng được xử lý.</p>
        <p class='footer'><strong>Trân trọng,</strong><br>Đội ngũ Waggy</p>
        ";


        // Cấu hình gửi email
        header('Content-Type: text/html; charset=utf-8');
        $mail = new PHPMailer(true);
        try {
            // Cấu hình máy chủ gửi email SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'phamlyvibes2000@gmail.com';
            $mail->Password = 'gvvy mbgp ggle kizj'; // Nên sử dụng biến môi trường hoặc cách bảo mật khác
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Đặt người gửi và người nhận
            $mail->setFrom('phamlyvibes2000@gmail.com', 'Waggy');
            $mail->addAddress($to, $name);
            $mail->addReplyTo('phamlyvibes2000@gmail.com', 'Waggy');

            // Nội dung email cho khách hàng
            $mail->isHTML(true);
            $mail->Subject = 'Order at Waggy';
            $mail->Body = $body;

            // Gửi email đến khách hàng
            $mail->send();

            // Gửi email thông báo đến Admin
            $adminBody = "
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        line-height: 1.6;
                        color: #333;
                        margin: 20px;
                        padding: 10px;
                    }
                    p {
                        margin: 10px 0;
                    }
                    ul {
                        list-style: none;
                        padding: 0;
                        margin: 10px 0;
                    }
                    li {
                        margin-bottom: 8px;
                    }
                    strong {
                        color: #2c3e50;
                    }
                    .admin-details {
                        background-color: #eaf0f8;
                        border: 1px solid #b0c7d7;
                        border-radius: 8px;
                        padding: 15px;
                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                    }
                    .admin-footer {
                        margin-top: 20px;
                        font-style: italic;
                        color: #555;
                    }
                    .header {
                        font-size: 1.2em;
                        margin-bottom: 15px;
                        color: #2c3e50;
                    }
                </style>
                <p class='header'>Thông báo mới: Đơn hàng được đặt trên hệ thống</p>
                <p>Kính gửi Admin,</p>
                <p>Đơn hàng mới đã được tiếp nhận trên hệ thống. Dưới đây là thông tin chi tiết về đơn hàng:</p>
                <div class='admin-details'>
                    <p><strong>Thông tin đơn hàng:</strong></p>
                    <ul>
                        <li><strong>Mã đơn hàng:</strong> $orderId</li>
                        <li><strong>Tên khách hàng:</strong> $name</li>
                        <li><strong>Ngày đặt hàng:</strong> $orderDate</li>
                        <li><strong>Phương thức thanh toán:</strong> $paymentMethod</li>
                        <li><strong>Trạng thái thanh toán:</strong> Đã thanh toán</li>
                        <li><strong>Tổng giá trị đơn hàng:</strong> " . number_format($totalAmount) . " VNĐ</li>
                    </ul>
                </div>
                <p>Vui lòng kiểm tra và xử lý đơn hàng càng sớm càng tốt.</p>
                <p class='admin-footer'><strong>Trân trọng,</strong><br>Hệ thống Waggy</p>
            ";

            $mail->clearAddresses();
            $mail->addAddress('phamlyvibes2000@gmail.com', 'Waggy Admin');
            $mail->Subject = 'Customer contact information - Waggy';
            $mail->Body = $adminBody;

            // Gửi email đến Admin
            $mail->send();

            return true;
        } catch (Exception $e) {
            // Trả về thông báo lỗi nếu có vấn đề trong việc gửi email
            error_log("Không thể gửi email. Lỗi: {$mail->ErrorInfo}");
            return false;
        }
    }
}
