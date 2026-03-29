<?php 
use App\Models\contact;

$id = $_REQUEST["id"];
$contact = contact::where('id', '=', $id)->first();
if($contact==null){
    set_flash("message", ["type"=> "danger", "msg" =>"Mẫu tin không tồn tại"]);
    header("location:index.php?opt=contact");

}
$contact->status = $contact->status == 1 ? 2 :1;
$contact->updated_at = date('Y-m-d H:i:s');
$contact->updated_by = $_SESSION["user_id"] ?? 1;
$contact->save();
set_flash("message", ["type"=> "success", "msg" =>"Thay đổi trạng thái thành công"]);
header("location:index.php?opt=contact");

