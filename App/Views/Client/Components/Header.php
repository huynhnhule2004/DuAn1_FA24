<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Header extends BaseView
{
    public static function render($data = null)
    {
?>
        <?php
        foreach ($data as $item) :
        ?>
            <li><a href="/products/categories/<?= $item['id'] ?>" class="dropdown-item"><?= $item['category_name'] ?></a></li>
        <?php
        endforeach;
        ?>

<?php
    }
}
