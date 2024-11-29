<?php

namespace App\Models;

class OrderDetail extends BaseModel
{
    protected $table = 'order_details';
    protected $id = 'id';

    public function getAllOrderDetailByOrderId($id)
    {
        $result = [];
        try {
            $sql = "SELECT 
            od.order_id, 
            od.quantity, 
            od.price, 
            s.sku, 
            s.product_id, 
            pvo.product_variant_id, 
            pvo.name AS variant_name, 
            p.product_name,
            p.image 
        FROM 
            order_details od
        INNER JOIN 
            product_variant_option_combinations pvoc ON od.product_variant_option_combinations_id = pvoc.id
        INNER JOIN 
            product_variant_options pvo ON pvoc.product_variant_option_id = pvo.id
        INNER JOIN 
            skus s ON pvoc.sku_id = s.id
        INNER JOIN 
            products p ON p.id = s.product_id
        WHERE 
            od.order_id = $id";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    public function getOneOrder($id)
    {
        $result = [];
        try {
            // Truy vấn INNER JOIN để lấy thông tin đơn hàng và tên khách hàng
            $sql = "SELECT o.*, u.first_name, u.last_name 
                FROM $this->table AS o
                INNER JOIN users AS u ON o.user_id = u.id
                WHERE o.$this->id = ?";

            $conn = $this->_conn->MySQLi(); // Kết nối MySQLi
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $id); // Gán tham số ID
            $stmt->execute();

            return $stmt->get_result()->fetch_assoc(); // Lấy kết quả và trả về
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị chi tiết dữ liệu: ' . $th->getMessage());
            return $result; // Trả về mảng rỗng nếu lỗi
        }
    }

    public function createOrderDetail($data)
    {
        return $this->create($data);
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
