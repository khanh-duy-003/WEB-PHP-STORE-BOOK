<?php


use App\Models\Menu;
$list_menu_footer = Menu::where([['parent_id', '=', 0], ['status', '=', 1], ['position', '=', 'footermenu']])
    ->orderBy('sort_order', 'ASC')
    ->get();
?>
<ul class="footer-menu">
    <?php foreach($list_menu_footer as $list_menu_footer):?>
    <li><a href="<?=$list_menu_footer->link;?>">
    <?=$list_menu_footer->name;?>
</a>
</li>
    <?php endforeach;?>
    
</ul>