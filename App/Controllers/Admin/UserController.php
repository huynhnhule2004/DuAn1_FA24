<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\User;
use App\Validations\UserValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\User\Create;
use App\Views\Admin\Pages\User\Edit;
use App\Views\Admin\Pages\User\Index;

class UserController
{


    // hiển thị danh sách
    public static function index()
    {
        $user = new User();
        $data = $user->getAllUser();
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }


    // hiển thị giao diện form thêm
    public static function create()
    {
        // var_dump($_SESSION);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form thêm
        Create::render();
        Footer::render();
    }


    // xử lý chức năng thêm
    public static function store()
    {
        // validation các trường dữ liệu
        $is_valid = UserValidation::create();
    
        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm người dùng thất bại');
            header('location: /admin/users/create');
            exit;
        }
    
        $username = $_POST['username'];
        // Kiểm tra tên đăng nhập có tồn tại chưa => không được trùng tên
        $user = new User();
        $is_exist = $user->getOneUserByUsername($username);
    
        if ($is_exist) {
            NotificationHelper::error('store', 'Tên người dùng này đã tồn tại');
            header('location: /admin/users/create');
            exit;
        }
    
    
        // Thực hiện thêm người dùng
        $data = [
            'username' => $username,
            'email' => $_POST['email'],
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'address' => $_POST['address'],
            'phone_number' => $_POST['phone_number'],
            'date_of_birth' => $_POST['date_of_birth'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'status' => $_POST['status'],
           
        ];

         // var_dump($data);
         $is_upload = UserValidation::uploadAvatar();

         if ($is_upload) {
             $data['avatar'] = $is_upload;
         }
    
        $result = $user->createUser($data);
    
        if ($result) {
            NotificationHelper::success('store', 'Thêm người dùng thành công');
            header('location: /admin/users');
        } else {
            NotificationHelper::error('store', 'Thêm người dùng thất bại');
            header('location: /admin/users/create');
        }
    }

    
    
    


    // // hiển thị chi tiết
    // public static function show()
    // {
    // }


    //hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        $user = new User();
        $data = $user->getOneUser($id);

        if (!$data) {
            NotificationHelper::error('edit', 'Không thể xem người dùng này');
            header('location: /admin/users/');
            exit;
        }

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form sửa
        Edit::render($data);
        Footer::render();
    }


    // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        // validation các trường dữ liệu
        $is_valid = UserValidation::edit();

        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật người dùng thất bại');
            header("location: /admin/users/$id");
            exit;
        }

        $user = new User();



        //Thực hiện cập nhật
        $data = [
            'email' => $_POST['email'],
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'address' => $_POST['address'],
            'phone_number' => $_POST['phone_number'],
            'date_of_birth' => $_POST['date_of_birth'],
            'status' => $_POST['status'],

        ];
        if ($_POST['password'] !== '') {
            $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }

        $is_upload = UserValidation::uploadAvatar();

        if ($is_upload) {
            $data['avatar'] = $is_upload;
        }

        $result = $user->updateUser($id, $data);

        if ($result) {
            NotificationHelper::success('update', 'Cập nhật người dùng thành công');
            header('location: /admin/users');
        } else {
            NotificationHelper::error('update', 'Cập nhật người dùng thất bại');
            header("location: /admin/users/$id");
        }
    }


    //thực hiện xoá
    public static function delete(int $id)
    {
        $user = new User();
        $result = $user->deleteUser($id);

        // var_dump($result);
        if ($result) {
            NotificationHelper::success('delete', 'Xóa người dùng thành công');
        } else {
            NotificationHelper::error('delete', 'Xóa người dùng thất bại');
        }

        header('location: /admin/users');
    }
}
