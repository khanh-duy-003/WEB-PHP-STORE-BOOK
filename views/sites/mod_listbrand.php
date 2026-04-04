<?php

use App\Models\Brand;

$list_brand = Brand::where('status', '=', 1)
    ->orderBy('sort_order', 'ASC')
    ->get();
?>
<ul class="list-group mb-3 list-category">
    <li class="list-group-item bg-main py-3">Thương hiệu</li>
    <?php foreach ($list_brand as $brand) : ?>
        <li class="list-group-item">
            <a href="index.php?opt=brand&cat=<?=$brand->slug; ?>"><?= $brand->name; ?></a>
        </li>
    <?php endforeach; ?>
</ul>