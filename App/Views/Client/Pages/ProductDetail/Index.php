<?php

namespace App\Views\Client\Pages\ProductDetail;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>
        <section id="selling-product">
            <div class="container my-md-5 py-5">
                <div class="row g-md-5">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- product-large-slider -->
                                <div class="swiper product-large-slider swiper-fade swiper-initialized swiper-horizontal swiper-watch-progress swiper-backface-hidden">
                                    <div class="swiper-wrapper" id="swiper-wrapper-bdaebd66f010b04b8" aria-live="polite">
                                        <div class="swiper-slide swiper-slide-visible swiper-slide-active" role="group" aria-label="1 / 4" style="width: 624px; opacity: 1; transform: translate3d(0px, 0px, 0px);">
                                            <img src="/public/assets/client/images/blog-lg4.jpg" class="img-fluid">
                                        </div>
                                        <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 4" style="width: 624px; opacity: 0; transform: translate3d(-624px, 0px, 0px);">
                                            <img src="/public/assets/client/images/blog-lg4.jpg" class="img-fluid">
                                        </div>
                                        <div class="swiper-slide" role="group" aria-label="3 / 4" style="width: 624px; opacity: 0; transform: translate3d(-1248px, 0px, 0px);">
                                            <img src="/public/assets/client/images/blog-lg3.jpg" class="img-fluid">
                                        </div>
                                        <div class="swiper-slide" role="group" aria-label="4 / 4" style="width: 624px; opacity: 0; transform: translate3d(-1872px, 0px, 0px);">
                                            <img src="/public/assets/client/images/blog-lg1.jpg" class="img-fluid">
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
                                            <img src="/public/assets/client/images/item8.jpg" class="img-fluid">
                                        </div>
                                        <div class="swiper-slide swiper-slide-visible swiper-slide-next" role="group" aria-label="2 / 4" style="width: 202.667px; margin-right: 8px;">
                                            <img src="/public/assets/client/images/item4.jpg" class="img-fluid">
                                        </div>
                                        <div class="swiper-slide swiper-slide-visible" role="group" aria-label="3 / 4" style="width: 202.667px; margin-right: 8px;">
                                            <img src="/public/assets/client/images/item7.jpg" class="img-fluid">
                                        </div>
                                        <div class="swiper-slide" role="group" aria-label="4 / 4" style="width: 202.667px; margin-right: 8px;">
                                            <img src="/public/assets/client/images/item1.jpg" class="img-fluid">
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
                                <h2 itemprop="name" class="display-6">Jump Suit</h2>
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
                                <strong class="text-primary display-6 fw-bold">425.000VNĐ</strong><del class="ms-2">600.000VNĐ</del>
                            </div>
                            <p>Bộ Jump Suit cho thú cưng thiết kế hình chuối đáng yêu, mang lại phong cách nổi bật và thoải mái cho thú cưng. Sản phẩm giúp giữ ấm, phù hợp với nhiều dịp khác nhau từ đi dạo đến chụp ảnh.</p>
                            <div class="cart-wrap">
                                <div class="color-options product-select">
                                    <div class="color-toggle pt-2" data-option-index="0">
                                        <h6 class="item-title fw-bold">Màu sắc:</h6>
                                        <ul class="select-list list-unstyled d-flex">
                                            <li class="select-item pe-3" data-val="Gray" title="Gray">
                                                <a href="#" class="btn btn-light ">Xám</a>
                                            </li>
                                            <li class="select-item pe-3" data-val="Black" title="Black">
                                                <a href="#" class="btn btn-light">Đen</a>
                                            </li>
                                            <li class="select-item pe-3" data-val="Blue" title="Blue">
                                                <a href="#" class="btn btn-light active">Xanh</a>
                                            </li>
                                            <li class="select-item" data-val="Red" title="Red">
                                                <a href="#" class="btn btn-light disabled">Đỏ</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="swatch product-select pt-3" data-option-index="1">
                                    <h6 class="item-title fw-bold">Kích thước</h6>
                                    <ul class="select-list list-unstyled d-flex">
                                        <li data-value="S" class="select-item pe-3">
                                            <a href="#" class="btn btn-light">XL</a>
                                        </li>
                                        <li data-value="M" class="select-item pe-3">
                                            <a href="#" class="btn btn-light active">L</a>
                                        </li>
                                        <li data-value="L" class="select-item pe-3">
                                            <a href="#" class="btn btn-light">M</a>
                                        </li>
                                        <li data-value="L" class="select-item">
                                            <a href="#" class="btn btn-light">S</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-quantity pt-2">
                                    <div class="stock-number text-dark"><em>2 trong kho</em></div>
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
                                        <li data-value="S" class="select-item">1223</li>
                                    </ul>
                                </div>
                                <div class="meta-item d-flex align-items-baseline">
                                    <h6 class="item-title fw-bold no-margin pe-2">Danh mục:</h6>
                                    <ul class="select-list list-unstyled d-flex">
                                        <li data-value="S" class="select-item">
                                            <a href="#">Dành cho chó</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="meta-item d-flex align-items-baseline">
                                    <h6 class="item-title fw-bold no-margin pe-2">Tags:</h6>
                                    <ul class="select-list list-unstyled d-flex">
                                        <li data-value="S" class="select-item">
                                            <a href="#">Quần áo</a>
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
                                <p>Bộ Jump Suit cho thú cưng là lựa chọn hoàn hảo để làm mới phong cách của thú cưng, tạo nên sự dễ thương và nổi bật mỗi khi xuất hiện. Thiết kế hình chuối vui nhộn trên nền vải xanh dịu mát, điểm xuyết viền bo vàng ở cổ, tay và chân mang lại một phong cách tươi sáng và độc đáo. Bộ đồ được làm từ chất liệu mềm mại, co giãn tốt và thoáng khí, giúp thú cưng luôn thoải mái dù mặc trong thời gian dài. Không chỉ là một trang phục thông thường, bộ Jump Suit còn giữ ấm cho thú cưng, đặc biệt trong những ngày trời se lạnh.

                                    Sản phẩm có thiết kế vừa vặn, dễ dàng mặc vào và tháo ra, tạo sự thuận tiện cho người dùng. Đây là trang phục lý tưởng để diện cho thú cưng trong các buổi dạo chơi, dã ngoại, hoặc chụp ảnh kỷ niệm. Với phong cách vui nhộn và hiện đại, bộ Jump Suit giúp thú cưng của bạn nổi bật và thu hút mọi ánh nhìn. Bộ đồ có nhiều kích cỡ, phù hợp cho cả chó và mèo với nhiều loại hình dáng khác nhau. Đây sẽ là món quà tuyệt vời để thể hiện tình yêu thương dành cho thú cưng, cho chúng thêm ấm áp và phong cách.

                                    Với bộ Jump Suit này, bạn không chỉ giúp thú cưng giữ ấm mà còn tôn lên nét cá tính, sự dễ thương và năng động của chúng. Hãy để thú cưng của bạn sẵn sàng cho mọi cuộc phiêu lưu cùng phong cách thật chất và nổi bật!
                            </div>
                            <div class="tab-pane fade" id="v-pills-additional" role="tabpanel" aria-labelledby="v-pills-additional-tab" tabindex="0">
                                <h2>Cách sử dụng sản phẩm</h2>
                                <p>Để sử dụng bộ Jump Suit cho thú cưng, trước tiên bạn hãy kiểm tra trang phục để đảm bảo không có chi tiết gây khó chịu. Khi mặc vào, nhẹ nhàng xỏ từng chân của thú cưng vào ống quần, sau đó kéo bộ đồ lên và điều chỉnh cho vừa vặn, tránh bó sát quá mức để thú cưng có thể di chuyển thoải mái. Hãy quan sát phản ứng của thú cưng, nếu thấy chúng cào cấu hay gỡ bỏ, hãy tháo ra và thử lại từ từ để chúng quen dần. Sau khi sử dụng, giặt sạch và phơi khô tự nhiên để trang phục luôn bền đẹp cho lần mặc tiếp theo. Bộ Jump Suit sẽ giúp thú cưng của bạn vừa ấm áp vừa nổi bật trong mọi dịp!</p>
                            </div>
                            <div class="tab-pane fade" id="v-pills-reviews" role="tabpanel" aria-labelledby="v-pills-reviews-tab" tabindex="0">
                                <div class="review-box d-flex flex-wrap">
                                    <div class="col-lg-6 d-flex flex-wrap gap-3">
                                        <div class="col-md-2">
                                            <div class="image-holder">
                                                <img src="/public/assets/client/images/reviewer-1.jpg" alt="review" class="img-fluid rounded-circle">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="review-content">
                                                <div class="rating-container d-flex align-items-center">
                                                    <div class="rating" data-rating="1">
                                                        <svg width="24" height="24" class="text-primary">
                                                            <use xlink:href="#star-solid"></use>
                                                        </svg>
                                                    </div>
                                                    <div class="rating" data-rating="2">
                                                        <svg width="24" height="24" class="text-primary">
                                                            <use xlink:href="#star-solid"></use>
                                                        </svg>
                                                    </div>
                                                    <div class="rating" data-rating="3">
                                                        <svg width="24" height="24" class="text-primary">
                                                            <use xlink:href="#star-solid"></use>
                                                        </svg>
                                                    </div>
                                                    <div class="rating" data-rating="4">
                                                        <svg width="24" height="24" class="text-secondary">
                                                            <use xlink:href="#star-solid"></use>
                                                        </svg>
                                                    </div>
                                                    <div class="rating" data-rating="5">
                                                        <svg width="24" height="24" class="text-secondary">
                                                            <use xlink:href="#star-solid"></use>
                                                        </svg>
                                                    </div>
                                                    <span class="rating-count">(3.5)</span>
                                                </div>
                                                <div class="review-header">
                                                    <span class="author-name">Trung Sơn</span>
                                                    <span class="review-date">– 03/07/2023</span>
                                                </div>
                                                <p>Bộ Jump Suit cho thú cưng thực sự là một sản phẩm đáng yêu và tiện lợi! Thiết kế hình chuối vui nhộn và màu sắc tươi sáng làm cho thú cưng trông thật nổi bật và dễ thương. Chất liệu vải mềm mại, co giãn tốt, thú cưng của tôi cảm thấy thoải mái ngay cả khi mặc trong thời gian dài. Việc mặc vào và tháo ra cũng rất dễ dàng, không gây khó khăn gì. Đặc biệt, trang phục này giữ ấm khá tốt, rất thích hợp cho những ngày se lạnh. Đây chắc chắn là một lựa chọn tuyệt vời cho các chủ nuôi muốn tạo phong cách cho thú cưng của mình.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 d-flex flex-wrap gap-3">
                                        <div class="col-md-2">
                                            <div class="image-holder">
                                                <img src="/public/assets/client/images/reviewer-2.jpg" alt="review" class="img-fluid rounded-circle">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="review-content">
                                                <div class="rating-container d-flex align-items-center">
                                                    <div class="rating" data-rating="1">
                                                        <svg width="24" height="24" class="text-primary">
                                                            <use xlink:href="#star-solid"></use>
                                                        </svg>
                                                    </div>
                                                    <div class="rating" data-rating="2">
                                                        <svg width="24" height="24" class="text-primary">
                                                            <use xlink:href="#star-solid"></use>
                                                        </svg>
                                                    </div>
                                                    <div class="rating" data-rating="3">
                                                        <svg width="24" height="24" class="text-primary">
                                                            <use xlink:href="#star-solid"></use>
                                                        </svg>
                                                    </div>
                                                    <div class="rating" data-rating="4">
                                                        <svg width="24" height="24" class="text-secondary">
                                                            <use xlink:href="#star-solid"></use>
                                                        </svg>
                                                    </div>
                                                    <div class="rating" data-rating="5">
                                                        <svg width="24" height="24" class="text-secondary">
                                                            <use xlink:href="#star-solid"></use>
                                                        </svg>
                                                    </div>
                                                    <span class="rating-count">(3.5)</span>
                                                </div>
                                                <div class="review-header">
                                                    <span class="author-name">Lê Vinh</span>
                                                    <span class="review-date">– 03/06/2022</span>
                                                </div>
                                                <p>Tôi rất hài lòng với bộ Jump Suit này cho thú cưng! Trang phục không chỉ đẹp mà còn rất thực tế, giúp giữ ấm cho bé trong những ngày trời mát mẻ. Mỗi khi mặc vào, thú cưng của tôi trông rất đáng yêu và nhận được nhiều lời khen từ bạn bè khi đi dạo. Đặc biệt, chất liệu vải không gây kích ứng cho da, thú cưng của tôi hoàn toàn thoải mái khi mặc, không gặp bất kỳ vấn đề khó chịu nào. Đây là sản phẩm hoàn hảo cho những ai muốn chăm sóc và làm đẹp cho thú cưng của mình.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="add-review mt-5">
                                    <h3>Thêm đánh giá</h3>
                                    <p>Địa chỉ email của bạn sẽ không được công bố. Các trường bắt buộc được đánh dấu*</p>
                                    <form id="form" class="form-group">

                                        <div class="pb-3">
                                            <div class="review-rating">
                                                <span>Đánh giá của bạn*</span>
                                                <div class="rating-container d-flex align-items-center">
                                                    <span class="rating secondary-font">
                                                        <iconify-icon icon="clarity:star-solid" class="text-primary me-2"></iconify-icon>
                                                        <iconify-icon icon="clarity:star-solid" class="text-primary me-2"></iconify-icon>
                                                        <iconify-icon icon="clarity:star-solid" class="text-primary me-2"></iconify-icon>
                                                        <iconify-icon icon="clarity:star-solid" class="text-primary me-2"></iconify-icon>
                                                        <iconify-icon icon="clarity:star-solid" class="text-primary me-2"></iconify-icon>
                                                        (5.0)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pb-3">
                                            <input type="file" class="form-control" data-text="Choose your file">
                                        </div>
                                        <div class="pb-3">
                                            <label>Tên:</label>
                                            <input type="text" name="name" placeholder="Nhập tên của bạn tại đây*" class="form-control">
                                        </div>
                                        <div class="pb-3">
                                            <label>Email:</label>
                                            <input type="text" name="email" placeholder="Nhập email của bạn tại đây*" class="form-control">
                                        </div>
                                        <div class="pb-3">
                                            <label>Đánh giá:</label>
                                            <textarea class="form-control" placeholder="Viết đánh giá của bạn tại đây*"></textarea>
                                        </div>
                                        <div class="pb-3">
                                            <label>
                                                <input type="checkbox" required="">
                                                <span class="label-body">Ghi nhớ đăng nhập</span>
                                            </label>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-dark btn-large text-uppercase w-100">Gửi</button>
                                    </form>
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
