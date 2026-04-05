<?php 
use App\Models\banner;

$id = $_REQUEST["id"];
$banner = banner::find($id);
if($banner==null){
    set_flash("message", ["type"=> "danger", "msg" =>"Mẫu tin không tồn tại"]);
    header("location:index.php?opt=banner&cat=trash");

}
$banner->status = 2;
$banner->updated_at = date('Y-m-d H:i:s');
$banner->updated_by = $_SESSION["user_id"] ?? 1;
$banner->save();
set_flash("message", ["type"=> "success", "msg" =>"Khôi phục thành công"]);
header("location:index.php?opt=banner&cat=trash");

