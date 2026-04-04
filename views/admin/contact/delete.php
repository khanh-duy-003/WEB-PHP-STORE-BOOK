<?php 
use App\Models\contact;

$id = $_REQUEST["id"];
$contact = contact::where('id', '=', $id)->first();
if($contact==null){
    set_flash("message", ["type"=> "danger", "msg" =>"Mẫu tin không tồn tại"]);
    header("location:index.php?opt=contact");

}
$contact->status = 0;
$contact->updated_at = date('Y-m-d H:i:s');
$contact->updated_by = $_SESSION["user_id"] ?? 1;
$contact->save();
set_flash("message", ["type"=> "success", "msg" =>"Xóa vào thùng rác thành công"]);
header("location:index.php?opt=contact");

