<?php
namespace App\Views\Client\Components;

use App\Views\BaseView;

class Filter extends BaseView
{
    public static function render($data = null)
    {
?>
        <h5 class="mb-3">Lọc giá</h5>
        <form method="GET" action="/filter">
            <select class="filter-categories border-0 m-0" name="priceRange" onchange="this.form.submit()">
                <option value="all">Tất cả</option>
                <option value="0-100000">Dưới 100,000</option>
                <option value="100000-300000">100,000-300,000</option>
                <option value="300000-500000">300,000-500,000</option>
                <option value="500000-">Trên 500,000</option>
            </select>
        </form>
<?php
    }
}
?>
