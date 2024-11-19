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

    public static function sendEmail($to, $name)
    {
        header('Content-Type: text/html; charset=utf-8');
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'phamlyvibes2000@gmail.com';                     //SMTP username
            $mail->Password   = 'gvvy mbgp ggle kizj';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = '587';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('phamlyvibes2000@gmail.com', 'Waggy');
            $mail->addAddress($to, $name);
            $mail->addReplyTo('phamlyvibes2000@gmail.com', 'Waggy');

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Contact of Waggy';
            $mail->Body    = 'Cảm ơn bạn đã liên hệ tới Waggy chúng tôi sẽ phản hồi sớm nhất ^^.';
            $mail->AltBody = 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất.';

            $mail->send();
            return true;
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
}
