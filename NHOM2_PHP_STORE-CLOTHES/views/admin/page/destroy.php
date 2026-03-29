<?php 
use App\Models\post;

$id = $_REQUEST["id"];
$post = post::find($id);
if($post==null){
    set_flash("message", ["type"=> "danger", "msg" =>"Mẫu tin không tồn tại"]);
    header("location:index.php?opt=page&cat=trash");

}
if(file_exists("../public/images/post/".$post->image))
{
    unlink("../public/images/post/".$post->image);
}
$post->delete();
set_flash("message", ["type"=> "success", "msg" =>"Xóa thành công"]);
header("location:index.php?opt=page&cat=trash");

