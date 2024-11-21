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

class BlogController
{
    // hiển thị danh sách
    public static function index()
    {
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
            'totalPages' => $totalPages
        ];

        // Render các phần của trang
        Header::render();
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
    public function paginate()
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
    return '<div class="entry-item col-md-4 my-4">
        <div class="z-1 position-absolute rounded-3 m-2 px-3 pt-1 bg-light">
            <h3 class="secondary-font text-primary m-0">20</h3>
            <p class="secondary-font fs-6 m-0">Feb</p>
        </div>
        <div class="card position-relative">
            <a href="/moreblog?blog_id=' . htmlspecialchars($item['id']) . '">
                <img src="' . APP_URL . '/public/uploads/blogs/' . htmlspecialchars($item['image']) . '" 
                     class="img-fluid rounded-4" alt="Blog Image">
            </a>
            <div class="card-body p-0">
                <a href="/moreblogs">
                    <h4 class="card-title pt-4 pb-3 m-0">' . htmlspecialchars($item['title']) . '</h4>
                </a>
                <div class="card-text">
                    <p class="blog-paragraph fs-6">' . 
                        (mb_strlen($item['content']) > 100 
                            ? htmlspecialchars(mb_substr($item['content'], 0, 100)) . '...' 
                            : htmlspecialchars($item['content'])
                        ) . 
                    '</p>
                    <a href="/blog/detail?id=' . htmlspecialchars($item['id']) . '" class="blog-read">Đọc thêm</a>
                </div>
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

    // Các số trang
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $currentPage) {
            $links .= '<span aria-current="page" class="page-numbers mt-2 fs-3 mx-3 current">' . $i . '</span>';
        } else {
            $links .= '<a href="javascript:void(0)" 
                          class="page-numbers mt-2 fs-3 mx-3" 
                          data-page="' . $i . '">' . $i . '</a>';
        }
    }

    // Nút mũi tên phải (Next)
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
    
}
