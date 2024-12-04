<?php

namespace App\Models;

class Order extends BaseModel
{
    protected $table = 'orders';
    protected $id = 'id';

    public function getAllOrderAndNameUser()
    {
        $result = [];
        try {
            // $sql = "SELECT * FROM $this->table";
            $sql = "SELECT o.*, u.first_name
            FROM orders o 
            JOIN users u 
            ON o.user_id = u.id;
";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getAllOrderByUserId($id)
    {
        $result = [];
        try {
            // $sql = "SELECT * FROM $this->table";
            $sql = "SELECT * FROM `orders` WHERE user_id = $id;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    public function getOneById($id)
    {
        return $this->getOne($id);
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
    public function updatePaymentStatus(int $id, string $status)
    {
        try {
            // Tạo câu lệnh SQL
            $sql = "UPDATE $this->table SET payment_status = ? WHERE $this->id = ?";

            // Kết nối MySQL
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            if (!$stmt) {
                throw new \Exception('Không thể chuẩn bị câu lệnh SQL: ' . $conn->error);
            }

            // Liên kết tham số (prepared statement)
            $stmt->bind_param('si', $status, $id);

            // Thực thi câu lệnh và trả kết quả
            return $stmt->execute();
        } catch (\Throwable $th) {
            // Ghi log lỗi nếu có
            error_log('Lỗi khi cập nhật trạng thái thanh toán: ' . $th->getMessage());
            return false;
        }
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
    public function getRevenueByMonth($year)
    {
        $result = [];
        try {
            $sql = "SELECT MONTH(created_at) AS month, SUM(total_price) AS revenue
                FROM {$this->table}
                WHERE YEAR(created_at) = ?
                GROUP BY MONTH(created_at)
                ORDER BY MONTH(created_at)";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $year);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi truy xuất doanh thu theo tháng: ' . $th->getMessage());
        }

        return $result;
    }

    public function searchByStatus(string $status)
    {
        $result = [];
        try {
            $sql = "SELECT o.*, u.first_name 
                    FROM orders o
                    JOIN users u 
                    ON o.user_id = u.id
                    WHERE o.status LIKE '%$status%';";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    public function getAllOrderByUserIdAndStatus($id, $status)
    {
        $result = [];
        try {
            // $sql = "SELECT * FROM $this->table";
            $sql = "SELECT * FROM `orders` WHERE user_id = $id AND status LIKE '%$status%';";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
}
