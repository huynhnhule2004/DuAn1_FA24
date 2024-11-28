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

    public function getAllProductByCategory($id)
    {
        $result = [];
        try {
            // $sql = "SELECT * FROM $this->table";
            $sql = "SELECT products.*, categories.category_name
                FROM products
                INNER JOIN categories
                ON products.category_id = categories.id
                WHERE products.category_id = $id;
";
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
            $sql = "SELECT products.*, categories.category_name FROM products 
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
            $sql = "SELECT COUNT(*) AS count, categories.category_name FROM products INNER JOIN categories ON products.category_id = categories.id GROUP BY products.category_id;";
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
    public function getAllVariantOptionByProductInCart($id)
    {
        $result = [];
        try {
            $sql = "SELECT DISTINCT pvo.id, pvo.name
                FROM Product_variant_options AS pvo
                JOIN Product_variant_option_combinations AS pvoc ON pvo.id = pvoc.product_variant_option_id
                JOIN Skus AS s ON pvoc.sku_id = s.id
                WHERE s.product_id = ?";

            // Chuẩn bị câu truy vấn
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            // Gắn tham số vào câu truy vấn
            $stmt->bind_param('i', $id);

            // Thực thi truy vấn
            $stmt->execute();

            // Lấy kết quả và trả về
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy các biến thể sản phẩm: ' . $th->getMessage());
        }
        return $result;
    }

    public function getCategoryByProductId(int $product_id)
    {
        $category = null;
        try {
            $sql = "SELECT category_id FROM products WHERE id = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $product_id);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();
            if ($result) {
                $category_id = $result['category_id'];

                $category = $this->getCategoryById($category_id);
            }

            return $category;
        } catch (\Throwable $th) {

            error_log('Lỗi khi lấy danh mục sản phẩm: ' . $th->getMessage());
            return null;
        }
    }

    public function getCategoryById(int $category_id)
    {
        $category = null;
        try {
            $sql = "SELECT category_name FROM Categories WHERE id = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $category_id);
            $stmt->execute();

            $result = $stmt->get_result()->fetch_assoc();
            if ($result) {
                $category = $result['category_name']; // Trả về tên danh mục
            }

            return $category;
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy thông tin danh mục: ' . $th->getMessage());
            return null;
        }
    }


    public function getProductVariant($id)
    {
        try {
            $product = $this->getOneProductByStatus($id);
            if (!$product) {
                throw new \Exception("Sản phẩm không tồn tại hoặc đã bị vô hiệu hóa.");
            }
            $sql = "
            SELECT skus.id, skus.sku, skus.price, skus.image, skus.stock_quantity,
                   pvoc.product_variant_option_id, pvo.name AS variant_option_name, pvo.product_variant_id, pv.name AS variant_name
            FROM skus
            JOIN product_variant_option_combinations pvoc ON skus.id = pvoc.sku_id
            JOIN product_variant_options pvo ON pvoc.product_variant_option_id = pvo.id
            JOIN product_variations pv ON pv.id = pvo.product_variant_id
            WHERE skus.product_id = ?
        ";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $skuResults = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            // $variantResults = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $groupedSkus = $this->groupSkusById($skuResults);
            // $groupedVariant = $this->groupVariantsById($variantResults);

            $productDetail = [
                'product' => $product,
                'skus' => $groupedSkus,
                // 'variant' => $groupedVariant,

            ];

            return $productDetail;
        } catch (\Throwable $th) {
            error_log("Lỗi khi lấy chi tiết sản phẩm: " . $th->getMessage());
            return null;
        }
    }
    private function groupSkusById($skus)
    {
        $groupedData = [];

        foreach ($skus as $sku) {
            $skuKey = $sku['sku'];

            // Khởi tạo dữ liệu nếu SKU chưa được nhóm
            if (!isset($groupedData[$skuKey])) {
                $groupedData[$skuKey] = [
                    'id' => $sku['id'],
                    'sku' => $sku['sku'],
                    'price' => $sku['price'],
                    'image' => $sku['image'],
                    'stock_quantity' => $sku['stock_quantity'],
                    'variant_options' => [],
                ];
            }

            // Tạo thông tin variant_option
            $variantOption = [
                'id' => $sku['product_variant_option_id'],
                'name' => $sku['variant_option_name'],
            ];

            // Thêm variant_name nếu có
            if (isset($sku['variant_name'])) {
                $variantOption['variant_name'] = $sku['variant_name'];
            }

            // Thêm biến thể vào danh sách của SKU
            $groupedData[$skuKey]['variant_options'][] = $variantOption;
        }

        // Loại bỏ các biến thể trùng lặp trong danh sách variant_options
        foreach ($groupedData as &$data) {
            // Loại bỏ trùng lặp bằng cách sử dụng `array_map` và `array_unique`
            $data['variant_options'] = array_map("unserialize", array_unique(array_map("serialize", $data['variant_options'])));
        }

        // Trả về dữ liệu đã nhóm
        return array_values($groupedData);
    }
    public function getVariantOptionsByIds(array $variantOptionIds)
    {
        $result = [];
        try {
            // Tạo danh sách các dấu `?` để sử dụng trong câu truy vấn
            $placeholders = implode(',', array_fill(0, count($variantOptionIds), '?'));

            $sql = "SELECT * FROM product_variant_options WHERE id IN ($placeholders)";

            // Chuẩn bị kết nối và câu truy vấn
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            // Gắn các tham số vào câu truy vấn
            $stmt->bind_param(str_repeat('i', count($variantOptionIds)), ...$variantOptionIds);

            // Thực thi và trả về kết quả
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log("Lỗi khi lấy thông tin biến thể: " . $th->getMessage());
        }

        return $result;
    }

public function getProductsWithLimit($limit, $offset)
    {
        $result = [];
        try {
            $sql = "SELECT products.*, categories.category_name
                    FROM products
                    INNER JOIN categories ON products.category_id = categories.id
                    ORDER BY products.created_at DESC 
                    LIMIT ? OFFSET ?";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ii', $limit, $offset);
            $stmt->execute();

            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $result;
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy danh sách sản phẩm có giới hạn: ' . $th->getMessage());
            return $result;
        }
    }
    public function countTotalProducts()
    {
        try {
            $sql = "SELECT COUNT(*) as total FROM products";
            $result = $this->_conn->MySQLi()->query($sql);
            $row = $result->fetch_assoc();
            return $row['total'] ?? 0; // Đảm bảo luôn trả về 0 nếu không có dữ liệu
        } catch (\Throwable $th) {
            error_log('Lỗi khi đếm tổng số bài viết: ' . $th->getMessage());
            return 0;
        }
    }
    public function getProductsWithLimitByCategory($categoryId, $limit, $offset)
    {
        $result = [];
        try {
            $sql = "SELECT products.*, categories.category_name,
                    FROM products
                    INNER JOIN categories ON products.category_id = categories.id
                    WHERE products.category_id = ?
                    ORDER BY products.created_at DESC 
                    LIMIT ? OFFSET ?";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('iii', $categoryId, $limit, $offset);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy danh sách sản phẩm theo danh mục có giới hạn: ' . $th->getMessage());
            return $result;
        }
    }
    public function countTotalProductsByCategory($categoryId)
    {
        try {
            $sql = "SELECT COUNT(*) as total FROM products WHERE category_id = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $categoryId);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            return $row['total'];
        } catch (\Throwable $th) {
            error_log('Lỗi khi đếm tổng số sản phẩm theo danh mục: ' . $th->getMessage());
            return 0;
        }
    }
    public function select($sql = null)
    {
        $result = [];
        try {
            $conn = $this->_conn->MySQLi();

            if ($sql === null) {
          
                $sql = "SELECT * FROM $this->table";
            }

            $query = $conn->query($sql);
            $result = $query->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi thực thi truy vấn: ' . $th->getMessage());
        }

        return $result;
    }
    public function selectCount($sql = null)
    {
        try {
            $result = $this->select($sql);
            return count($result);
        } catch (\Throwable $th) {
            error_log('Lỗi khi đếm số lượng bản ghi: ' . $th->getMessage());
            return 0;
        }
    }
    public function fetchArrayTable($sql = null)
    {
        try {
            $result = $this->select($sql);
            return $result[0] ?? null;
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy một dòng dữ liệu: ' . $th->getMessage());
            return null;
        }
    }
}

