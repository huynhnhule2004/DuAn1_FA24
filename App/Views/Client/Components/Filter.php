<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Filter extends BaseView
{
    public static function render($data = null)
    {
?>
        <h5 class="mb-3">Lọc giá</h5>
              <select class="filter-categories border-0 m-0">
                <option value="">Tất cả</option>
                <option value="">10.000-100.000</option>
                <option value="">100.000-500.000</option>
                <option value="">500.000-1.000.000</option>
              </select>

<?php
    }
}
