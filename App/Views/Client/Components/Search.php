<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Search extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="search-bar border rounded-2 border-dark-subtle pe-3">
            <form id="search-form" class="text-center d-flex align-items-center" action="" method="">
                <input type="text" class="form-control border-0 bg-transparent" placeholder="Tìm kiếm sản phẩm">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z"></path>
                </svg>
            </form>
        </div>

<?php
    }
}
