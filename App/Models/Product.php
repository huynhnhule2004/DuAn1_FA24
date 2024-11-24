<?php

namespace App\Models;

class Product extends BaseModel
{
    protected $table = 'products';
    protected $id = 'id';

    public function getAllProduct()
    {
        return $this->getAll();
    }
    public function getOneProduct($id)
    {
        return $this->getOne($id);
    }

    // public function createProduct($data)
    // {
    //     return $this->create($data);
    // }


    public function createProduct(array $data)
    {
        try {
            // Tạo câu truy vấn INSERT
            $sql = "INSERT INTO $this->table (";

            // Tạo chuỗi các cột
            foreach ($data as $key => $value) {
                $sql .= "$key, ";
            }

            $sql = rtrim($sql, ", "); // Loại bỏ dấu phẩy thừa sau cùng
            $sql .= ") VALUES (";

            // Tạo chuỗi các giá trị tương ứng với cột
            foreach ($data as $key => $value) {
                $sql .= "'$value', ";
            }

            $sql = rtrim($sql, ", "); // Loại bỏ dấu phẩy thừa sau cùng
            $sql .= ")"; // Đóng câu truy vấn

            // Kết nối và chuẩn bị câu lệnh
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            // Thực thi câu lệnh
            $result = $stmt->execute();

            // Kiểm tra kết quả
            if ($result) {
                // Trả về ID của bản ghi vừa tạo
                return $conn->insert_id;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            // Log lỗi
            error_log('Lỗi khi thêm dữ liệu: ' . $th->getMessage());
            return false;
        }
    }

    public function updateProduct($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteProduct($id)
    {
        return $this->delete($id);
    }
    public function getAllProductByStatus()
    {
        $result = [];
        try {
            $sql = "SELECT products.* FROM products 
        INNER JOIN categories on products.category_id = categories.id 
        WHERE products.status=" . self::STATUS_ENABLE . " 
        AND categories.status = " . self::STATUS_ENABLE;
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getAllVariantOptionByProduct($id)
    {
        $result = [];
        try {
            $sql = "SELECT DISTINCT pvo.id, pvo.name
                FROM Product_variant_options AS pvo
                JOIN Product_variant_option_combinations AS pvoc ON pvo.id = pvoc.product_variant_option_id
                JOIN Skus AS s ON pvoc.sku_id = s.id
                WHERE s.product_id = $id";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    public function getOneProductByName($name)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM $this->table WHERE product_name=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('s', $name);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy bằng tên: ' . $th->getMessage());
            return $result;
        }
    }

    public function getAllProductJoinCategory()
    {
        $result = [];
        try {
            // $sql = "SELECT * FROM $this->table";
            $sql = "SELECT products.*, categories.category_name
            FROM products 
            INNER JOIN categories 
            on products.category_id=categories.id;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getAllProductByCategoryAndStatus(int $id)
    {
        $result = [];
        try {
            $sql = "SELECT products.*, categories.name AS category_name FROM products 
            INNER JOIN categories on products.category_id = categories.id 
            WHERE products.status=" . self::STATUS_ENABLE . " 
            AND categories.status = " . self::STATUS_ENABLE . " AND products.category_id=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getOneProductByStatus(int $id)
    {
        $result = [];
        try {
            $sql = "SELECT products.*, categories.name AS category_name FROM products 
            INNER JOIN categories on products.category_id = categories.id 
            WHERE products.status=" . self::STATUS_ENABLE . " 
            AND categories.status = " . self::STATUS_ENABLE . " AND products.id=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị chi tiết dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function countTotalProduct()
    {
        return $this->countTotal();
    }

    public function countProductByCategory()
    {
        $result = [];
        try {
            $sql = "SELECT COUNT(*) AS count, categories.name FROM products INNER JOIN categories ON products.category_id = categories.id GROUP BY products.category_id;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function searchByName(string $name)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM `products` WHERE `product_name` LIKE '%$name%';";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getFeaturedProducts()
    {
        $result = [];
        try {
            $sql = "SELECT * FROM products WHERE is_feature = 1;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getRelatedProducts(int $productId, int $categoryId)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM products WHERE category_id = $categoryId AND id != $productId LIMIT 4;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getRecentlyViewedProducts()
    {
        $result = [];
        try {
            $sql = "SELECT * FROM products WHERE view IS NOT NULL ORDER BY view DESC LIMIT 4;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    public function getProductsByCategoryId(int $categoryId)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM products WHERE category_id = ? AND status = " . self::STATUS_ENABLE;
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $categoryId);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy sản phẩm theo danh mục: ' . $th->getMessage());
            return $result;
        }
    }
    public function getCommentsByProductId($productId)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM comments WHERE product_id = ? ORDER BY created_at DESC";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $productId);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy bình luận: ' . $th->getMessage());
        }
        return $result;
    }
}
