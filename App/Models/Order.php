<?php

namespace App\Models;

class Order extends BaseModel
{
    protected $table = 'orders';
    protected $id = 'id';

    public function getAllCategory()
    {
        return $this->getAll();
    }
    public function getOneCategory($id)
    {
        return $this->getOne($id);
    }

    public function createOrder($data)
    {
        try {
            $sql = "INSERT INTO $this->table (";

            // Tạo phần danh sách các trường trong bảng
            foreach ($data as $key => $value) {
                $sql .= "$key, ";
            }

            // Xóa dấu phẩy thừa ở cuối
            $sql = rtrim($sql, ", ");

            $sql .= " ) VALUES (";

            // Tạo phần giá trị tương ứng
            foreach ($data as $key => $value) {
                $sql .= "'$value', ";
            }

            // Xóa dấu phẩy thừa ở cuối
            $sql = rtrim($sql, ", ");

            $sql .= ")";

            // Kết nối với cơ sở dữ liệu
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            // Thực thi câu lệnh
            $stmt->execute();

            // Lấy ID của bản ghi vừa được chèn
            $lastInsertedId = $conn->insert_id;

            return $lastInsertedId; // Trả về ID đơn hàng vừa tạo
        } catch (\Throwable $th) {
            error_log('Lỗi khi thêm dữ liệu: ' . $th->getMessage());
            return false;
        }
    }
    public function updateOrder($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteOrder($id)
    {
        return $this->delete($id);
    }
    public function getAllCategoryByStatus()
    {
        $sql = "SELECT * FROM $this->table WHERE status= 'active'";
        $result = $this->_conn->MySQLi()->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getOneCategoryByName($category_name)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM $this->table WHERE category_name=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('s', $category_name);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy loại sản phẩm bằng tên: ' . $th->getMessage());
            return $result;
        }
    }
    public function getAllCategoriesByStatus()
    {
        $result = [];
        try {
            $sql = "SELECT * FROM categories WHERE status = 1";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả danh mục: ' . $th->getMessage());
            return $result;
        }
    }
    public function getAllActiveCategories()
    {
        try {
            $sql = "SELECT id, category_name FROM {$this->table} WHERE status = 'active'";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy danh mục: ' . $th->getMessage());
            return [];
        }
    }
}
