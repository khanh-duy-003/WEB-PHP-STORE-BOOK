<?php 
use App\Models\contact;

$id = $_REQUEST["id"];
$contact = contact::find($id);
if($contact==null){
    set_flash("message", ["type"=> "danger", "msg" =>"Mẫu tin không tồn tại"]);
    header("location:index.php?opt=contact&cat=trash");

}
$contact->status = 2;
$contact->updated_at = date('Y-m-d H:i:s');
$contact->updated_by = $_SESSION["user_id"] ?? 1;
$contact->save();
set_flash("message", ["type"=> "success", "msg" =>"Khôi phục thành công"]);
header("location:index.php?opt=contact&cat=trash");

