<?php

namespace App\Models;

class Category extends BaseModel
{
    protected $table = 'categories';
    protected $id = 'id';

    public function getAllCategory()
    {
        return $this->getAll();
    }
    public function getOneCategory($id)
    {
        return $this->getOne($id);
    }

    public function createCategory($data)
    {
        return $this->create($data);
    }
    public function updateCategory($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteCategory($id)
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
    public function countTotalCategory()
    {
        return $this->countTotal();
    }
}
