<?php 
use App\Models\Brand;

$id = $_REQUEST["id"];
$brand = Brand::find($id);
if($brand==null){
    set_flash("message", ["type"=> "danger", "msg" =>"Mẫu tin không tồn tại"]);
    header("location:index.php?opt=brand&cat=trash");

}
$brand->status = 2;
$brand->updated_at = date('Y-m-d H:i:s');
$brand->updated_by = $_SESSION["user_id"] ?? 1;
$brand->save();
set_flash("message", ["type"=> "success", "msg" =>"Khôi phục thành công"]);
header("location:index.php?opt=brand&cat=trash");

