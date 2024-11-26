<?php
// sản phẩm theo loại

namespace App\Views\Client\Pages\Product;


use App\Views\BaseView;
use App\Views\Client\Components\Category as ComponentsCategory;
use App\Views\Client\Components\Filter;
use App\Views\Client\Components\SortBy;

class Category extends BaseView
{
    public static function render($data = null)
    {
        //         echo "<pre>";
        // var_dump($data['products']);
        // exit;
?>
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="category-section mb-4 mt-3">
                        <?php
                        // Search::render();
                        ?>
                        <!-- <div class="mt-5"> -->
                        <?php
                        ComponentsCategory::render($data['categories']);
                        Filter::render();
                        ?>
                        <!-- </div> -->
                    </div>

                </div>
                <div class="col-md-9">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <?php
                        SortBy::render();
                        ?>

                        <?php if (count($data) && count($data['products'])) : ?>
                            <div class="row">
                                <?php foreach ($data['products'] as $item) : ?>
                                    <div class="col-md-4 mb-4">

                                        <div class="swiper-slide">
                                            <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
                                                <?= number_format((($item['discount_price']) / $item['price_default']) * 100) ?>%
                                            </div>
                                            <div class="card position-relative">
                                                <a href="/products/<?= $item['id'] ?>">
                                                    <img src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" class="img-fluid rounded-4" alt="image">
                                                </a>
                                                <div class="card-body p-0">
                                                    <a href="/products/<?= $item['id'] ?>">
                                                        <h4 class="card-title pt-4 m-0"><?= $item['product_name'] ?></h4>
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
                                                        <h4 class="secondary-font text-primary"><?= number_format($item['price_default']) ?> VNĐ
                                                            <strike style="font-size: medium; color: #333"><?= number_format($item['price_default']) ?> VNĐ</strike>
                                                        </h4>

                                                        <div class="d-flex flex-wrap mt-3">
                                                            <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                                                <h5 class="m-0">Thêm vào giỏ</h5>
                                                            </a>
                                                            <a href="#" class="btn-wishlist px-4 pt-3 ">
                                                                <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                            </div>
                            <div class="row mt-5">
                                <div class="col text-center">
                                    <a href="#" class="btn btn-outline-primary">Xem thêm 79 sản phẩm khác</a>
                                </div>
                            </div>
                        <?php else: ?>
                            <h3 class="text-center text-danger">Không có sản phẩm</h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <section id="register" style="background: url('/public/assets/client/images/background-img.png') no-repeat;" class="my-5">
                <div class="container my-5 ">
                    <div class="row my-5 py-5">
                        <div class="offset-md-3 col-md-6 my-5 ">
                            <h2 class="display-4 fw-normal text-center">Giảm giá 20%</h2>
                            <h2 class="display-4 fw-normal text-center"><span class="text-primary">Khi mua lần đầu</span></h2>
                            <form>
                                <div class="mb-3">
                                    <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="Nhập Email của bạn">
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control form-control-sm" name="email" id="password1" placeholder="Mật khẩu">
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control form-control-sm" name="email" id="password2" placeholder="Nhập lại mật khẩu">
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-dark btn-lg rounded-1">ĐĂNG KÝ NGAY</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <section id="service">
                <div class="container py-5 my-5">
                    <div class="row g-md-5 pt-4">
                        <div class="col-md-3 my-3">
                            <div class="card">
                                <div>
                                    <iconify-icon class="service-icon text-primary" icon="la:shopping-cart"></iconify-icon>
                                </div>
                                <h3 class="card-title py-2 m-0">Giao Hàng Miễn Phí</h3>
                                <div class="card-text">
                                    <p class="blog-paragraph fs-6">Chúng tôi hỗ trợ giao hàng miễn phí cho đơn hàng >200</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 my-3">
                            <div class="card">
                                <div>
                                    <iconify-icon class="service-icon text-primary" icon="la:user-check"></iconify-icon>
                                </div>
                                <h3 class="card-title py-2 m-0">Thanh Toán Nhanh</h3>
                                <div class="card-text">
                                    <p class="blog-paragraph fs-6">Đảm bảo thanh toán an toàn, bảo mật tuyệt đối cho khách hàng.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 my-3">
                            <div class="card">
                                <div>
                                    <iconify-icon class="service-icon text-primary" icon="la:tag"></iconify-icon>
                                </div>
                                <h3 class="card-title py-2 m-0">Ưu Đãi Hàng Ngày</h3>
                                <div class="card-text">
                                    <p class="blog-paragraph fs-6">Nhận ngay các ưu đãi hấp dẫn mỗi ngày khi mua sắm tại cửa hàng.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 my-3">
                            <div class="card">
                                <div>
                                    <iconify-icon class="service-icon text-primary" icon="la:award"></iconify-icon>
                                </div>
                                <h3 class="card-title py-2 m-0">Đảm Bảo Yêu Cầu</h3>
                                <div class="card-text">
                                    <p class="blog-paragraph fs-6">Cam kết mang đến sản phẩm chất lượng tốt nhất cho thú cưng của bạn.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <div class="row g-0 py-5">
                <div class="col instagram-item  text-center position-relative">
                    <div class="icon-overlay d-flex justify-content-center position-absolute">
                        <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
                    </div>
                    <a href="#">
                        <img src="/public/assets/client/images/insta1.jpg" alt="insta-img" class="img-fluid rounded-3">
                    </a>
                </div>
                <div class="col instagram-item  text-center position-relative">
                    <div class="icon-overlay d-flex justify-content-center position-absolute">
                        <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
                    </div>
                    <a href="#">
                        <img src="/public/assets/client/images/insta2.jpg" alt="insta-img" class="img-fluid rounded-3">
                    </a>
                </div>
                <div class="col instagram-item  text-center position-relative">
                    <div class="icon-overlay d-flex justify-content-center position-absolute">
                        <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
                    </div>
                    <a href="#">
                        <img src="/public/assets/client/images/insta3.jpg" alt="insta-img" class="img-fluid rounded-3">
                    </a>
                </div>
                <div class="col instagram-item  text-center position-relative">
                    <div class="icon-overlay d-flex justify-content-center position-absolute">
                        <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
                    </div>
                    <a href="#">
                        <img src="/public/assets/client/images/insta4.jpg" alt="insta-img" class="img-fluid rounded-3">
                    </a>
                </div>
                <div class="col instagram-item  text-center position-relative">
                    <div class="icon-overlay d-flex justify-content-center position-absolute">
                        <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
                    </div>
                    <a href="#">
                        <img src="/public/assets/client/images/insta5.jpg" alt="insta-img" class="img-fluid rounded-3">
                    </a>
                </div>
                <div class="col instagram-item  text-center position-relative">
                    <div class="icon-overlay d-flex justify-content-center position-absolute">
                        <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
                    </div>
                    <a href="#">
                        <img src="/public/assets/client/images/insta6.jpg" alt="insta-img" class="img-fluid rounded-3">
                    </a>
                </div>
            </div>


    <?php

    }
}
