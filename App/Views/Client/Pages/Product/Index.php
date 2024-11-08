<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Views\Client\Components\Category;

class Index extends BaseView
{
  public static function render($data = null)
  {
?>

    <div class="container mt-5 mb-5">
      <div class="row">
        <div class="col-md-3">
          <div class="category-section mb-4 mt-3">
          <div class="search-bar border rounded-2 border-dark-subtle pe-3">
            <form id="search-form" class="text-center d-flex align-items-center" action="" method="">
                <input type="text" class="form-control border-0 bg-transparent" placeholder="Tìm kiếm sản phẩm">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z"></path>
                </svg>
            </form>
        </div>
        <div class="mt-5">
        <?php
              Category::render();
              ?>
              <h5 class="mb-3">Lọc giá</h5>
              <select class="filter-categories border-0 m-0">
                <option value="">Tất cả</option>
                <option value="">10.000-100.000</option>
                <option value="">100.000-500.000</option>
                <option value="">500.000-1.000.000</option>
              </select>
            </div>
        </div>
           
        </div>
        <div class="col-md-9">

          <div class="d-flex justify-content-between align-items-center mb-3">

            <h1 class="mb-0">Sản phẩm</h1>
            <select class="filter-categories border-0 m-0">
                <option value="">Sắp xếp mặc định</option>
                <option value="">Tên (A - Z)</option>
                <option value="">Tên (Z - A)</option>
                <option value="">Giá (Thấp-Cao)</option>
                <option value="">Giá (Cao-Thấp)</option>
                <option value="">Đánh giá (Cao)</option>
                <option value="">Đánh giá (Thấp)</option>
              </select>
          </div>

          <?php if (!empty($data['products'])): ?>
            <div class="row">
              <?php foreach ($data['products'] as $item): ?>
                <div class="col-md-4 mb-4">
                  <div class="swiper-slide">
                    <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
                    <?=$item['discount_price'] ?>%
                    </div>
                    <div class="card position-relative">
                      <a href="/products/<?= $item['id'] ?>">
                        <img src="<?= APP_URL ?>/public/assets/client/images/<?= $item['image'] ?>" class="img-fluid rounded-4" alt="image">
                      </a>
                      <div class="card-body p-0">
                        <a href="/products/<?= $item['id'] ?>">
                          <h3 class="card-title pt-4 m-0"><?= $item['name'] ?></h3>
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
                          <h3 class="secondary-font text-primary"><?= $item['price'] ?></h3>

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
                <a href="#" class="btn btn-outline-primary">Xem thêm 78 sản phẩm khác</a>
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
            <h2 class="display-3 fw-normal text-center">Giảm giá 20%</h2>
            <h2 class="display-3 fw-normal text-center"><span class="text-primary">Khi mua lần đầu</span></h2>
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
              <h3 class="card-title py-2 m-0">Miễn phí vận chuyển</h3>
              <div class="card-text">
                <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 my-3">
            <div class="card">
              <div>
                <iconify-icon class="service-icon text-primary" icon="la:user-check"></iconify-icon>
              </div>
              <h3 class="card-title py-2 m-0">Thanh toán an toàn 100%</h3>
              <div class="card-text">
                <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 my-3">
            <div class="card">
              <div>
                <iconify-icon class="service-icon text-primary" icon="la:tag"></iconify-icon>
              </div>
              <h3 class="card-title py-2 m-0">Ưu đãi hàng ngày</h3>
              <div class="card-text">
                <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 my-3">
            <div class="card">
              <div>
                <iconify-icon class="service-icon text-primary" icon="la:award"></iconify-icon>
              </div>
              <h3 class="card-title py-2 m-0">Đảm bảo chất lượng</h3>
              <div class="card-text">
                <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
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
?>