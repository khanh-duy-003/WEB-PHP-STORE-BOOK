<?php 
use App\Models\User;

$id = $_REQUEST["id"];
$user = User::find($id);
if($user==null){
    set_flash("message", ["type"=> "danger", "msg" =>"Mẫu tin không tồn tại"]);
    header("location:index.php?opt=customer&cat=trash");

}
$user->status = 2;
$user->updated_at = date('Y-m-d H:i:s');
$user->updated_by = $_SESSION["user_id"] ?? 1;
$user->save();
set_flash("message", ["type"=> "success", "msg" =>"Khôi phục thành công"]);
header("location:index.php?opt=customer&cat=trash");

