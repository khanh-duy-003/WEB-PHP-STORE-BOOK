<?php

use App\Models\Menu;

$list_menu_mainmenu_sub = Menu::where([['parent_id', '=', $item_menu_mainmenu->id], ['status', '=', 1], ['position', '=', 'mainmenu']])
    ->orderBy('sort_order', 'ASC')
    ->get();

?>

<?php if (count($list_menu_mainmenu_sub) == 0) : ?>

<li class="nav-item">
    <a class="nav-link text-white" aria-current="page" href="<?= $item_menu_mainmenu->link; ?>">
        <?= $item_menu_mainmenu->name; ?>
    </a>

</li>

<?php else : ?>

<li class="nav-item dropdown" style="position: relative;">
    <a class="nav-link dropdown-toggle text-white" href="<?= $item_menu_mainmenu->link; ?>" role="button"
        data-bs-toggle="dropdown" aria-expanded="false">
        <?= $item_menu_mainmenu->name; ?>
    </a>

    <ul class="dropdown-menu">
        <?php foreach ($list_menu_mainmenu_sub as $item_menu_mainmenu_sub) : ?>
        <li>
            <a class="dropdown-item text-main" href="<?= $item_menu_mainmenu_sub->link; ?>">
                <?= $item_menu_mainmenu_sub->name; ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>

</li>

<?php endif; ?>
<style>
.dropdown-menu {
    color: #FF9900;
}
</style>