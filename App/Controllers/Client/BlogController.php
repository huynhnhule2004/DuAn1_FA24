<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Models\BlogCategory;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Pages\Blog\Index;
use App\Views\Client\Pages\Blog\Detail;
use App\Views\Client\Layouts\Header;
use App\Models\Blog;
use App\Models\Category;

class BlogController
{
    // hiển thị danh sách
    public static function index()
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();


        $blog = new Blog();
        $postsPerPage = 3; // Số bài viết trên mỗi trang
        $currentPage = 1;  // Trang hiện tại
        $offset = 0;       // Vị trí bắt đầu

        // Lấy danh sách blog
        $blogs = $blog->getBlogsWithLimit($postsPerPage, $offset);
        
        // Đếm tổng số bài viết
        $totalPosts = $blog->countTotalBlogs();
        
        // Tính tổng số trang
        $totalPages = ceil($totalPosts / $postsPerPage);

        // Chuẩn bị dữ liệu để render
        $data = [
            'blogs' => $blogs,
            'remainingPosts' => $totalPosts,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'categories' => $categories

        ];

        // Render các phần của trang
        Header::render($data);
        Index::render($data);
        Footer::render();
    }

    public static function detail($id)
    {
        $category = new BlogCategory;
        $categories = $category->getAll();
        $blog = new Blog();
        $blog_detail = $blog->getOneBlog($id);

        $data = [
            'categories' => $categories,
            'blog_detail' => $blog_detail
        ];

        // echo "<pre>";
        // var_dump($data);
        Header::render();
        Detail::render($data);
        Footer::render();
    }

    public static function getBlogByCategory($id)
    {
        $category = new BlogCategory();
        $categories = $category->getAllCategory();

        $blog = new Blog();
        $blogs = $blog->getAllBlogsByCategory($id);

        $data = [
            'blogs' => $blogs
        ];
//       echo "<pre/>";
//       var_dump($data);

        Header::render($data);
        Index::render($data);
        Footer::render();
    }
    // Phương thức xử lý phân trang AJAX
    public function paginateBlog()
    {
        // Thiết lập header
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');

        // Lấy trang hiện tại, đảm bảo là số nguyên dương
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        
        $postsPerPage = 3;
        
        // Tính offset
        $offset = ($page - 1) * $postsPerPage;

        $blog = new Blog();
        
        // Lấy danh sách blog cho trang hiện tại
        $blogs = $blog->getBlogsWithLimit($postsPerPage, $offset);
        
        // Đếm tổng số bài viết
        $totalPosts = $blog->countTotalBlogs();
        
        // Tính tổng số trang
        $totalPages = ceil($totalPosts / $postsPerPage);

        // Sinh HTML cho các bài blog
        $blogHtml = '';
        foreach ($blogs as $item) {
            $blogHtml .= $this->generateBlogItemHtml($item);
        }

        // Sinh liên kết phân trang
        $paginationLinks = $this->generatePaginationLinks($page, $totalPages);

        // Trả về JSON
        echo json_encode([
            'blogHtml' => $blogHtml,
            'paginationLinks' => $paginationLinks,
            'currentPage' => $page,
            'totalPages' => $totalPages
        ]);
        exit;
    }
    private function generateBlogItemHtml($item)
    {
        return '<div class="col-md-4">
            <div class="card h-100">
              <div class="position-relative">
                <a href="/blogs/' . htmlspecialchars($item['id']) . '">
                  <img src="' . APP_URL . '/public/uploads/blogs/' . htmlspecialchars($item['image']) . '" class="card-img-top img-fluid rounded-3" alt="image" style="height: 400px; object-fit: cover;">
                </a>
                <div class="position-absolute top-0 start-0 bg-light rounded m-2 px-3 py-1">
                  <h5 class="text-primary mb-0">20</h5>
                  <small class="text-muted">Feb</small>
                </div>
              </div>
              <div class="card-body d-flex flex-column">
                <a href="/blogs/' . htmlspecialchars($item['id']) . '" class="text-decoration-none">
                  <h5 class="card-title text-dark">' . htmlspecialchars($item['title']) . '</h5>
                </a>
                <p class="card-text text-muted">' . 
                (mb_strlen($item['content']) > 100 
                ? htmlspecialchars(mb_substr(strip_tags($item['content']), 0, 100)) . '...' 
                : htmlspecialchars(strip_tags($item['content'])))
             . 
                '</p>
                <a href="/blogs/' . htmlspecialchars($item['id']) . '" class="mt-auto text-primary">Đọc thêm</a>
              </div>
            </div>
          </div>';
    }
    
    private function generatePaginationLinks($currentPage, $totalPages)
    {
        $links = '<div class="pagination loop-pagination d-flex justify-content-center align-items-center">';
    
        // Nút mũi tên trái (Previous)
        if ($currentPage > 1) {
            $links .= '<a href="javascript:void(0)" 
                          class="pagination-arrow d-flex align-items-center mx-3" 
                          data-page="' . ($currentPage - 1) . '">
                            <iconify-icon icon="ic:baseline-keyboard-arrow-left" class="pagination-arrow fs-1"></iconify-icon>
                       </a>';
        } else {
            $links .= '<span class="pagination-arrow d-flex align-items-center mx-3 disabled">
                            <iconify-icon icon="ic:baseline-keyboard-arrow-left" class="pagination-arrow fs-1"></iconify-icon>
                       </span>';
        }
    
        // Tính toán các trang hiển thị
        $maxPagesToShow = 4;
        $startPage = max(1, $currentPage - 2);
        $endPage = min($totalPages, $currentPage + 1);
        if ($endPage - $startPage + 1 < $maxPagesToShow) {
            if ($startPage == 1) {
                $endPage = min($totalPages, $startPage + $maxPagesToShow - 1);
            } elseif ($endPage == $totalPages) {
                $startPage = max(1, $endPage - $maxPagesToShow + 1);
            }
        }

        for ($i = $startPage; $i <= $endPage; $i++) {
            $links .= $this->renderPageLink($i, $currentPage);
        }
    
        if ($currentPage < $totalPages) {
            $links .= '<a href="javascript:void(0)" 
                          class="pagination-arrow d-flex align-items-center mx-3" 
                          data-page="' . ($currentPage + 1) . '">
                            <iconify-icon icon="ic:baseline-keyboard-arrow-right" class="pagination-arrow fs-1"></iconify-icon>
                       </a>';
        } else {
            $links .= '<span class="pagination-arrow d-flex align-items-center mx-3 disabled">
                            <iconify-icon icon="ic:baseline-keyboard-arrow-right" class="pagination-arrow fs-1"></iconify-icon>
                       </span>';
        }
    
        $links .= '</div>';
        return $links;
    }
    

    private function renderPageLink($page, $currentPage)
    {
        if ($page == $currentPage) {
            return '<span aria-current="page" class="page-numbers mt-2 fs-3 mx-3 current">' . $page . '</span>';
        } else {
            return '<a href="javascript:void(0)" 
                      class="page-numbers mt-2 fs-3 mx-3" 
                      data-page="' . $page . '">' . $page . '</a>';
        }
    }
    
}
