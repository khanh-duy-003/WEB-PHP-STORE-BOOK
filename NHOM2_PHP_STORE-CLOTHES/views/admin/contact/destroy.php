<?php 
use App\Models\contact;

$id = $_REQUEST["id"];
$contact = contact::find($id);
if($contact==null){
    set_flash("message", ["type"=> "danger", "msg" =>"Mẫu tin không tồn tại"]);
    header("location:index.php?opt=contact&cat=trash");

}
if(file_exists("../public/images/contact/".$contact->image))
{
    unlink("../public/images/contact/".$contact->image);
}
$contact->delete();
set_flash("message", ["type"=> "success", "msg" =>"Xóa thành công"]);
header("location:index.php?opt=contact&cat=trash");

