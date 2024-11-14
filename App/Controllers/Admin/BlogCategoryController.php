<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\BlogCategory;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\BlogCategory\Create;
use App\Views\Admin\Pages\BlogCategory\Edit;
use App\Views\Admin\Pages\BlogCategory\Index;
use App\Validations\BlogCategoryValidation;

class BlogCategoryController
{


    // hiển thị danh sách
    public static function index()
    {
        $category = new BlogCategory();
        $data = $category->getAllCategory();

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
        $is_valid = BlogCategoryValidation::create();
    
        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm danh mục bài viết thất bại');
            header('location: /admin/blog_categories/create');
            exit;
        }
    
        $category_name = $_POST['category_name'];
        $description = $_POST['description'];
    
        // Kiểm tra tên loại có tồn tại chưa => không được trùng tên
        $category = new BlogCategory();
        $is_exist = $category->getOneCategoryByName($category_name);
    
        if ($is_exist) {
            NotificationHelper::error('store', 'Tên danh mục bài viết này đã tồn tại');
            header('location: /admin/blog_categories/create');
            exit;
        }
    
        // Kiểm tra và xử lý file ảnh nếu có
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            // Gọi hàm upload image
            $is_upload = BlogCategoryValidation::uploadImage();  // Hàm upload hình ảnh
    
            if ($is_upload) {
                $image_path = $is_upload; // Đường dẫn của hình ảnh đã upload
            } else {
                NotificationHelper::error('store', 'Lỗi khi tải ảnh lên');
                header('location: /admin/blog_categories/create');
                exit;
            }
        } else {
            $image_path = null;  // Nếu không có ảnh, có thể để trống hoặc gán giá trị mặc định
        }
    
        // Thực hiện thêm dữ liệu
        $data = [
            'category_name' => $category_name,
            'description' => $description,
        ];
    
        $result = $category->createCategory($data);
    
        if ($result) {
            NotificationHelper::success('store', 'Thêm danh mục bài viết thành công');
            header('location: /admin/blog_categories');
        } else {
            NotificationHelper::error('store', 'Thêm danh mục bài viết thất bại');
            header('location: /admin/blog_categories/create');
        }
    }
    

    // hiển thị chi tiết
    public static function show() {}


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        $category = new BlogCategory();
        $data = $category->getOneCategory($id);

        if (!$data) {
            NotificationHelper::error('edit', 'Không thể xem danh mục bài viết này');
            header('location: /admin/blog_categories/');
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
    $is_valid = BlogCategoryValidation::edit();

    if (!$is_valid) {
        NotificationHelper::error('update', 'Cập nhật danh mục bài viết thất bại');
        header("location: /admin/blog_categories/$id");
        exit;
    }

    $category_name = $_POST['category_name'];
    $description = $_POST['description'];

    // Kiểm tra tên loại có tồn tại chưa => không được trùng tên
    $category = new BlogCategory();
    $is_exist = $category->getOneCategoryByName($category_name);

    if ($is_exist && $is_exist['id'] != $id) {
        NotificationHelper::error('update', 'Tên danh mục bài viết này đã tồn tại');
        header("location: /admin/blog_categories/$id");
        exit;
    }

    // Kiểm tra và xử lý file ảnh nếu có
    $image_path = $category->getOneCategory($id)['image']; // giữ lại ảnh cũ nếu không có ảnh mới
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $is_upload = BlogCategoryValidation::uploadImage();

        if ($is_upload) {
            $image_path = $is_upload; // Đường dẫn của hình ảnh mới
        } else {
            NotificationHelper::error('update', 'Lỗi khi tải ảnh lên');
            header("location: /admin/blog_categories/$id");
            exit;
        }
    }

    // Thực hiện cập nhật
    $data = [
        'category_name' => $category_name,
        'description' => $description,
    ];

    $result = $category->updateCategory($id, $data);

    if ($result) {
        NotificationHelper::success('update', 'Cập nhật danh mục bài viết thành công');
        header('location: /admin/blog_categories');
    } else {
        NotificationHelper::error('update', 'Cập nhật danh mục bài viết thất bại');
        header("location: /admin/blog_categories/$id");
    }
    var_dump($_POST);
exit;

}


    // thực hiện xoá
    public static function delete(int $id)
    {
        $category = new BlogCategory();
        $result = $category->deleteCategory($id);

        // var_dump($result);
        if ($result) {
            NotificationHelper::success('delete', 'Xóa danh mục bài viết thành công');
        } else {
            NotificationHelper::error('delete', 'Xóa danh mục bài viết thất bại');
        }

        header('location: /admin/blog_categories');
    }
}
