<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\User;
use App\Validations\AuthValidation;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Auth\ChangePassword;
use App\Views\Client\Pages\Auth\Edit;
use App\Views\Client\Pages\Auth\ForgotPassword;
use App\Views\Client\Pages\Auth\Login;
use App\Views\Client\Pages\Auth\Register;
use App\Views\Client\Pages\Auth\ResetPassword;
use App\Helpers\Mailer;

class AuthController
{
    // Hiển thị giao diện form đăng ký
    public static function renderView($view, $data = [])
    {
        Header::render($data);
        Notification::render();
        NotificationHelper::unset();
        $view::render($data);
        Footer::render();
    }

    // Hiển thị form đăng ký
    public static function register()
    {
        self::renderView(Register::class);
    }

    // Thực hiện đăng ký
    public static function registerAction()
    {
        if (!AuthValidation::register()) {
            NotificationHelper::error('register_valid', 'Đăng ký thất bại');
            header('location: /register');
            exit();
        }

        $data = [
            'username' => $_POST['username'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'email' => $_POST['email'],
            'first_name' => $_POST['first_name']
        ];

        if (AuthHelper::register($data)) {
            header('Location: /login');
        } else {
            header('Location: /register');
        }
    }

    // Hiển thị form đăng nhập
    public static function login()
    {
        self::renderView(Login::class);
    }

    // Thực hiện đăng nhập
    public static function loginAction()
    {
        if (!AuthValidation::login()) {
            NotificationHelper::error('login', 'Đăng nhập thất bại');
            header('location: /login');
            exit();
        }

        $data = [
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'remember' => isset($_POST['remember'])
        ];

        if (AuthHelper::login($data)) {
            NotificationHelper::success('login', 'Đăng nhập thành công');
            header('location: /');
        } else {
            NotificationHelper::error('login', 'Đăng nhập thất bại');
            header('location: /login');
        }
    }

    // Đăng xuất
    public static function logout()
    {
        AuthHelper::logout();
        NotificationHelper::success('logout', 'Đăng xuất thành công');
        header('location: /');
    }

    // Hiển thị thông tin người dùng
    public static function edit($id)
    {
        $data = $_SESSION['user'];
        if (!AuthHelper::edit($id)) {
            NotificationHelper::error('edit_error', 'Lỗi khi sửa thông tin');
            header('location: /login');
            exit;
        }
        self::renderView(Edit::class, $data);
    }

    // Cập nhật thông tin người dùng
    public static function update($id)
    {
        if (!AuthValidation::edit()) {
            NotificationHelper::error('update_user', 'Cập nhật thông tin thất bại');
            header("location: /users/$id");
            exit();
        }

        $data = [
            'email' => $_POST['email'],
            'first_name' => $_POST['first_name'],
            'phone_number' => $_POST['phone_number'],
            'address' => $_POST['address'],
            'date_of_birth' => $_POST['date_of_birth']
        ];

        if ($avatar = AuthValidation::uploadAvatar()) {
            $data['avatar'] = $avatar;
        }

        if (AuthHelper::update($id, $data)) {
            header("location: /users/$id");
        } else {
            NotificationHelper::error('update_user', 'Cập nhật thất bại');
            header("location: /users/$id");
        }
    }

    // Hiển thị form đổi mật khẩu
    public static function changePassword()
    {
        if (!AuthHelper::checkLogin()) {
            NotificationHelper::error('login', 'Vui lòng đăng nhập để đổi mật khẩu');
            header('location: /login');
            exit;
        }
        self::renderView(ChangePassword::class);
    }

    // Thực hiện đổi mật khẩu
    public static function changePasswordAction()
    {
        if (!AuthValidation::changePassword()) {
            NotificationHelper::error('change-password', 'Đổi mật khẩu thất bại');
            header('location: /change-password');
            exit;
        }

        $id = $_SESSION['user']['id'];
        $data = [
            'old_password' => $_POST['old_password'],
            'new_password' => $_POST['new_password']
        ];

        if (AuthHelper::changePassword($id, $data)) {
            header('location: /change-password');
        } else {
            NotificationHelper::error('change-password', 'Đổi mật khẩu thất bại');
            header('location: /change-password');
        }
    }

    // Hiển thị form lấy lại mật khẩu
    public static function forgotPassword()
    {
        self::renderView(ForgotPassword::class);
    }

    // Thực hiện lấy lại mật khẩu
    public static function forgotPasswordAction()
    {
        // Validate the POST data before processing
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            NotificationHelper::error('forgot_password', 'Vui lòng nhập email');
            header('location: /forgot-password');
            exit();
        }

        $email = $_POST['email'];


        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            NotificationHelper::error('email_invalid', 'Email không hợp lệ');
            header('location: /forgot-password');
            exit();
        }



        $_SESSION['otp'] = rand(100000, 999999);

        if (AuthHelper::sendEmail($email, $_SESSION['otp'])) {
            NotificationHelper::success('send_otp', 'Mã OTP đã được gửi tới email của bạn');
            header('location: /reset-password');
        } else {
            NotificationHelper::error('send_otp', 'Không thể gửi email. Vui lòng thử lại');
            header('location: /forgot-password');
        }
    }

    // Hiển thị form reset mật khẩu
    public static function resetPassword()
    {
        if (!isset($_SESSION['otp'])) {
            NotificationHelper::error('otp_not_found', 'Vui lòng nhập đúng mã OTP');
            header('location: /forgot-password');
            exit;
        }
        self::renderView(ResetPassword::class);
    }

    // Thực hiện reset mật khẩu
    public static function resetPasswordAction()
    {
        // Kiểm tra mã OTP trong session
        if (!isset($_SESSION['reset_password'])) {
            NotificationHelper::error('otp_not_found', 'Mã OTP không tồn tại hoặc đã hết hạn');
            header('location: /forgot-password');
            exit();
        }

        $otp = (int)$_POST['otp'];

        // Kiểm tra mã OTP có hợp lệ không
        if ($_SESSION['reset_password']['otp'] !== $otp) {
            NotificationHelper::error('otp_invalid', 'Mã OTP không hợp lệ');
            header('location: /reset-password');
            exit();
        }

        // Nếu OTP hợp lệ, chuyển hướng người dùng đến trang chủ
        unset($_SESSION['reset_password']); // Xóa OTP khỏi session
        NotificationHelper::success('otp_verified', 'Xác minh OTP thành công');
        header('location: /'); // Chuyển hướng đến trang chủ
        exit();
    }

    public static function verifyOtpAction()
    {
        // Kiểm tra nếu không có mã OTP trong session
        if (!isset($_SESSION['reset_password']) || !isset($_SESSION['reset_password']['otp'])) {
            NotificationHelper::error('otp_not_found', 'Mã OTP không tồn tại hoặc đã hết hạn');
            header('location: /forgot-password');
            exit();
        }

        // Lấy mã OTP người dùng nhập
        $userOtp = (int)$_POST['otp'];

        // Kiểm tra mã OTP
        if ($_SESSION['reset_password']['otp'] !== $userOtp) {
            NotificationHelper::error('otp_invalid', 'Mã OTP không hợp lệ');
            header('location: /verify-otp');
            exit();
        }

        // OTP đúng, xoá OTP khỏi session
        unset($_SESSION['reset_password']);

        // Đăng nhập thành công, chuyển hướng tới trang chủ
        NotificationHelper::success('otp_verified', 'Xác minh OTP thành công!');
        header('location: /'); // Trang chủ
        exit();
    }
}
