<?php

namespace App\Views\Client\Pages\About;

use App\Views\BaseView;



class About extends BaseView
{
  public static function render($data = null)
  {
?>
  <style>
    /*about */

.counter-box {
  display: block;
  background: #f6f6f6;
  padding: 35px 30px 40px;
  text-align: center
}

.counter-box p {
  margin: 5px 10px 0;
  padding: 0;
  color: #909090;
  font-size: 18px;
  font-weight: 500
}

.counter-box i {
  font-size: 60px;
  margin: 0 0 15px;
  color: #d2d2d2
}

.counter {
  display: block;
  font-size: 32px;
  font-weight: 700;
  color: #666;
  line-height: 28px
}

.counter-box.colored {
  background: #DEAD6F
}

.counter-box.colored p,
.counter-box.colored i,
.counter-box.colored .counter {
  color: #fff
}


.container1 {
  height: 100vh;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #F9F3EC;
}
.testimonial {
  position: relative;
  max-width: 900px;
  width: 100%;
  padding: 50px 0;
  overflow: hidden;
}
.testimonial .image {
  height: 170px;
  width: 170px;
  object-fit: cover;
  border-radius: 50%;
}
.testimonial .slide {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  row-gap: 30px;
  height: 100%;
  width: 100%;
}
.slide p {
  text-align: center;
  padding: 0 160px;
  font-size: 14px;
  font-weight: 400;
  color: #333;
}
.slide .quote-icon {
  font-size: 30px;
  color: #F9F3EC;
}
.slide .details {
  display: flex;
  flex-direction: column;
  align-items: center;
}
.details .name {
  font-size: 14px;
  font-weight: 600;
  color: #333;
}
.details .job {
  font-size: 12px;
  font-weight: 400;
  color: #333;
}
.blog-paragraph{
  line-height: 1.5rem;
}
/* swiper button css */
.nav-btn {
  height: 40px;
  width: 40px;
  border-radius: 50%;
  transform: translateY(30px);
  background-color: rgba(0, 0, 0, 0.1);
  transition: 0.2s;
}
.nav-btn:hover {
  background-color: rgba(0, 0, 0, 0.2);
}
.nav-btn::after,
.nav-btn::before {
  font-size: 20px;
  color: #fff;
}
.swiper-pagination-bullet {
  background-color: rgba(0, 0, 0, 0.8);
}
.swiper-pagination-bullet-active {
  background-color: #F9F3EC;
}
.line-spacing {
  line-height: 2em; /* Bạn có thể điều chỉnh giá trị để có khoảng cách dòng mong muốn */
}
@media screen and (max-width: 768px) {
  .slide p {
    padding: 0 20px;
  }
  .nav-btn {
    display: none;
  }
  @media (max-width: 768px) {
    .banner-title {
        font-size: 1.5rem; /* Thay đổi kích thước chữ cho tiêu đề */
    }
    
    .content-wrapper {
        padding: 1rem; /* Giảm padding cho thiết bị nhỏ */
    }

    .btn {
        font-size: 1rem; /* Thay đổi kích thước chữ cho nút */
    }
}
}

  </style>

<section id="banner" style="background: #F9F3EC; padding-top: 5rem;">
    <div class="container">
        <div class="swiper main-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide py-5">
                    <div class="row banner-content align-items-center">
                        <div class="img-wrapper col-md-5 text-center">
                            <img src="public/assets/client/images/banner-img.png" class="img-fluid" alt="Banner Image 1">
                        </div>
                        <div class="content-wrapper col-md-7 p-4">
                            <div class="secondary-font text-primary text-uppercase mb-2">Giảm giá 10 - 20% OFF</div>
                            <h2 class="banner-title display-4 fw-normal">Mua sắm cho <span class="text-primary">thú cưng</span></h2>
                            <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1 mt-3">
                                Mua ngay
                                <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                                    <use xlink:href="#arrow-right"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Các slide khác... -->
            </div>
            <div class="swiper-pagination mb-5"></div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row d-flex no-gutters align-items-center">
            <div class="col-md-5 d-flex justify-content-center">
                <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center mb-4 mb-sm-0">
                    <img src="/public/assets/client/images/about-1.jpg" width="100%" alt="">
                </div>
            </div>
            <div class="content-wrapper col-md-7 p-4">
                <h6 class="display-5 fw-normal">Lí Do Chọn <span class="text-primary">Chúng Tôi?</span></h6>
                <br>
                <div class="d-flex align-items-center mb-3">
                    <img src="/public/assets/client/images/6385378.png" width="70px" alt="">
                    <h6 class="display-6 fw-normal text-primary ms-3">Lời khuyên chăm sóc</h6>
                </div>
                <p class="blog-paragraph fs-6">Chúng tôi khuyên bạn nên cho thú cưng thử nhiều loại thức ăn đa dạng.</p>

                <div class="d-flex align-items-center mb-3">
                    <img src="/public/assets/client/images/848409-200.png" width="60px" alt="" class="mr-3">
                    <h6 class="display-6 fw-normal text-primary ms-3">Hỗ trợ khách hàng</h6>
                </div>
                <p class="blog-paragraph fs-6">Sự hài lòng của khách hàng chính là quảng cáo tốt nhất của doanh nghiệp.</p>

                <div class="d-flex align-items-center mb-3">
                    <img src="/public/assets/client/images/2358435.png" width="70px" alt="" class="mr-3">
                    <h6 class="display-6 fw-normal text-primary ms-3">Trợ giúp thú y</h6>
                </div>
                <p class="blog-paragraph fs-6">Bác sĩ tư vấn nhiệt tình và tận tâm. Waggy tư vấn hoàn toàn miễn phí.</p>
            </div>
        </div>
    </div>
</section>


    




    <!-- <section id="categories">
    <div class="container my-3 py-5">
      <div class="row my-5">
        <div class="col text-center">
          <a href="#" class="categories-item">
            <iconify-icon class="category-icon" icon="ph:bowl-food"></iconify-icon>
            <h5>Foodies</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="#" class="categories-item">
            <iconify-icon class="category-icon" icon="ph:bird"></iconify-icon>
            <h5>Bird Shop</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="#" class="categories-item">
            <iconify-icon class="category-icon" icon="ph:dog"></iconify-icon>
            <h5>Dog Shop</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="#" class="categories-item">
            <iconify-icon class="category-icon" icon="ph:fish"></iconify-icon>
            <h5>Fish Shop</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="#" class="categories-item">
            <iconify-icon class="category-icon" icon="ph:cat"></iconify-icon>
            <h5>Cat Shop</h5>
          </a>
        </div>
      </div>
    </div>
  </section> -->

    

    


    <section id="banner-2" class="my-3" style="background: #F9F3EC;">
      <div class="container">
        <div class="row flex-row-reverse banner-content align-items-center">
          <div class="img-wrapper col-12 col-md-6">
            <img src="public/assets/client/images/banner-img2.png" class="img-fluid">
          </div>
          <div class="content-wrapper col-12 offset-md-1 col-md-5 p-5">
            <div class="secondary-font text-primary text-uppercase mb-3 fs-4">Về Chúng Tôi</div>
            <h2 class="display-4 fw-normal">Waggy
            <hr>
            <p class="blog-paragraph">Chúng tôi được thành lập với sứ mệnh không chỉ
              <br>
              cung cấp các sản phẩm chất lượng cao mà còn là
              <br>
               nơi mà những ai yêu thích thú cưng có thể tìm thấy sự hỗ trợ tận tâm. Từ những món đồ chơi nhỏ nhắn
              <br>
              Từ những món đồ chơi nhỏ nhắn, thức ăn dinh dưỡng đến các dịch vụ chăm sóc và phụ kiện, chúng tôi luôn cam kết đem đến sự an toàn và thoải mái cho thú cưng của bạn.</p>
                    <p class="blog-paragraph fs-6"></p>

            </h2>
            <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
              Đọc Thêm
              <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                <use xlink:href="#arrow-right"></use>
              </svg></a>
          </div>

        </div>
      </div>
    </section>

    

    <section id="bestselling" class="my-5 overflow-hidden">
      <div class="container py-5 mb-5">

        <div class="section-header d-md-flex justify-content-between align-items-center mb-3 text-center">
          <h4 class="display-6 fw-normal text-center"><span class="text-primary">Waggy</span> những hãng thức ăn phổ biến</h4>
          <div>
            
          </div>
        </div>
        <br>

        <div class=" swiper bestselling-swiper">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              New
            </div> -->
              <div class="card position-relative">
                <a href="single-product.html"><img src="public/assets/client/images/123.jpg" class="img-fluid rounded-4" alt="image"></a>
                <div class="card-body p-0">
                  <a href="single-product.html">
                    <h3 class="card-title pt-4 m-0">Whiskas</h3>
                  </a>

                  

                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              New
            </div> -->
            <div class="card position-relative">
                <a href="single-product.html"><img src="public/assets/client/images/gana.jpg" class="img-fluid rounded-4" alt="image"></a>
                <div class="card-body p-0">
                  <a href="single-product.html">
                    <h3 class="card-title pt-4 m-0">Ganador</h3>
                  </a>

                  

                </div>
              </div>
            </div>
            <div class="swiper-slide">
              
              <div class="card position-relative">
                <a href="single-product.html"><img src="public/assets/client/images/11.jpg" class="img-fluid rounded-4" alt="image"></a>
                <div class="card-body p-0">
                  <a href="single-product.html">
                    <h3 class="card-title pt-4 m-0">Nutrience Original</h3>
                  </a>

                  

                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              New
            </div> -->
              <div class="card position-relative">
                <a href="single-product.html"><img src="public/assets/client/images/ze.jpg" class="img-fluid rounded-4" alt="image"></a>
                <div class="card-body p-0">
                  <a href="single-product.html">
                    <h3 class="card-title pt-4 m-0">Zenith</h3>
                  </a>

                  

                </div>
              </div>
            </div>
            <div class="swiper-slide">
              
              <div class="card position-relative">
                <a href="single-product.html"><img src="public/assets/client/images/dog.webp" class="img-fluid rounded-4" alt="image"></a>
                <div class="card-body p-0">
                  <a href="single-product.html">
                    <h3 class="card-title pt-4 m-0">Smartheart</h3>
                  </a>

                  

                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              New
            </div> -->
              
              <div class="card position-relative">
                <a href="single-product.html"><img src="public/assets/client/images/22.jpg" class="img-fluid rounded-4" alt="image"></a>
                <div class="card-body p-0">
                  <a href="single-product.html">
                    <h3 class="card-title pt-4 m-0">Minino Yum</h3>
                  </a>

                 

                </div>
              </div>
            </div>




          </div>
        </div>
        <!-- / category-carousel -->


      </div>
    </section>

    <section id="register" style="background: url('public/assets/client/images/background-img.png') no-repeat;">
      <div class="container ">
        <div class="row my-5 py-5">
          <div class="offset-md-3 col-md-6 my-5 ">
            <h2 class="display-4 fw-normal text-center">Giảm giá 20%<span class="text-primary"><br>Mua lần đầu</span>
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
                            <a href="/blogs" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
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

    <section class="container1">
      <div class="testimonial mySwiper">
        <div class="testi-content swiper-wrapper">
          <div class="slide swiper-slide">
            <img src="/public/assets/client/images/staff-1.jpg" alt="" class="image" />
            <h6 class="display-8 fw-normal text-center ">
            Không gian tại shop rất sạch sẽ và thoải mái,
            <br>
             các bé thú cưng cũng được chào đón nồng nhiệt. Nhân viên thân thiện
             <br>
              và có kiến thức về các sản phẩm, khiến mình cảm thấy được hỗ trợ tốt.
              <br>
               Rất thích ghé shop để mua sắm và trò chuyện về thú cưng!
            </p>
            <i class="bx bxs-quote-alt-left quote-icon"></i>
            <br>
            <div class="details">
              <span class="name">Thành Nam</span>
            </div>
          </div>

          <div class="slide swiper-slide">
            <img src="/public/assets/client/images/staff-2.jpg" alt="" class="image" />
            <h6 class="display-8 fw-normal text-center ">
            Mình rất hài lòng với chất lượng sản phẩm ở shop!
            <br>
             Đồ dùng cho thú cưng ở đây rất đa dạng, từ thức ăn đến phụ kiện đều có đủ
             <br>
             Nhân viên tư vấn nhiệt tình, giúp mình lựa chọn sản phẩm phù hợp.
              <br>
              Shop là lựa chọn đáng tin cậy của mình!
            </p>
            <i class="bx bxs-quote-alt-left quote-icon"></i>
            <br>
            <div class="details">
              <span class="name">Thành Sơn</span>
            </div>
          </div>
          
          <div class="slide swiper-slide">
            <img src="/public/assets/client/images/staff-3.jpg" alt="" class="image" />
            <p class="blog-paragraph fs-6">
            Shop có dịch vụ chăm sóc khách hàng tuyệt vời! Mình đặt hàng online và rất ấn tượng với cách đóng gói cẩn thận, lại còn có thêm quà tặng nhỏ cho bé cưng. Shop cũng thường xuyên cập nhật tình trạng đơn hàng, giúp mình an tâm chờ nhận hàng..
            </p>
            <i class="bx bxs-quote-alt-left quote-icon"></i>
            <div class="details">
              <span class="name">Hoàng Huy</span>
            </div>
          </div>
        </div>
        <div class="swiper-button-next nav-btn"></div>
        <div class="swiper-button-prev nav-btn"></div>
        <div class="swiper-pagination"></div>
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

    <section>
    <div class="row">
        <div class="four col-md-3">
            <div class="counter-box colored"> <i class="fa fa-thumbs-o-up"></i> <span class="counter">2234</span>
            <h6 class="card-title py-2 m-0 text-white">Khách hàng yêu thích</h6>
            </div>
        </div>
        <div class="four col-md-3">
            <div class="counter-box"> <i class="fa fa-group"></i> <span class="counter">1315</span>
                <h6 class="card-title py-2 m-0">Thành viên đã đăng ký</h6>
            </div>
        </div>
        <div class="four col-md-3">
            <div class="counter-box"> <i class="fa fa-shopping-cart"></i> <span class="counter">89</span>
            <h6 class="card-title py-2 m-0">Sản phẩm có sẵn</h6>
            </div>
        </div>
        <div class="four col-md-3">
            <div class="counter-box"> <i class="fa fa-user"></i> <span class="counter">34</span>
            <h6 class="card-title py-2 m-0">Nhân viên</h6>
            </div>
        </div>
    </div>
    </section>
    
<?php
  }
}
