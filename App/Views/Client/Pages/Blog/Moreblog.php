<?php

namespace App\Views\Client\Pages\Blog;

use App\Views\BaseView;

class Moreblog extends BaseView
{
    public static function render($data = null)
    {
?>
        <style>
            .entry-divider {
                width: 50px;
                height: 5px;
                background-color: #ddd;
                margin: 0 auto 10px 0;
            }

            .is-divider {
                border: none;
                background-color: #aaa;
            }

            .small {
                width: 5%;
            }
        </style>
        <div class="container mt-5 mb-5">
            <div class="row">
                <!-- Bên trái: Chuyên mục bài viết -->
                <div class="col-md-3">
                    <div class="category-section mb-4 mt-3">
                        <!-- Thanh tìm kiếm -->
                        <div class="search-bar border rounded-2 border-dark-subtle pe-3">
                            <form id="search-form" class="text-center d-flex align-items-center" action="" method="">
                                <input type="text" class="form-control border-0 bg-transparent" placeholder="Tìm kiếm sản phẩm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z"></path>
                                </svg>
                            </form>
                        </div>
                        <!-- Danh mục bài viết -->
                        <div class="mt-5">
                            <h3 class="mb-0">Chuyên mục bài viết</h3>
                            <br>
                            <a href="/blogs" class="nav-link fs-5">Chó (12)</a>
                            <hr>
                            <a href="/about" class="nav-link fs-5">Mèo (12)</a>
                            <hr>
                            <a href="/contact" class="nav-link fs-5">Thức ăn (6)</a>
                            <hr>
                            <a href="/contact" class="nav-link fs-5">Đồ chơi (3)</a>
                            <hr>
                        </div>
                    </div>
                </div>
                <!-- Bên phải: Chi tiết bài viết -->
                <div class="col-md-9">
                    <div class="detail-section">
                        <h2 class="mb-4">7 mẹo cách trị rận cho mèo tại nhà cực hiệu quả</h2>
                        <div class="entry-divider is-divider small"></div>
                        <p>Cập nhật 15/11/2024 by Waggy - Cửa Hàng Thú Cưng</p>
                        <div class="card">
                            <img src="/public/assets/client/images/meme-meo-khoc-7.jpg" class="card-img-top" alt="Hình minh họa">
                            <div class="card-body">
                                <p>
                                Trong cuộc sống hàng ngày của người nuôi mèo, việc áp dụng cách trị rận cho mèo tại nhà là một thách thức không nhỏ. Ve rận và bọ chét không chỉ khiến mèo khó chịu mà còn có nguy cơ lây lan bệnh tật. Đặc biệt, ở mèo con với sức đề kháng còn yếu, việc phòng tránh và điều trị ký sinh trùng trở nên cần thiết hơn bao giờ hết.
                                </p>
                                <ul>
                                    <li>Thường xuyên tắm mèo với dầu gội chuyên dụng.</li>
                                    <li>Sử dụng lược chải rận và loại bỏ trứng rận.</li>
                                    <li>Vệ sinh nơi ở của mèo định kỳ.</li>
                                    <li>Dùng thuốc trị rận phù hợp theo hướng dẫn của bác sĩ thú y.</li>
                                </ul>
                                <p>Bọ chét mèo không chỉ làm phiền thú cưng mà còn là mối đe dọa cho sức khỏe của chúng. Đặc biệt trong điều kiện ẩm ướt và nóng bức như ở Việt Nam, bọ chét phát triển mạnh mẽ, ký sinh trên mèo, hút máu. Mỗi con cái có thể đẻ tới  hàng ngàn trứng trong vòng đời khoảng 50 ngày. Thực hiện các cách trị rận cho mèo tại nhà càng sớm càng tốt là việc cần thiết.</p>
                            </div>
                            <ul>
                                    <li>Mùa Xuân và Hè: Vòng đời bọ chét ngắn lại, chỉ từ 17-40 ngày, tạo điều kiện cho sự sinh sôi nhanh chóng. Cuối mùa hè, vòng đời có thể kéo dài đến 2 tháng hoặc hơn.</li>
                                    <li>Mùa Đông: Sự phát triển của bọ chét chậm lại, ấu trùng ký sinh lâu hơn, kéo dài tới 10 tháng</li>
                                    <li>Độ Ẩm: Môi trường ẩm ướt hỗ trợ sự phát triển từ trứng bọ chét biến thành ấu trùng trưởng thành.</li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>




<?php
    }
}
