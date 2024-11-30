<?php

namespace App\Views\Client\Layouts;

use App\Views\BaseView;

class Footer extends BaseView
{
    public static function render($data = null)
    {
?>
        <footer id="footer" class="my-5">
            <div class="container py-5 my-5">
                <div class="row">

                    <div class="col-md-3">
                        <div class="footer-menu">
                            <a href="/">
                                <img src="<?= APP_URL ?>/public/assets/client/images/logo.png" alt="logo">
                            </a>
                            <p class="blog-paragraph fs-6 mt-3">Đăng ký nhận bản tin của chúng tôi để cập nhật thông tin về những ưu đãi lớn.</p>
                            <div class="social-links">
                                <ul class="d-flex list-unstyled gap-2">
                                    <li class="social">
                                        <a href="#">
                                            <iconify-icon class="social-icon" icon="ri:facebook-fill"></iconify-icon>
                                        </a>
                                    </li>
                                    <li class="social">
                                        <a href="#">
                                            <iconify-icon class="social-icon" icon="ri:twitter-fill"></iconify-icon>
                                        </a>
                                    </li>
                                    <li class="social">
                                        <a href="#">
                                            <iconify-icon class="social-icon" icon="ri:pinterest-fill"></iconify-icon>
                                        </a>
                                    </li>
                                    <li class="social">
                                        <a href="#">
                                            <iconify-icon class="social-icon" icon="ri:instagram-fill"></iconify-icon>
                                        </a>
                                    </li>
                                    <li class="social">
                                        <a href="#">
                                            <iconify-icon class="social-icon" icon="ri:youtube-fill"></iconify-icon>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-menu">
                            <h3>Liên kết nhanh</h3>
                            <ul class="menu-list list-unstyled">
                                <li class="menu-item">
                                    <a href="/" class="nav-link">Trang chủ</a>
                                </li>
                                <li class="menu-item">
                                    <a href="/products" class="nav-link">Sản phẩm</a>
                                </li>
                                <li class="menu-item">
                                    <a href="/about" class="nav-link">Giới thiệu</a>
                                </li>
                                <li class="menu-item">
                                    <a href="/blogs" class="nav-link">Bài viết </a>
                                </li>
                                <li class="menu-item">
                                    <a href="/contact" class="nav-link">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-menu">
                            <h3>Chính sách hỗ trợ</h5>
                                <ul class="menu-list list-unstyled">
                                    <li class="menu-item">
                                        <a href="#" class="nav-link">FAQs</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#" class="nav-link">Phương thức thanh toán</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#" class="nav-link">Chính sách đổi trả</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#" class="nav-link">Thanh toán</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#" class="nav-link">Thông tin giao hàng</a>
                                    </li>
                                </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div>
                            <h3>Bảng tin</h3>
                            <p class="blog-paragraph fs-6">Đăng ký nhận bản tin của chúng tôi để nhận thông tin cập nhật về các ưu đãi lớn.
                            </p>
                            <div class="search-bar border rounded-pill border-dark-subtle px-2">
                                <form class="text-center d-flex align-items-center" action="" method="">
                                    <input type="text" class="form-control border-0 bg-transparent"
                                        placeholder="Nhập Email của bạn..." />
                                    <iconify-icon class="send-icon" icon="tabler:location-filled"></iconify-icon>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </footer>

        <div id="footer-bottom">
            <div class="container">
                <hr class="m-0">
                <p class="secondary-font text-center mt-3">© Bản quyền thuộc về Waggy</p>
                <!-- <div class="row mt-3">
                    <div class="col-md-6 copyright ">
                        <p class="secondary-font text-center">© Bản quyền thuộc về Waggy</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="secondary-font">Free HTML Template by <a href="https://templatesjungle.com/" target="_blank"
                                class="text-decoration-underline fw-bold text-black-50"> TemplatesJungle</a> Distributed by <a
                                href="https://themewagon.com/" target="_blank"
                                class="text-decoration-underline fw-bold text-black-50"> ThemeWagon</a></p>
                    </div>
                </div> -->
            </div>
        </div>
        <div id="chat-icon" style="position: fixed; bottom: 20px; right: 20px; z-index: 1000;">
    <a href="https://chat.example.com" target="_blank">
        <iconify-icon icon="mdi:chat-outline" style="font-size: 48px; color: #007bff;"></iconify-icon>
    </a>
</div>
        <script lang="javascript">var __vnp = {code : 23609,key:'', secret : '9fc00ace2dd2671f429cb46a14ceb0ec'};(function() {var ga = document.createElement('script');ga.type = 'text/javascript';ga.async=true; ga.defer=true;ga.src = 'https://core.vchat.vn/code/tracking.js?v=95821'; var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();</script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="<?= APP_URL ?>/public/assets/client/js/jquery-1.11.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
        <script src="<?= APP_URL ?>/public/assets/client/js/plugins.js"></script>
        <script src="<?= APP_URL ?>/public/assets/client/js/script.js"></script>
        <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

        </body>

        </html>


<?php

        // unset($_SESSION['success']);
        // unset($_SESSION['error']);
    }
}

?>