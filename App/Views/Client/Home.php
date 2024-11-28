<?php

namespace App\Views\Client;

use App\Views\BaseView;

class Home extends BaseView
{
    public static function render($data = null)
    {
?>
        <style>
            button:focus {
                outline: none;
                box-shadow: none;
            }

            button {
                border: none;
                background: none;
            }

            .btn-cart {
                border: 1px solid #D3D4D4;
                border-radius: 5px;
                background-color: #f8f9fa;
                padding: 10px 15px;
                box-shadow: none;
            }

            .btn-cart:hover {
                background-color: #e2e6ea;
            }

            .btn-cart h6 {
                margin: 0;
                font-size: 14px;
                color: #333;
            }
        </style>


        <section id="banner" style="background: #F9F3EC;">
            <div class="container">
                <div class="swiper main-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide py-5">
                            <div class="row banner-content align-items-center">
                                <div class="img-wrapper col-md-5">
                                    <img src="public/assets/client/images/banner-img.png" class="img-fluid">
                                </div>
                                <div class="content-wrapper col-md-7 p-5 mb-5">
                                    <div class="secondary-font text-primary text-uppercase mb-4">Tiết kiệm từ 10 đến 20%</div>
                                    <h2 class="banner-title display-4 fw-normal">Điểm đến lý tưởng nhất cho
                                        <span class="text-primary">thú cưng của bạn</span>
                                    </h2>
                                    <a href="/products" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                                        Mua ngay
                                        <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                                            <use xlink:href="#arrow-right"></use>
                                        </svg></a>
                                </div>

                            </div>
                        </div>
                        <div class="swiper-slide py-5">
                            <div class="row banner-content align-items-center">
                                <div class="img-wrapper col-md-5">
                                    <img src="public/assets/client/images//banner-img3.png" class="img-fluid">
                                </div>
                                <div class="content-wrapper col-md-7 p-5 mb-5">
                                    <div class="secondary-font text-primary text-uppercase mb-4">Tiết kiệm từ 10 - 20 %</div>
                                    <h2 class="banner-title display-3 fw-normal">Điểm đến lý tưởng nhất cho <span
                                            class="text-primary">thú cưng của bạn</span>
                                    </h2>
                                    <a href="/products" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                                        Mua ngay
                                        <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                                            <use xlink:href="#arrow-right"></use>
                                        </svg></a>
                                </div>

                            </div>
                        </div>
                        <div class="swiper-slide py-5">
                            <div class="row banner-content align-items-center">
                                <div class="img-wrapper col-md-5">
                                    <img src="public/assets/client/images/banner-img4.png" class="img-fluid">
                                </div>
                                <div class="content-wrapper col-md-7 p-5 mb-5">
                                    <div class="secondary-font text-primary text-uppercase mb-4">Tiết kiệm từ 10 - 20 %</div>
                                    <h2 class="banner-title display-3 fw-normal">Điểm đến lý tưởng nhất cho <span
                                            class="text-primary">thú cưng của bạn</span>
                                    </h2>
                                    <a href="/products" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                                        Mua ngay
                                        <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                                            <use xlink:href="#arrow-right"></use>
                                        </svg></a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="swiper-pagination mb-5"></div>

                </div>
            </div>
        </section>

        <section id="categories">
            <div class="container my-3 py-5">
                <div class="row my-5">
                    <div class="col text-center">
                        <a href="#" class="categories-item">
                            <iconify-icon class="category-icon" icon="ph:bowl-food"></iconify-icon>
                            <h6>Foodies</h6>
                        </a>
                    </div>
                    <div class="col text-center">
                        <a href="#" class="categories-item">
                            <iconify-icon class="category-icon" icon="ph:bird"></iconify-icon>
                            <h6>Bird Shop</h6>
                        </a>
                    </div>
                    <div class="col text-center">
                        <a href="#" class="categories-item">
                            <iconify-icon class="category-icon" icon="ph:dog"></iconify-icon>
                            <h6>Dog Shop</h6>
                        </a>
                    </div>
                    <div class="col text-center">
                        <a href="#" class="categories-item">
                            <iconify-icon class="category-icon" icon="ph:fish"></iconify-icon>
                            <h6>Fish Shop</h6>
                        </a>
                    </div>
                    <div class="col text-center">
                        <a href="#" class="categories-item">
                            <iconify-icon class="category-icon" icon="ph:cat"></iconify-icon>
                            <h6>Cat Shop</h6>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="categories" class="my-5 overflow-hidden">
            <div class="container pb-5">
                <?php foreach ($data['categories'] as $category): ?>
                    <?php if (!empty($data['categorizedProducts'][$category['category_name']])): ?>
                        <div class="category-section mb-5">
                            <!-- Hiển thị tên danh mục -->
                            <h2 class="display-6 fw-normal"><?= htmlspecialchars($category['category_name']) ?></h2>

                            <div class="products-carousel swiper pt-5">
                                <div class="swiper-wrapper">
                                    <?php foreach ($data['categorizedProducts'][$category['category_name']] as $item): ?>
                                        <div class="swiper-slide">
                                            <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
                                                <?= number_format((($item['discount_price']) / $item['price_default']) * 100) ?>%

                                            </div>
                                            <div class="card position-relative">
                                                <a href="/products/<?= $item['id'] ?>"><img src="<?= APP_URL ?>public/uploads/products/<?= $item['image'] ?>" class="img-fluid rounded-4" alt="image" style="height: 300px; object-fit: cover;"></a>
                                                <div class="card-body p-0">
                                                    <a href="/products/<?= $item['id'] ?>">
                                                        <h4 class="card-title pt-4 m-0"><?= htmlspecialchars($item['product_name']) ?></h4>
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

                                                        <?php if ($item['discount_price'] > 0): ?>
                                                            <h4 class="secondary-font text-primary"><?= number_format($item['price_default'] - $item['discount_price']) ?> VNĐ
                                                                <strike style="font-size: medium; color: #333"><?= number_format($item['price_default']) ?> VNĐ</strike>
                                                            </h4>
                                                        <?php else: ?>
                                                            <h4 class="secondary-font text-primary"><?= number_format($item['price_default']) ?> VNĐ</h4>
                                                        <?php endif; ?>

                                                        <?php
                            
                                                        ?>

                                                        <div class="d-flex flex-wrap mt-3">
                                                            <!-- Form với nút thêm giỏ hàng-->
                                                            <form action="/cart/add" method="post" class="m-0">
                                                                <input type="hidden" name="method" value="POST">
                                                                <input type="hidden" name="id" value="<?= $item['id'] ?>" required>
                                                                <button type="submit" class="btn-cart me-3 px-3 pt-3 pb-3">
                                                                    <h6 class="text-uppercase m-0">Thêm vào giỏ hàng</h6>
                                                                </button>
                                                            </form>


                                                            <!-- Nút Wishlist -->
                                                            <a href="/wishlist" class="btn-wishlist px-4 pt-3">
                                                                <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                                            </a>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <!-- Hiển thị phần trăm giảm giá cho danh mục -->
                                <?php foreach ($data['categorizedProducts'][$category['category_name']] as $item): ?>
                                    <?php if ($item['discount_price'] > 0): ?>
                                        <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
                                            <?= number_format((($item['discount_price']) / $item['price_default']) * 100) ?>%
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </section>




        <section id="foodies" class="my-5">
            <div class="container my-5 py-5">

                <div class="section-header d-md-flex justify-content-between align-items-center">
                    <h2 class="display-6 fw-normal">Thức ăn</h2>
                    <div class="mb-4 mb-md-0">
                        <p class="m-0">
                            <button class="filter-button me-4  active" data-filter="*">ALL</button>
                            <button class="filter-button me-4 " data-filter=".cat">CAT</button>
                            <button class="filter-button me-4 " data-filter=".dog">DOG</button>
                            <button class="filter-button me-4 " data-filter=".bird">BIRD</button>
                        </p>
                    </div>
                    <div>
                        <a href="/products" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                            Mua ngay
                            <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                                <use xlink:href="#arrow-right"></use>
                            </svg></a>
                    </div>
                </div>

                <div class="isotope-container row">

                    <div class="item cat col-md-4 col-lg-3 my-4">
                        <div class="card position-relative">
                            <a href="single-product.html"><img src="public/assets/client/images/item9.jpg"
                                    class="img-fluid rounded-4" alt="image"></a>
                            <div class="card-body p-0">
                                <a href="single-product.html">
                                    <h4 class="card-title pt-4 m-0">Grey hoodie</h4>
                                </a>

                                <div class="card-text">
                                    <span class="rating secondary-font">
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        5.0</span>

                                    <h4 class="secondary-font text-primary">31,000 VNĐ</h4>

                                    <div class="d-flex flex-wrap mt-3">
                                        <a href="/cart" class="btn-cart me-3 px-3 pt-3 pb-3">
                                            <h6 class="text-uppercase m-0">Thêm vào giỏ hàng</h6>
                                        </a>
                                        <a href="/wishlist" class="btn-wishlist px-4 pt-3 ">
                                            <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                        </a>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="item dog col-md-4 col-lg-3 my-4">
                        <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
                            New
                        </div>
                        <div class="card position-relative">
                            <a href="single-product.html"><img src="public/assets/client/images/item10.jpg"
                                    class="img-fluid rounded-4" alt="image"></a>
                            <div class="card-body p-0">
                                <a href="single-product.html">
                                    <h4 class="card-title pt-4 m-0">Grey hoodie</h4>
                                </a>

                                <div class="card-text">
                                    <span class="rating secondary-font">
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        5.0</span>

                                    <h4 class="secondary-font text-primary">31,000 VNĐ</h4>

                                    <div class="d-flex flex-wrap mt-3">
                                        <a href="#" class="btn-cart me-3 px-3 pt-3 pb-3">
                                            <h6 class="text-uppercase m-0">Thêm vào giỏ hàng</h6>
                                        </a>
                                        <a href="#" class="btn-wishlist px-4 pt-3 ">
                                            <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                        </a>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="item dog col-md-4 col-lg-3 my-4">
                        <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
            New
          </div> -->
                        <div class="card position-relative">
                            <a href="single-product.html"><img src="public/assets/client/images/item11.jpg"
                                    class="img-fluid rounded-4" alt="image"></a>
                            <div class="card-body p-0">
                                <a href="single-product.html">
                                    <h4 class="card-title pt-4 m-0">Grey hoodie</h4>
                                </a>

                                <div class="card-text">
                                    <span class="rating secondary-font">
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        5.0</span>

                                    <h4 class="secondary-font text-primary">31,000 VNĐ</h4>

                                    <div class="d-flex flex-wrap mt-3">
                                        <a href="#" class="btn-cart me-3 px-3 pt-3 pb-3">
                                            <h6 class="text-uppercase m-0">Thêm vào giỏ hàng</h6>
                                        </a>
                                        <a href="#" class="btn-wishlist px-4 pt-3 ">
                                            <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                        </a>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="item cat col-md-4 col-lg-3 my-4">
                        <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
                            Sold
                        </div>
                        <div class="card position-relative">
                            <a href="single-product.html"><img src="public/assets/client/images/item12.jpg"
                                    class="img-fluid rounded-4" alt="image"></a>
                            <div class="card-body p-0">
                                <a href="single-product.html">
                                    <h4 class="card-title pt-4 m-0">Grey hoodie</h4>
                                </a>

                                <div class="card-text">
                                    <span class="rating secondary-font">
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        5.0</span>

                                    <h4 class="secondary-font text-primary">31,000 VNĐ31,000 VNĐ</h4>

                                    <div class="d-flex flex-wrap mt-3">
                                        <a href="#" class="btn-cart me-3 px-3 pt-3 pb-3">
                                            <h6 class="text-uppercase m-0">Thêm vào giỏ hàng</h6>
                                        </a>
                                        <a href="#" class="btn-wishlist px-4 pt-3 ">
                                            <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                        </a>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="item bird col-md-4 col-lg-3 my-4">
                        <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
            New
          </div> -->
                        <div class="card position-relative">
                            <a href="single-product.html"><img src="public/assets/client/images/item13.jpg"
                                    class="img-fluid rounded-4" alt="image"></a>
                            <div class="card-body p-0">
                                <a href="single-product.html">
                                    <h4 class="card-title pt-4 m-0">Grey hoodie</h4>
                                </a>

                                <div class="card-text">
                                    <span class="rating secondary-font">
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        5.0</span>

                                    <h4 class="secondary-font text-primary">31,000 VNĐ</h4>

                                    <div class="d-flex flex-wrap mt-3">
                                        <a href="#" class="btn-cart me-3 px-3 pt-3 pb-3">
                                            <h6 class="text-uppercase m-0">Thêm vào giỏ hàng</h6>
                                        </a>
                                        <a href="#" class="btn-wishlist px-4 pt-3 ">
                                            <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                        </a>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="item bird col-md-4 col-lg-3 my-4">
                        <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
            New
          </div> -->
                        <div class="card position-relative">
                            <a href="single-product.html"><img src="public/assets/client/images/item14.jpg"
                                    class="img-fluid rounded-4" alt="image"></a>
                            <div class="card-body p-0">
                                <a href="single-product.html">
                                    <h4 class="card-title pt-4 m-0">Grey hoodie</h4>
                                </a>

                                <div class="card-text">
                                    <span class="rating secondary-font">
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        5.0</span>

                                    <h4 class="secondary-font text-primary">31,000 VNĐ</h4>

                                    <div class="d-flex flex-wrap mt-3">
                                        <a href="#" class="btn-cart me-3 px-3 pt-3 pb-3">
                                            <h6 class="text-uppercase m-0">Thêm vào giỏ hàng</h6>
                                        </a>
                                        <a href="#" class="btn-wishlist px-4 pt-3 ">
                                            <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                        </a>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="item dog col-md-4 col-lg-3 my-4">
                        <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
                            Sale
                        </div>
                        <div class="card position-relative">
                            <a href="single-product.html"><img src="public/assets/client/images/item15.jpg"
                                    class="img-fluid rounded-4" alt="image"></a>
                            <div class="card-body p-0">
                                <a href="single-product.html">
                                    <h4 class="card-title pt-4 m-0">Grey hoodie</h4>
                                </a>

                                <div class="card-text">
                                    <span class="rating secondary-font">
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        5.0</span>

                                    <h4 class="secondary-font text-primary">31,000 VNĐ</h4>

                                    <div class="d-flex flex-wrap mt-3">
                                        <a href="#" class="btn-cart me-3 px-3 pt-3 pb-3">
                                            <h6 class="text-uppercase m-0">Thêm vào giỏ hàng</h6>
                                        </a>
                                        <a href="#" class="btn-wishlist px-4 pt-3 ">
                                            <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                        </a>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="item cat col-md-4 col-lg-3 my-4">

                        <div class="card position-relative">
                            <a href="single-product.html"><img src="public/assets/client/images/item16.jpg"
                                    class="img-fluid rounded-4" alt="image"></a>
                            <div class="card-body p-0">
                                <a href="single-product.html">
                                    <h4 class="card-title pt-4 m-0">Grey hoodie</h4>
                                </a>

                                <div class="card-text">
                                    <span class="rating secondary-font">
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        5.0</span>

                                    <h4 class="secondary-font text-primary">31,000 VNĐ</h4>

                                    <div class="d-flex flex-wrap mt-3">
                                        <a href="#" class="btn-cart me-3 px-3 pt-3 pb-3">
                                            <h6 class="text-uppercase m-0">Thêm vào giỏ hàng</h6>
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


            </div>
        </section>

        <section id="banner-2" class="my-3" style="background: #F9F3EC;">
            <div class="container">
                <div class="row flex-row-reverse banner-content align-items-center">
                    <div class="img-wrapper col-12 col-md-6">
                        <img src="public/assets/client/images/banner-img2.png" class="img-fluid">
                    </div>
                    <div class="content-wrapper col-12 offset-md-1 col-md-5 p-5">
                        <div class="secondary-font text-primary text-uppercase mb-3 fs-4">Giảm giá lên đến 40%</div>
                        <h2 class="banner-title display-1 fw-normal">Xả hàng giảm giá !!!
                        </h2>
                        <a href="/products" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                            Mua ngay
                            <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                                <use xlink:href="#arrow-right"></use>
                            </svg></a>
                    </div>

                </div>
            </div>
        </section>

        <section id="testimonial">
            <div class="container my-5 py-5">
                <div class="row">
                    <div class="offset-md-1 col-md-10">
                        <div class="swiper testimonial-swiper">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <div class="row ">
                                        <div class="col-2">
                                            <iconify-icon icon="ri:double-quotes-l"
                                                class="quote-icon text-primary"></iconify-icon>
                                        </div>
                                        <div class="col-md-10 mt-md-5 p-5 pt-0 pt-md-5">
                                            <p class="testimonial-content fs-2">Mình không giỏi công nghệ lắm nhưng việc mua sắm trên trang này thật dễ dàng. Tất cả sản phẩm được chia thành các danh mục rõ ràng, giúp mình tìm được thứ mình cần chỉ trong vài phút. Rất tiện lợi!</p>
                                            <p class="text-black">- Thúy An</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="row ">
                                        <div class="col-2">
                                            <iconify-icon icon="ri:double-quotes-l"
                                                class="quote-icon text-primary"></iconify-icon>
                                        </div>
                                        <div class="col-md-10 mt-md-5 p-5 pt-0 pt-md-5">
                                            <p class="testimonial-content fs-2">Giao diện dễ dùng và đội ngũ hỗ trợ cực kỳ thân thiện. Mình đã gặp chút vấn đề khi đặt hàng nhưng nhân viên hỗ trợ rất nhanh chóng và tận tình giúp mình. Mình cảm thấy rất yên tâm khi mua sắm ở đây.</p>
                                            <p class="text-black">- Minh Tú</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="row ">
                                        <div class="col-2">
                                            <iconify-icon icon="ri:double-quotes-l"
                                                class="quote-icon text-primary"></iconify-icon>
                                        </div>
                                        <div class="col-md-10 mt-md-5 p-5 pt-0 pt-md-5">
                                            <p class="testimonial-content fs-2">Mình rất vui khi tìm được một trang web có phụ kiện chất lượng mà giá cả lại phải chăng như thế này. Mọi thứ từ vòng cổ đến áo khoác cho cún cưng đều đẹp và bền. Cảm ơn shop rất nhiều!</p>
                                            <p class="text-black">- Hoàng Duy</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="swiper-pagination"></div>

                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section id="bestselling" class="my-5 overflow-hidden">
            <div class="container py-5 mb-5">

                <div class="section-header d-md-flex justify-content-between align-items-center mb-3">
                    <h2 class="display-6 fw-normal">Sản phẩm nổi bật</h2>
                    <div>
                        <a href="/products" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                            Mua ngay
                            <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                                <use xlink:href="#arrow-right"></use>
                            </svg></a>
                    </div>
                </div>

                <div class="products-carousel swiper">
                    <div class="swiper-wrapper">
                        <?php if (isset($data['featuredProducts']) && count($data['featuredProducts']) > 0): ?>
                            <?php foreach ($data['featuredProducts'] as $item): ?>
                                <div class="swiper-slide">
                                    <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
                                        <?= number_format((($item['discount_price']) / $item['price_default']) * 100) ?>%

                                    </div>
                                    <div class="card position-relative">
                                        <a href="/products/<?= $item['id'] ?>"><img src="<?= APP_URL ?>public/uploads/products/<?= $item['image'] ?>"
                                                class="img-fluid rounded-4" alt="image" style="height: 300px; object-fit: cover;"></a>
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
                                                <?php if ($item['discount_price'] > 0): ?>
                                                    <h4 class="secondary-font text-primary">
                                                        <?= number_format($item['price_default'] - $item['discount_price']) ?> VNĐ
                                                        <strike style="font-size: medium; color: #333"><?= number_format($item['price_default']) ?> VNĐ</strike>
                                                    </h4>
                                                <?php else: ?>
                                                    <h4 class="secondary-font text-primary"><?= number_format($item['price_default']) ?> VNĐ</h4>
                                                <?php endif; ?>

                                                <div class="d-flex flex-wrap mt-3">
                                                    <a href="/cart" class="btn-cart me-3 px-3 pt-3 pb-3">
                                                        <h6 class="text-uppercase m-0">Thêm vào giỏ hàng</h6>
                                                    </a>
                                                    <a href="/wishlist" class="btn-wishlist px-4 pt-3">
                                                        <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <h3 class="text-center text-danger">Không có sản phẩm nổi bật</h3>
                        <?php endif; ?>
                    </div>
                </div>


                <!-- / category-carousel -->


            </div>
        </section>

        <section id="register" style="background: url('public/assets/client/images/background-img.png') no-repeat;">
            <div class="container ">
                <div class="row my-5 py-5">
                    <div class="offset-md-3 col-md-6 my-5 ">
                        <h2 class="display-4 fw-normal text-center">Giảm 20% cho <span class="text-primary">đơn hàng đầu
                                tiên</span>
                        </h2>

                        <form>
                            <div class="mb-3">
                                <input type="email" class="form-control form-control-sm" name="email" id="email"
                                    placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control form-control-sm" name="email" id="password1"
                                    placeholder="Mật khẩu">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control form-control-sm" name="email" id="password2"
                                    placeholder="Nhập lại mật khẩu">
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-dark btn-lg rounded-1">Đăng ký ngay</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section id="latest-blog" class="my-5">
            <div class="container py-5 my-5">
                <div class="row mt-5">
                    <div class="section-header d-md-flex justify-content-between align-items-center mb-3">
                        <h2 class="display-6 fw-normal">Bài viết mới nhất</h2>
                        <div>
                            <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                                Xem thêm
                                <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                                    <use xlink:href="#arrow-right"></use>
                                </svg></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if (!empty($data['latestBlogs'])): ?>
                        <?php foreach ($data['latestBlogs'] as $item): ?>
                            <?php
                            $create_at = $item['created_at'];
                            $date = date_create($create_at);
                            $day = date_format($date, 'd');
                            $monthNumber = date_format($date, 'm');

                            $months = [
                                '01' => 'JAN',
                                '02' => 'FEB',
                                '03' => 'MAR',
                                '04' => 'APR',
                                '05' => 'MAY',
                                '06' => 'JUN',
                                '07' => 'JUL',
                                '08' => 'AUG',
                                '09' => 'SEP',
                                '10' => 'OCT',
                                '11' => 'NOV',
                                '12' => 'DEC'
                            ];

                            $month = $months[$monthNumber];
                            ?>
                            <div class="col-md-4 my-4 my-md-0">
                                <div class="z-1 position-absolute rounded-3 m-2 px-3 pt-1 bg-light">
                                    <h3 class="secondary-font text-primary m-0"><?= $day ?></h3>
                                    <p class="secondary-font fs-6 m-0"><?= strtoupper($month) ?></p>

                                </div>
                                <div class="card position-relative">
                                    <a href="/blogs/<?= $item['id'] ?>"><img src="<?= APP_URL ?>public/uploads/blogs/<?= $item['image'] ?>"
                                            class="img-fluid rounded-4" alt="image" style="height: 300px; object-fit: cover;"></a>
                                    <div class="card-body p-0">
                                        <a href="/blogs/<?= $item['id'] ?>">
                                            <h4 class="card-title pt-4 pb-3 m-0"><?= $item['title'] ?></h4>
                                        </a>

                                        <div class="card-text">
                                            <p class="blog-paragraph fs-6">
                                                <?= strlen($item['content']) > 150 ? substr($item['content'], 0, 150) . '...' : $item['content'] ?>
                                            </p>
                                            <a href="/blogs/<?= $item['id'] ?>" class="blog-read" >Đọc thêm</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    <?php else: ?>
                        <p>Không có bài viết mới nhất.</p>
                    <?php endif; ?>

                    <!-- <div class="col-md-4 my-4 my-md-0">
                        <div class="z-1 position-absolute rounded-3 m-2 px-3 pt-1 bg-light">
                            <h3 class="secondary-font text-primary m-0">21</h3>
                            <p class="secondary-font fs-6 m-0">Feb</p>

                        </div>
                        <div class="card position-relative">
                            <a href="single-post.html"><img src="public/assets/client/images/blog2.jpg"
                                    class="img-fluid rounded-4" alt="image"></a>
                            <div class="card-body p-0">
                                <a href="single-post.html">
                                    <h3 class="card-title pt-4 pb-3 m-0">How to know your pet is hungry</h3>
                                </a>

                                <div class="card-text">
                                    <p class="blog-paragraph fs-6">At the core of our practice is the idea that cities are the
                                        incubators of
                                        our greatest
                                        achievements, and the best hope for a sustainable future.</p>
                                    <a href="single-post.html" class="blog-read">Đọc thêm</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-4 my-md-0">
                        <div class="z-1 position-absolute rounded-3 m-2 px-3 pt-1 bg-light">
                            <h3 class="secondary-font text-primary m-0">22</h3>
                            <p class="secondary-font fs-6 m-0">Feb</p>

                        </div>
                        <div class="card position-relative">
                            <a href="single-post.html"><img src="public/assets/client/images/blog3.jpg"
                                    class="img-fluid rounded-4" alt="image"></a>
                            <div class="card-body p-0">
                                <a href="single-post.html">
                                    <h3 class="card-title pt-4 pb-3 m-0">Best home for your pets</h3>
                                </a>

                                <div class="card-text">
                                    <p class="blog-paragraph fs-6">At the core of our practice is the idea that cities are the
                                        incubators of
                                        our greatest
                                        achievements, and the best hope for a sustainable future.</p>
                                    <a href="single-post.html" class="blog-read">Đọc thêm</a>
                                </div>

                            </div>
                        </div>
                    </div> -->
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

        <section id="insta" class="my-5">
            <div class="row g-0 py-5">
                <div class="col instagram-item  text-center position-relative">
                    <div class="icon-overlay d-flex justify-content-center position-absolute">
                        <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
                    </div>
                    <a href="#">
                        <img src="public/assets/client/images/insta1.jpg" alt="insta-img" class="img-fluid rounded-3">
                    </a>
                </div>
                <div class="col instagram-item  text-center position-relative">
                    <div class="icon-overlay d-flex justify-content-center position-absolute">
                        <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
                    </div>
                    <a href="#">
                        <img src="public/assets/client/images/insta2.jpg" alt="insta-img" class="img-fluid rounded-3">
                    </a>
                </div>
                <div class="col instagram-item  text-center position-relative">
                    <div class="icon-overlay d-flex justify-content-center position-absolute">
                        <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
                    </div>
                    <a href="#">
                        <img src="public/assets/client/images/insta3.jpg" alt="insta-img" class="img-fluid rounded-3">
                    </a>
                </div>
                <div class="col instagram-item  text-center position-relative">
                    <div class="icon-overlay d-flex justify-content-center position-absolute">
                        <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
                    </div>
                    <a href="#">
                        <img src="public/assets/client/images/insta4.jpg" alt="insta-img" class="img-fluid rounded-3">
                    </a>
                </div>
                <div class="col instagram-item  text-center position-relative">
                    <div class="icon-overlay d-flex justify-content-center position-absolute">
                        <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
                    </div>
                    <a href="#">
                        <img src="public/assets/client/images/insta5.jpg" alt="insta-img" class="img-fluid rounded-3">
                    </a>
                </div>
                <div class="col instagram-item  text-center position-relative">
                    <div class="icon-overlay d-flex justify-content-center position-absolute">
                        <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
                    </div>
                    <a href="#">
                        <img src="public/assets/client/images/insta6.jpg" alt="insta-img" class="img-fluid rounded-3">
                    </a>
                </div>
            </div>
        </section>
<?php
    }
}