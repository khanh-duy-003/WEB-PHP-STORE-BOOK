
<?php

use App\Models\Category;
use App\Models\Menu;

$list_category = Category::where([['parent_id', '=', 0], ['status', '=', 1]])
    ->orderBy('sort_order', 'ASC')
    ->get();
// Menu
$list_menu_mainmenu = Menu::where([['parent_id', '=', 0], ['status', '=', 1], ['position', '=', 'mainmenu']])
    ->orderBy('sort_order', 'ASC')
    ->get();
?>

<style>
    .list-category:hover .dropdown-toggle i {
        color: #FF9900;
    }

    .navbar-nav li a:hover {
        color: #FF9900 !important;
    }

    .dropdown-menu .dropdown-item:hover {
        color: #FF9900;
    }
</style>

<section class="hdl-mainmenu bg-main">
    <div class="container">
        <div class="row">
            <div class="col-12 d-none d-md-block col-md-2 d-none d-md-block">
                <div class="dropdown list-category">
                    <strong class="dropdown-toggle w-100" style="margin-top: 4px;" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-list fa-lg"></i>
                    </strong>
                    <ul class="dropdown-menu w-100">
                        <?php foreach ($list_category as $item_cat) : ?>
                            <li>
                                <a class="dropdown-item" href="index.php?opt=product&cat=<?= $item_cat->slug; ?>"><?= $item_cat->name; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <nav class="navbar navbar-expand-lg bg-main" style="margin-left: -170px;">
                    <div class="container-fluid">
                        <a class="navbar-brand d-block d-sm-none text-white" href="index.php">NTAShop</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <?php foreach ($list_menu_mainmenu as $item_menu_mainmenu) {
                                    require "views/sites/mod_mainmenu_item.php";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>