<?php
namespace App\Models;
use App\Models\Product;

class PaginationProduct extends Product
{
    public $start;     // Vị trí bắt đầu
    public $total;     // Tổng số bài viết
    public $limit = 9; // Số bài viết trên mỗi trang
    public $page_current; // Trang hiện tại
    public $page;      // Trang được yêu cầu

    public function __construct($page = null)
    {
        parent::__construct();
        $this->page = $page ?? 1;
        $this->calculateStartPosition();
    }

    // Tính toán vị trí bắt đầu
    private function calculateStartPosition()
    {
        $this->start = ($this->page - 1) * $this->limit;
        $this->page_current = $this->page;
    }

    // Lấy tổng số trang
    public function totalRow()
    {
        $sql = "SELECT COUNT(*) AS total FROM products";
        $result = $this->select($sql);
        
        if ($result) {
            $row = $this->fetchArrayTable($result);
            return ceil($row['total'] / $this->limit);
        }
        
        return 0;
    }

    // Lấy danh sách bài viết theo trang
    public function select_product()
    {
        $sql = "SELECT * FROM products LIMIT {$this->start}, {$this->limit}";
        $result = $this->select($sql);
    

        $products = [];
        while ($row = $this->fetchArrayTable($result)) {
            $products[] = $row;  // Lưu trữ dữ liệu product
        }
        
        return $products;
    }

// Tạo các nút phân trang
public function pagination_button_product()
{
    $totalPages = $this->totalRow();
    $links = '<div class="pagination loop-pagination d-flex justify-content-center align-items-center">';

    // Nút mũi tên trái (Previous)
    if ($this->page_current > 1) {
        $links .= "<a href='javascript:void(0)' 
                      class='pagination-arrow d-flex align-items-center mx-3' 
                      data-page='" . ($this->page_current - 1) . "'>
                        <iconify-icon icon='ic:baseline-keyboard-arrow-left' class='pagination-arrow fs-1'></iconify-icon>
                   </a>";
    } else {
        $links .= "<span class='pagination-arrow d-flex align-items-center mx-3 disabled'>
                        <iconify-icon icon='ic:baseline-keyboard-arrow-left' class='pagination-arrow fs-1'></iconify-icon>
                   </span>";
    }

    // Các số trang
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $this->page_current) {
            $links .= "<span aria-current='page' class='page-numbers mt-2 fs-3 mx-3 current'>{$i}</span>";
        } else {
            $links .= "<a href='javascript:void(0)' 
                          class='page-numbers mt-2 fs-3 mx-3' 
                          data-page='{$i}'>{$i}</a>";
        }
    }

    // Nút mũi tên phải (Next)
    if ($this->page_current < $totalPages) {
        $links .= "<a href='javascript:void(0)' 
                      class='pagination-arrow d-flex align-items-center mx-3' 
                      data-page='" . ($this->page_current + 1) . "'>
                        <iconify-icon icon='ic:baseline-keyboard-arrow-right' class='pagination-arrow fs-1'></iconify-icon>
                   </a>";
    } else {
        $links .= "<span class='pagination-arrow d-flex align-items-center mx-3 disabled'>
                        <iconify-icon icon='ic:baseline-keyboard-arrow-right' class='pagination-arrow fs-1'></iconify-icon>
                   </span>";
    }

    $links .= '</div>';
    return $links;
}

    // Xử lý phân trang
    public function paginate()
    {
        header('Content-Type: application/json');
        
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $pagination_product = new PaginationProduct($page);
        
        $products = $pagination_product->select_product();
        $paginationLinks = $pagination_product->pagination_button_product();

        // Trả về dữ liệu JSON phong phú hơn
        echo json_encode([
            'products' => $this->generateproductHtml($products),
            'paginationLinks' => $paginationLinks,
            'currentPage' => $page,
            'totalPages' => $this->totalRow()
        ]);
    }

    // Sinh HTML cho các product
    private function generateproductHtml($products)
    {
        $html = '';
        foreach ($products as $product) {
            $html .= "<div class='entry-item col-md-4 my-4'>
                <div class='card position-relative'>
                    <img src='public/uploads/products/{$product['image']}' class='img-fluid rounded-4' alt='product Image'>
                    <div class='card-body'>
                        <h4 class='card-title'>" . htmlspecialchars($product['title']) . "</h4>
                        <p>" . htmlspecialchars(substr($product['content'], 0, 100)) . "...</p>
                    </div>
                </div>
            </div>";
        }
        return $html;
    }
}