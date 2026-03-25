<?php 
use App\Models\Menu;

$id = $_REQUEST["id"];
$menu = Menu::where('id', '=', $id)->first();
if($menu==null){
    set_flash("message", ["type"=> "danger", "msg" =>"Mẫu tin không tồn tại"]);
    header("location:index.php?opt=menu");

}
$menu->status = $menu->status == 1 ? 2 :1;
$menu->updated_at = date('Y-m-d H:i:s');
$menu->updated_by = $_SESSION["user_id"] ?? 1;
$menu->save();
set_flash("message", ["type"=> "success", "msg" =>"Thay đổi trạng thái thành công"]);
header("location:index.php?opt=menu");

