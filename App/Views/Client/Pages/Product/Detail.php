<?php

namespace App\Views\Client\Pages\Product;

use App\Helpers\AuthHelper;
use App\Views\BaseView;


class Detail extends BaseView
{
    public static function render($data = null)
    {


        $is_login = AuthHelper::checkLogin();
?>
        <style>
            .comment-container {
                width: 200%;
                display: flex;
                justify-content: center;
            }
            .comment-widgets {
                max-width: 1000px;
                width: 300%;
                max-height: 800px;
                overflow-y: auto;
                padding: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                background-color: #fff;
            }
            .comment-row {
                margin-top: 5px;
            }
            .comment-row:first-child {
                margin-top: 0;
            }
            .comment-row .p-2 img {
                margin-right: 5px;
            }
            .comment-text {
                margin-left: 10px;
            }
        </style>

        <section id="selling-product">
            <div class="container my-md-5 py-5">
                <div class="row g-md-5">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="swiper product-large-slider swiper-fade swiper-initialized swiper-horizontal swiper-watch-progress swiper-backface-hidden">
                                    <div class="swiper-wrapper" id="swiper-wrapper-bdaebd66f010b04b8" aria-live="polite">
                                        <div class="swiper-slide swiper-slide-visible swiper-slide-active" role="group" aria-label="1 / 4" style="width: 624px; opacity: 1; transform: translate3d(0px, 0px, 0px);">
                                            <img src="<?= APP_URL ?>/public/assets/client/images/<?= $data['product']['image'] ?>" class="img-fluid" style="width: 624px; opacity: 1; transform: translate3d(0px, 0px, 0px);">
                                        </div>
                                        <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 4" style="width: 624px; opacity: 0; transform: translate3d(-624px, 0px, 0px);">
                                            <img src="<?= APP_URL ?>/public/assets/client/images/<?= $data['product']['image1'] ?>" class="img-fluid">
                                        </div>
                                        <div class="swiper-slide" role="group" aria-label="3 / 4" style="width: 624px; opacity: 0; transform: translate3d(-1248px, 0px, 0px);">
                                            <img src="<?= APP_URL ?>/public/assets/client/images/<?= $data['product']['image2'] ?>" class="img-fluid">
                                        </div>
                                        <div class="swiper-slide" role="group" aria-label="4 / 4" style="width: 624px; opacity: 0; transform: translate3d(-1872px, 0px, 0px);">
                                            <img src="<?= APP_URL ?>/public/assets/client/images/<?= $data['product']['image3'] ?>" class="img-fluid">
                                        </div>

                                    </div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <!-- product-thumbnail-slider -->
                                <div thumbsslider="" class="swiper product-thumbnail-slider swiper-initialized swiper-horizontal swiper-free-mode swiper-watch-progress swiper-backface-hidden swiper-thumbs">
                                    <div class="swiper-wrapper" id="swiper-wrapper-a85acea6a38a391c" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                                        <div class="swiper-slide swiper-slide-visible swiper-slide-active swiper-slide-thumb-active" role="group" aria-label="1 / 4" style="width: 202.667px; margin-right: 8px;">
                                            <img src="<?= APP_URL ?>/public/assets/client/images/<?= $data['product']['image'] ?>" class="img-fluid">
                                        </div>
                                        <div class="swiper-slide swiper-slide-visible swiper-slide-next" role="group" aria-label="2 / 4" style="width: 202.667px; margin-right: 8px;">
                                            <img src="<?= APP_URL ?>/public/assets/client/images/<?= $data['product']['image1'] ?>" class="img-fluid">
                                        </div>
                                        <div class="swiper-slide swiper-slide-visible" role="group" aria-label="3 / 4" style="width: 202.667px; margin-right: 8px;">
                                            <img src="<?= APP_URL ?>/public/assets/client/images/<?= $data['product']['image2'] ?>" class="img-fluid">
                                        </div>
                                        <div class="swiper-slide" role="group" aria-label="4 / 4" style="width: 202.667px; margin-right: 8px;">
                                            <img src="<?= APP_URL ?>/public/assets/client/images/<?= $data['product']['image3'] ?>" class="img-fluid">
                                        </div>
                                    </div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-5 ">
                        <div class="product-info">
                            <div class="element-header">
                                <h2 itemprop="name" class="display-6"><?= $data['product']['name'] ?></h2>
                                <div class="rating-container d-flex gap-0 align-items-center">
                                    <span class="rating secondary-font">
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        5.0</span>
                                </div>
                            </div>
                            <div class="product-price pt-3 pb-3">
                                <strong class="text-primary display-6 fw-bold"><?= $data['product']['discount_price'] ?></strong><del class="ms-2"><?= $data['product']['price'] ?></del>
                            </div>
                            <p><?= $data['product']['short_description'] ?></p>
                            <div class="swatch product-select pt-3" data-option-index="1">
                                <h6 class="item-title fw-bold">Kích thước</h6>
                                <ul class="select-list list-unstyled d-flex">
                                    <li data-value="S" class="select-item pe-3">
                                        <a href="#" class="btn btn-light"><?= $data['product']['Size1'] ?></a>
                                    </li>
                                    <li data-value="M" class="select-item pe-3">
                                        <a href="#" class="btn btn-light active"><?= $data['product']['Size2'] ?></a>
                                    </li>
                                    <li data-value="L" class="select-item pe-3">
                                        <a href="#" class="btn btn-light"><?= $data['product']['Size3'] ?></a>
                                    </li>
                                    <li data-value="L" class="select-item">
                                        <a href="#" class="btn btn-light"><?= $data['product']['Size4'] ?></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-quantity pt-2">
                                <div class="stock-number text-dark"><em>Số lượng còn trong kho: <?= $data['product']['stock_quantity'] ?></em></div>
                                <div class="stock-button-wrap">

                                    <div class="input-group product-qty align-items-center w-25">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-light btn-number" data-type="minus">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#minus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="quantity" class="form-control input-number text-center p-2 mx-1" value="1">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-light btn-number" data-type="plus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#plus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>

                                    <div class="d-flex flex-wrap pt-4">
                                        <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                            <h5 class="text-uppercase m-0">Thêm vào giỏ</h5>
                                        </a>
                                        <a href="#" class="btn-wishlist px-4 pt-3 ">
                                            <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="meta-product pt-4">
                            <div class="meta-item d-flex align-items-baseline">
                                <h6 class="item-title fw-bold no-margin pe-2">SKU:</h6>
                                <ul class="select-list list-unstyled d-flex">
                                    <li data-value="S" class="select-item"><?= $data['product']['sku'] ?></li>
                                </ul>
                            </div>
                            <div class="meta-item d-flex align-items-baseline">
                                <h6 class="item-title fw-bold no-margin pe-2">Danh mục:</h6>
                                <ul class="select-list list-unstyled d-flex">
                                    <li data-value="S" class="select-item">
                                        <a href="#"><?= $data['product']['category'] ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>

        <section class="product-info-tabs py-md-5">
            <div class="container">
                <div class="row">
                    <div class="d-flex flex-column flex-md-row align-items-start gap-5">
                        <div class="nav flex-row flex-wrap flex-md-column nav-pills me-3 col-lg-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link fs-5 mb-2 text-start active" id="v-pills-description-tab" data-bs-toggle="pill" data-bs-target="#v-pills-description" type="button" role="tab" aria-controls="v-pills-description" aria-selected="true" tabindex="-1">Mô tả</button>
                            <button class="nav-link fs-5 mb-2 text-start" id="v-pills-additional-tab" data-bs-toggle="pill" data-bs-target="#v-pills-additional" type="button" role="tab" aria-controls="v-pills-additional" aria-selected="false" tabindex="-1">Thông tin bổ sung</button>
                            <button class="nav-link fs-5 mb-2 text-start" id="v-pills-reviews-tab" data-bs-toggle="pill" data-bs-target="#v-pills-reviews" type="button" role="tab" aria-controls="v-pills-reviews" aria-selected="false" tabindex="-1">Đánh giá của khách hàng</button>
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade active show" id="v-pills-description" role="tabpanel" aria-labelledby="v-pills-description-tab" tabindex="0">
                                <h2>Mô tả sản phẩm</h2>
                                <p><?= $data['product']['long_description'] ?>
                            </div>
                            <div class="tab-pane fade" id="v-pills-additional" role="tabpanel" aria-labelledby="v-pills-additional-tab" tabindex="0">
                                <h2>Cách sử dụng sản phẩm</h2>
                                <p><?= $data['product']['how_to'] ?></p>
                            </div>
                            <div class="tab-pane fade" id="v-pills-reviews" role="tabpanel" aria-labelledby="v-pills-reviews-tab" tabindex="0">
                                <div class="review-box">
                                    <div class="comment-widgets">
                                        <?php
                                        if (isset($data) && isset($data['comments']) && $data && $data['comments']) :
                                            foreach ($data['comments'] as $item) :
                                        ?>
                                                <!-- Comment Row -->
                                                <div class="d-flex flex-row comment-row m-t-0">
                                                    <div class="p-2">
                                                        <?php if ($item['avatar']) : ?>
                                                            <img src="<?= APP_URL ?>/public/uploads/users/<?= $item['avatar'] ?>" alt="user" width="50" class="rounded">
                                                        <?php else : ?>
                                                            <img src="<?= APP_URL ?>/public/uploads/users/default-user.jpg" alt="user" width="50" class="rounded">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="comment-text w-100">
                                                        <h6 class="font-medium"><?= $item['first_name'] ?> - <?= $item['username'] ?></h6>
                                                        <span class="m-b-15 d-block"><?= $item['content'] ?></span>
                                                        <div class="comment-footer">
                                                            <span class="text-muted float-end"><?= $item['created_at'] ?></span>
                                                            <?php if (isset($data) && $is_login && ($_SESSION['user']['id'] == $item['user_id'])) : ?>
                                                                <!-- Nút Sửa -->
                                                                <button type="button" class="btn btn-cyan btn-sm"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#editComment<?= $item['id'] ?>"
                                                                    aria-expanded="false"
                                                                    aria-controls="editComment<?= $item['id'] ?>">Sửa</button>

                                                                <!-- Nút Xoá -->
                                                                <form action="/comments/<?= $item['id'] ?>" method="post" onsubmit="return confirm('Chắc chưa?')" style="display: inline-block">
                                                                    <input type="hidden" name="method" value="DELETE">
                                                                    <input type="hidden" name="product_id" value="<?= $data['product']['id'] ?>">
                                                                    <button type="submit" class="btn btn-danger btn-sm">Xoá</button>
                                                                </form>

                                                                <!-- Form Sửa Bình Luận -->
                                                                <div class="collapse mt-3" id="editComment<?= $item['id'] ?>">
                                                                    <div class="card card-body">
                                                                        <form action="/comments/<?= $item['id'] ?>" method="post">
                                                                            <input type="hidden" name="method" value="PUT">
                                                                            <input type="hidden" name="product_id" value="<?= $data['product']['id'] ?>">
                                                                            <div class="form-group">
                                                                                <label for="commentContent<?= $item['id'] ?>">Bình luận</label>
                                                                                <textarea class="form-control rounded-0" name="content" id="commentContent<?= $item['id'] ?>" rows="3" placeholder="Nhập bình luận..."><?= $item['content'] ?></textarea>
                                                                            </div>
                                                                            <div class="comment-footer mt-3">
                                                                                <button type="submit" class="btn btn-cyan btn-sm">Gửi</button>
                                                                                <!-- Nút Đóng -->
                                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="#editComment<?= $item['id'] ?>">
                                                                                    Đóng
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <h6 class="text-center text-danger">Chưa có bình luận</h6>
                                        <?php endif; ?>

                                        <!-- Form Thêm Bình Luận -->
                                        <?php if (isset($data) && $is_login) : ?>
                                            <div class="d-flex flex-row comment-row mt-4">
                                                <div class="p-2">
                                                    <?php if ($_SESSION['user']['avatar']) : ?>
                                                        <img src="<?= APP_URL ?>/public/uploads/users/<?= $_SESSION['user']['avatar'] ?>" alt="user" width="50" class="rounded">
                                                    <?php else : ?>
                                                        <img src="<?= APP_URL ?>/public/uploads/users/default-user.jpg" alt="user" width="50" class="rounded">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="comment-text w-100">
                                                    <h6 class="font-medium"><?= $_SESSION['user']['first_name'] ?> - <?= $_SESSION['user']['username'] ?></h6>
                                                    <form action="/comments" method="post">
                                                        <input type="hidden" name="method" value="POST">
                                                        <input type="hidden" name="product_id" value="<?= $data['product']['id'] ?>">
                                                        <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>">
                                                        <div class="form-group">
                                                            <label for="content">Bình luận</label>
                                                            <textarea class="form-control rounded-0" name="content" id="content" rows="3" placeholder="Nhập bình luận..."></textarea>
                                                        </div>
                                                        <div class="comment-footer">
                                                            <button type="submit" class="btn btn-cyan btn-sm">Gửi</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <h6 class="text-center text-danger">Vui lòng đăng nhập để bình luận</h6>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>
                </div>
        </section>
        <section id="register" style="background: url('/public/assets/client/images/background-img.png') no-repeat;" class="my-5">
            <div class="container my-5 ">
                <div class="row my-5 py-5">
                    <div class="offset-md-3 col-md-6 my-5 ">
                        <h2 class="display-3 fw-normal text-center">Giảm Giá 20%<span class="text-primary">Khi Mua Lần Đầu</span>
                        </h2>
                        <form>
                            <div class="mb-3">
                                <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Nhập Email của bạn">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control form-control-lg" name="email" id="password1" placeholder="Mật khẩu">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control form-control-lg" name="email" id="password2" placeholder="Nhập lại mật khẩu">
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-dark btn-lg rounded-1">ĐĂNG KÝ NGAY</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section id="service" class="mt-5 pt-2">
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
        <section id="insta" class="my-3">
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
        </section>
<?php
    }
}
