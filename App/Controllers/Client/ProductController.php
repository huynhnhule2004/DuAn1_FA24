<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\Category as ProductCategory;
use App\Views\Client\Pages\Product\ProductDetail;
use App\Views\Client\Pages\Product\Index;
use App\Views\Client\Pages\Product\Detail;
use App\Models\Sku;
use App\Views\Client\Pages\Product\Filter;

class ProductController
{
    public static function index()
    {
        $category = new Category();
        $categories = $category->getAllByStatus();

        $product = new Product();
        $products = $product->getAllProductByStatus();
        $productsPerPage = 12; 
        $currentPage = 1; 
        $offset = 0;      
        $products = $product->getProductsWithLimit($productsPerPage, $offset);
        $totalProducts = $product->countTotalProducts();
        $totalPages = ceil($totalProducts / $productsPerPage);
        $data = [
            'products' => $products,
            'categories' => $categories,
            'remainingProducts' => $totalProducts,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages

        ];

        Header::render($data);
        Index::render($data);
        Footer::render();
    }
    public static function detail($id)
    {
        $category1 = new Category();
        $categories = $category1->getAllCategoryByStatus();
        
        $productModel = new Product();
        $product_detail = $productModel->getAllProductByStatus($id);
        $comment = new Comment();
        $comments = $comment->get2CommentNewestByProductAndStatus($id);
        

        $product = new Product();
        $sku = new Sku();
        $products = $product->getAllProductByStatus();
        $product_detail = $product->getOneProductByStatus($id);
        $category = $product->getCategoryById($id);
        $product_variant = $product->getProductVariant($id);
        $sku_details = $sku->getSkuByProductId($id); 


        
        if (!$product_variant) {
            NotificationHelper::error('product_detail', 'Không thể xem sản phẩm này');
            header('location: /products');
            exit;
        }

        $data = [

            'product' => $product_detail,
            'comments' => $comments,
            'products' => $products,
            'category' => $category,
            'product_variant' => $product_variant,
            'product_detail' => $product_detail,
            'sku_details' => $sku_details,
            'categories' => $categories,
           
        ];
        
        
        Header::render($data);
        Detail::render($data);
        Footer::render();
        // echo '<pre>';
        // var_dump($product_detail);

    }      
    
    public static function getProductByCategory($id)
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();

        $product = new Product();
        $products = $product->getAllProductByCategory($id);

        $data = [
            'products' => $products,
            'categories' => $categories
        ];


        Header::render($data);
        ProductCategory::render($data);
        Footer::render();
    }
    // public static function getProductByCategory($id)
    // {
    // }
    // public static function getProductByCategory($id) {}
    public function paginateProduct()
    {

        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;      
        $productsPerPage = 12;
        $offset = ($page - 1) * $productsPerPage;
        $product = new Product();
        $products = $product->getProductsWithLimit($productsPerPage, $offset);
        $totalProducts = $product->countTotalProducts();
        $totalPages = ceil($totalProducts / $productsPerPage);
        $productHtml = '';
        foreach ($products as $item) {
            $productHtml .= $this->generateProductItemHtml($item);
        }
        $paginationLinks = $this->generatePaginationLinks($page, $totalPages);

        echo json_encode([
            'productHtml' => $productHtml,
            'paginationLinks' => $paginationLinks,
            'currentPage' => $page,
            'totalPages' => $totalPages
        ]);
        exit;
    }
    private function generateProductItemHtml($item)
    {
        $discountPercentage = ($item['discount_price'] > 0) ? number_format((($item['discount_price']) / $item['price_default']) * 100) : 0;
        $productPrice = ($item['discount_price'] > 0) ? number_format($item['price_default'] - $item['discount_price']) : number_format($item['price_default']);
        $originalPrice = ($item['discount_price'] > 0) ? '<strike style="font-size: medium; color: #333">'. number_format($item['price_default']) .' VNĐ</strike>' : '';
        
        return '
        <div class="col-md-4 mb-4">
            <div class="swiper-slide">
                <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle" style="background-color: orange; color: #fff; font-weight: bold; border: orangered !important;">
                    ' . $discountPercentage . ' %
                </div>
                <div class="card position-relative">
                    <a href="/products/'.$item['id'].'">
                        <img src="' . APP_URL . 'public/uploads/products/'. $item['image'] .'" class="img-fluid rounded-4" alt="image" style="height: 300px; object-fit: cover;">
                    </a>
                    <div class="card-body p-0">
                        <a href="/products/'.$item['id'].'">
                            <h4 class="card-title pt-4 m-0">'. $item['product_name'] .'</h4>
                        </a>
                        <div class="card-text">
                            <span class="rating secondary-font">
                                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                5.0
                            </span>
                            <h4 class="secondary-font text-primary">
                                ' . $productPrice . ' VNĐ
                                ' . $originalPrice . '
                            </h4>
                            <div class="d-flex flex-wrap mt-3">
                                <a href="/products/'.$item['id'].'">
                                    <input type="hidden" name="method" value="POST">
                                    <input type="hidden" name="id" value="'. $item['id'] .'" required>
                                    <button type="submit" class="btn-cart me-3 px-3 pt-3 pb-3">
                                        <h6 class="text-uppercase m-0">Chi tiết sản phẩm</h6>
                                    </button>
                                </a>
                                <a href="#" class="btn-wishlist px-4 pt-3">
                                    <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }
    
    private function generatePaginationLinks($currentPage, $totalPages)
    {
        $links = '<div class="pagination loop-pagination d-flex justify-content-center align-items-center">';
    
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
