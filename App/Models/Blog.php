<?php

namespace App\Models;

class Blog extends BaseModel
{
    protected $table = 'blogs';
    protected $id = 'id';

    public function getAllProduct()
    {
        return $this->getAll();
    }
    public function getOneBlog($id)
    {
        return $this->getOne($id);
    }

    public function createBlog($data)
    {
        return $this->create($data);
    }
    public function updateBlog($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteBlog($id)
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

    public function getOneBlogByName($name)
    {
        return $this->getOneByName($name);
    }

    public function getAllBlogJoinCategory()
    {
        $result = [];
        try {
            // $sql = "SELECT * FROM $this->table";
            $sql = "SELECT blogs.*, blog_categories.category_name, users.username
            FROM blogs
            INNER JOIN blog_categories ON blogs.category_id = blog_categories.id
            INNER JOIN users ON blogs.user_id = users.id;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getBlogAuthor($id)
    {
        $result = [];
        try {
            // $sql = "SELECT * FROM $this->table";
            $sql = " SELECT blogs.title, users.username AS author_name
            FROM blogs
            JOIN users ON blogs.user_id = users.id
            WHERE blogs.id = $id";
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
            $sql = "SELECT * FROM `products` WHERE `name` LIKE '%$name%';";
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
    public function getAllBlogs()
    {
        $result = [];
        try {
            $sql = "SELECT * FROM blogs ORDER BY created_at DESC";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy danh sách bài viết: ' . $th->getMessage());
            return $result;
        }
    }
    public function getBlogById($id)
    {
        $sql = "SELECT blogs.*, blog_categories.category_name, users.username
            FROM blogs
            INNER JOIN blog_categories ON blogs.category_id = blog_categories.id
            INNER JOIN users ON blogs.user_id = users.id
            WHERE blogs.id = ?";

        $stmt = $this->_conn->MySQLi()->prepare($sql);
        $stmt->bind_param("i", $id);  // Bảo vệ khỏi SQL injection
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }

        return null;  // Nếu không có bài viết
    }
    public function getAllBlogsByCategory(int $id)
    {
        $result = [];
        try {
            $sql = "SELECT blogs.*, blog_categories.category_name 
            FROM blogs 
            INNER JOIN blog_categories ON blogs.category_id = blog_categories.id 
            WHERE blogs.category_id = ?";
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

    public function getBlogDetail($id)
    {
        $result = [];
        try {
            $sql = "SELECT blogs.*, blog_categories.category_name 
                FROM blogs
                INNER JOIN blog_categories ON blogs.category_id = blog_categories.id
                WHERE blogs.id = ?";
            $stmt = $this->_conn->MySQLi()->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();

            $result = $stmt->get_result()->fetch_assoc();  // Lấy chi tiết bài viết
            return $result;
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy chi tiết bài viết: ' . $th->getMessage());
            return $result;
        }
    }
    public function getLatestBlogs()
    {
        $result = [];
        try {
            $sql = "SELECT * FROM blogs ORDER BY created_at DESC LIMIT 3";
            $result = $this->_conn->MySQLi()->query($sql);
            if ($result && $result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                error_log('Không có bài viết nào được trả về từ cơ sở dữ liệu.');
                return [];
            }
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy bài viết mới nhất: ' . $th->getMessage());
            return $result;
        }
    }
    
    public function getBlogsWithLimit($limit, $offset)
    {
        $result = [];
        try {
            $sql = "SELECT blogs.*, blog_categories.category_name, users.username 
                    FROM blogs
                    INNER JOIN blog_categories ON blogs.category_id = blog_categories.id
                    INNER JOIN users ON blogs.user_id = users.id
                    ORDER BY blogs.created_at DESC 
                    LIMIT ? OFFSET ?";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ii', $limit, $offset);
            $stmt->execute();

            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $result;
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy danh sách bài viết có giới hạn: ' . $th->getMessage());
            return $result;
        }
    }

    public function countTotalBlogs()
    {
        try {
            $sql = "SELECT COUNT(*) as total FROM blogs";
            $result = $this->_conn->MySQLi()->query($sql);
            $row = $result->fetch_assoc();
            return $row['total'] ?? 0; // Đảm bảo luôn trả về 0 nếu không có dữ liệu
        } catch (\Throwable $th) {
            error_log('Lỗi khi đếm tổng số bài viết: ' . $th->getMessage());
            return 0;
        }
    }
    
    public function getBlogsWithLimitByCategory($categoryId, $limit, $offset)
    {
        $result = [];
        try {
            $sql = "SELECT blogs.*, blog_categories.category_name, users.username 
                    FROM blogs
                    INNER JOIN blog_categories ON blogs.category_id = blog_categories.id
                    INNER JOIN users ON blogs.user_id = users.id
                    WHERE blogs.category_id = ?
                    ORDER BY blogs.created_at DESC 
                    LIMIT ? OFFSET ?";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('iii', $categoryId, $limit, $offset);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy danh sách bài viết theo danh mục có giới hạn: ' . $th->getMessage());
            return $result;
        }
    }

    /**
     * Đếm tổng số bài viết theo danh mục
     */
    public function countTotalBlogsByCategory($categoryId)
    {
        try {
            $sql = "SELECT COUNT(*) as total FROM blogs WHERE category_id = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $categoryId);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            return $row['total'];
        } catch (\Throwable $th) {
            error_log('Lỗi khi đếm tổng số bài viết theo danh mục: ' . $th->getMessage());
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
     /**
     * Đếm số lượng bản ghi từ kết quả truy vấn.
     */
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
 /**
     * Lấy một dòng dữ liệu từ kết quả truy vấn.
     */
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
