<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class SortBy extends BaseView
{
    public static function render($data = null)
    {
?>
       <h2 class="mb-0">Sản phẩm</h2>
            <select class="filter-categories border-0 m-0">
              <option value="">Sắp xếp mặc định</option>
              <option value="">Tên (A - Z)</option>
              <option value="">Tên (Z - A)</option>
            </select>
          </div>

<?php
    }
}
