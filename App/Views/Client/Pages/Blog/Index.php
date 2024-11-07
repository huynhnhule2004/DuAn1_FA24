<?php

namespace App\Views\Client\Pages\Blog;

use App\Views\BaseView;

Class Index extends BaseView
{
    public static function render($data = null)
    {
?>
    <div class="container">
<div class="row entry-container">
<div class="entry-item col-md-4 my-4">
            <div class="z-1 position-absolute rounded-3 m-2 px-3 pt-1 bg-light">
                <h3 class="secondary-font text-primary m-0">20</h3>
                <p class="secondary-font fs-6 m-0">Feb</p>
            </div>
            <div class="card position-relative">
                <a href="single-post.html"><img src="/public/assets/client/images/blog1.jpg" class="img-fluid rounded-4" alt="image"></a>
                <div class="card-body p-0">
                    <a href="single-post.html">
                        <h3 class="card-title pt-4 pb-3 m-0">10 lý do để giúp đỡ bất kỳ loài động vật nào</h3>
                    </a>
                    <div class="card-text">
                        <p class="blog-paragraph fs-6">Cốt lõi trong hoạt động của chúng tôi là ý tưởng rằng các thành phố là vườn ươm của
                        những thành tựu lớn nhất của chúng ta và niềm hy vọng tốt đẹp nhất cho một tương lai bền vững.</p>
                        <a href="single-post.html" class="blog-read">Đọc thêm</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="entry-item col-md-4 my-4">
            <div class="z-1 position-absolute rounded-3 m-2 px-3 pt-1 bg-light">
                <h3 class="secondary-font text-primary m-0">20</h3>
                <p class="secondary-font fs-6 m-0">Feb</p>
            </div>
            <div class="card position-relative">
                <a href="single-post.html"><img src="/public/assets/client/images/blog2.jpg" class="img-fluid rounded-4" alt="image"></a>
                <div class="card-body p-0">
                    <a href="single-post.html">
                        <h3 class="card-title pt-4 pb-3 m-0">Cách để biết thú cưng của bạn đang đói</h3>
                    </a>
                    <div class="card-text"> 
                        <p class="blog-paragraph fs-6" style="line-height: 1.5rem;">Cốt lõi trong hoạt động của chúng tôi là ý tưởng rằng các thành phố là vườn ươm của
                        những thành tựu lớn nhất của chúng ta và niềm hy vọng tốt đẹp nhất cho một tương lai bền vững.</p>
                        <a href="single-post.html" class="blog-read">Đọc thêm</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="entry-item col-md-4 my-4">
            <div class="z-1 position-absolute rounded-3 m-2 px-3 pt-1 bg-light">
                <h3 class="secondary-font text-primary m-0">20</h3>
                <p class="secondary-font fs-6 m-0">Feb</p>
            </div>
            <div class="card position-relative">
                <a href="single-post.html"><img src="/public/assets/client/images/blog3.jpg" class="img-fluid rounded-4" alt="image"></a>
                <div class="card-body p-0">
                    <a href="single-post.html">
                        <h3 class="card-title pt-4 pb-3 m-0">Ngôi nhà tốt nhất cho thú cưng của bạn</h3>
                    </a>
                    <div class="card-text">
                        <p class="blog-paragraph fs-6">Cốt lõi trong hoạt động của chúng tôi là ý tưởng rằng các thành phố là vườn ươm của
                        những thành tựu lớn nhất của chúng ta và niềm hy vọng tốt đẹp nhất cho một tương lai bền vững.</p>
                        <a href="single-post.html" class="blog-read">Đọc thêm</a>
                    </div>
                </div>
            </div>
        </div>

      </div>

</div>
<div class="pagination loop-pagination d-flex justify-content-center align-items-center">
          <a href="#" class="pagination-arrow d-flex align-items-center mx-3">
            <iconify-icon icon="ic:baseline-keyboard-arrow-left" class="pagination-arrow fs-1"></iconify-icon>
          </a>
          <span aria-current="page" class="page-numbers mt-2 fs-3 mx-3 current">1</span>
          <a class="page-numbers mt-2 fs-3 mx-3" href="#">2</a>
          <a class="page-numbers mt-2 fs-3 mx-3" href="#">3</a>
          <a href="#" class="pagination-arrow d-flex align-items-center mx-3">
            <iconify-icon icon="ic:baseline-keyboard-arrow-right" class="pagination-arrow fs-1"></iconify-icon>
          </a>
        </div>
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
