<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Order;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Order\Create;
use App\Views\Admin\Pages\Order\Edit;
use App\Views\Admin\Pages\Order\Index;
use App\Validations\CategoryValidation;
use App\Views\Admin\Pages\Order\Search;

class OrderController
{


    // hiển thị danh sách
    public static function index()
    {
        $order = new Order();
        $data = $order->getAllOrderAndNameUser();

        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $itemsPerPage = 10;

        $totalItems = count($data);
        $totalPages = ceil($totalItems / $itemsPerPage);

        if ($currentPage < 1) $currentPage = 1;
        if ($currentPage > $totalPages) $currentPage = $totalPages;

        $offset = ($currentPage - 1) * $itemsPerPage;
        $pageData = array_slice($data, $offset, $itemsPerPage);

        Header::render();
        Notification::render();
        NotificationHelper::unset();

        // Truyền $totalItems vào view để tính toán phân trang
        Index::render($data,$pageData, $currentPage, $itemsPerPage, $totalItems);
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
        $is_valid = CategoryValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm loại sản phẩm thất bại');
            header('location: /admin/categories/create');
            exit;
        }

        $category_name = $_POST['category_name'];
        $status = $_POST['status'];
        $description = $_POST['description'];

        // Kiểm tra tên loại có tồn tại chưa => không được trùng tên
        $category = new Category();
        $is_exist = $category->getOneCategoryByName($category_name);

        if ($is_exist) {
            NotificationHelper::error('store', 'Tên loại sản phẩm này đã tồn tại');
            header('location: /admin/categories/create');
            exit;
        }

        // Kiểm tra và xử lý file ảnh nếu có
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            // Gọi hàm upload image
            $is_upload = CategoryValidation::uploadImage();  // Hàm upload hình ảnh

            if ($is_upload) {
                $image_path = $is_upload; // Đường dẫn của hình ảnh đã upload
            } else {
                NotificationHelper::error('store', 'Lỗi khi tải ảnh lên');
                header('location: /admin/categories/create');
                exit;
            }
        } else {
            $image_path = null;  // Nếu không có ảnh, có thể để trống hoặc gán giá trị mặc định
        }

        // Thực hiện thêm dữ liệu
        $data = [
            'category_name' => $category_name,
            'status' => $status,
            'description' => $description,
            'image' => $image_path
        ];

        $result = $category->createCategory($data);

        if ($result) {
            NotificationHelper::success('store', 'Thêm loại sản phẩm thành công');
            header('location: /admin/categories');
        } else {
            NotificationHelper::error('store', 'Thêm loại sản phẩm thất bại');
            header('location: /admin/categories/create');
        }
    }


    // hiển thị chi tiết
    public static function show() {}


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        $order = new Order();
        $data = $order->getOneOrder($id);

        if (!$data) {
            NotificationHelper::error('edit', 'Không thể xem loại sản phẩm này');
            header('location: /admin/categories/');
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
        $order = new Order();

        // Thực hiện cập nhật
        $data = [
            'user_id' => $_POST['user_id'],
            'total_price' => $_POST['total_price'],
            'status' => $_POST['status'],
            'phone_number' => $_POST['phone_number'],
            'shipping_address' => $_POST['shipping_address'],
            'payment_method' => $_POST['payment_method'],
            'payment_status' => $_POST['payment_status'],
        ];

        $result = $order->updateOrder($id, $data);

        if ($result) {
            NotificationHelper::success('update', 'Cập nhật đơn hàng thành công');
            header('location: /admin/orders');
        } else {
            NotificationHelper::error('update', 'Cập nhật đơn hàng thất bại');
            header("location: /admin/orders/$id");
        }
        var_dump($_POST);
        exit;
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        $order = new Order();
        $result = $order->deleteOrder($id);

        // var_dump($result);
        if ($result) {
            NotificationHelper::success('delete', 'Xóa đơn hàng thành công');
        } else {
            NotificationHelper::error('delete', 'Xóa đơn hàng thất bại');
        }

        header('location: /admin/orders');
    }

    public static function search()
    {
        // $statusMapping = [
        //     'đang chờ xử lý' => 'Pending',
        //     'đang giao' => 'Shipped',
        //     'đã giao' => 'Delivered',
        //     'đã hủy' => 'Cancelled'
        // ];
        if (!isset($_GET['keyword']) || $_GET['keyword'] == '') {
            header('location: /admin/orders');
            exit();
        }

        $keyword = urldecode($_GET['keyword']);
        // $keyword1 = mb_strtolower($keyword);
        // $statusEnglish = $statusMapping[$keyword1] ?? null;
        // if ($statusEnglish === null) {
        //     NotificationHelper::error('invalid_status', 'Trạng thái không hợp lệ');
        //     header('location: /admin/orders');
        //     exit();
        // }
        $order = new Order();
        $data = $order->searchByStatus($keyword);

        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $itemsPerPage = 10;

        $totalItems = count($data);
        $totalPages = ceil($totalItems / $itemsPerPage);

        if ($currentPage < 1) $currentPage = 1;
        if ($currentPage > $totalPages) $currentPage = $totalPages;

        $offset = ($currentPage - 1) * $itemsPerPage;
        $pageData = array_slice($data, $offset, $itemsPerPage);
        // $statusEnglish = $statusMapping[$keyword1] ?? null;


        // echo "<pre>";
        // var_dump($data);

        Header::render($data);
        Notification::render();
        NotificationHelper::unset();
        Search::render($pageData, $currentPage, $itemsPerPage, $totalItems);
        Footer::render();
    }
}
