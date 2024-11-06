<?php

namespace App\Views\Client\Pages\Contact;

use App\Views\BaseView;

class Contact extends BaseView
{
    public static function render($data = null)
    {
        ?>

        <!-- Code HTML hiển thị giao diện  -->

        <h1 class="text-center my-3" style="color: var(--bs-primary)">Liên hệ</h1>
        <div class="container row m-auto shadow-sm p-5 mb-5 rounded d-flex justify-content-between" style="background-color: #F9F3EC;">
            <div class="col-sm-12 col-md-5">
                <h3 style="color: var(--bs-primary)">Waggy</h3>
                <div>
                    <i class="fa-solid fa-location-dot me-2"></i>
                    <span>288 Nam Kỳ Khởi Nghĩa, Phường Võ Thị Sáu, Quận 3</span>
                </div>
                <div>
                    <i class="fa-solid fa-phone-volume me-2"></i>
                    <span>0364402449</span>
                </div>
                <div>
                    <i class="fa-solid fa-envelope me-2"></i>
                    <span>waggy@gmail.com</span>
                </div>

                <hr>
                <p>Hãy liên hệ với Waggy để được tư vấn một cách cụ thể nhất, về những câu hỏi mà bạn đang thắc mắc, cũng như
                    biết thêm thông tin về các chương trình khuyến mãi hiện có tại Hương Trà Beauty & Academy</p>

            </div>
            <div class="col-sm-12 col-md-6">
                <form>
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Họ tên</label>
                        <input type="text" class="form-control" id="fullName" required>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="tel" class="form-control" id="phone" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Lời nhắn</label>
                        <textarea class="form-control" id="message" rows="3" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>

            </div>
        </div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.214930129262!2d105.75018147404022!3d9.999097290106247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a089ba2a00f837%3A0xe8a902fb01e1d974!2zMzg2QSBMw6ogQsOsbmgsIEPDoWkgUsSDbmcsIEPhuqduIFRoxqEsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1730553152961!5m2!1svi!2s"
            width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        <!-- </div> -->

        <?php

    }
}