<?php 
use App\Models\Topic;

$id = $_REQUEST["id"];
$topic = Topic::find($id);
if($topic==null){
    set_flash("message", ["type"=> "danger", "msg" =>"Mẫu tin không tồn tại"]);
    header("location:index.php?opt=topic&cat=trash");

}
$topic->status = 2;
$topic->updated_at = date('Y-m-d H:i:s');
$topic->updated_by = $_SESSION["user_id"] ?? 1;
$topic->save();
set_flash("message", ["type"=> "success", "msg" =>"Khôi phục thành công"]);
header("location:index.php?opt=topic&cat=trash");

