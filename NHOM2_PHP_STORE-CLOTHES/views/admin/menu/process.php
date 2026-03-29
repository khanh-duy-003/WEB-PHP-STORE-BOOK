<?php

use App\Models\Menu;


if (isset($_REQUEST['THEM'])) {
    $menu = new menu();
    $menu->name = $_REQUEST["name"];
    $menu->link = $_REQUEST["link"];
    $menu->type = "category";
    $menu->table_id = 7;
    $menu->level = 2;
    $menu->sort_order = 1;
    $menu->position = $_REQUEST["position"];
    $menu->parent_id = $_REQUEST["parent_id"];
    $menu->created_at = date('Y-m-d H:i:s');
    $menu->created_by = $_SESSION["user_id"] ?? 1;
    $menu->status = $_REQUEST["status"];
    $menu->save();
set_flash("message", ["type"=> "success", "msg" =>"Thêm thành công"]);
header("location:index.php?opt=menu");
}

if (isset($_REQUEST['CAPNHAT'])) {
    $id = $_REQUEST["id"];
    $menu = menu::find($id);
    $menu->link = $_REQUEST["link"];
    $menu->type = "category";
    $menu->table_id = 7;
    $menu->level = 2;
    $menu->sort_order = 1;
    $menu->position = $_REQUEST["position"];
    $menu->parent_id = $_REQUEST["parent_id"];
    $menu->updated_at = date('Y-m-d H:i:s');
    $menu->updated_by = $_SESSION["user_id"] ?? 1;
    $menu->status = $_REQUEST["status"];
    $menu->save();
set_flash("message", ["type"=> "success", "msg" =>"Thêm thành công"]);
header("location:index.php?opt=menu");
}