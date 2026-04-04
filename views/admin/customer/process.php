<?php

use App\Models\User;

if (isset($_REQUEST['THEM'])) {
    $user = new User();
    $user->name = $_REQUEST["name"];
    $user->username = $_REQUEST["username"];
    $user->password = sha1($_REQUEST["password"]);
    $user->email = $_REQUEST["email"];
    $user->address = $_REQUEST["address"];
    $user->phone = $_REQUEST["phone"];
    $user->status = $_REQUEST["status"];
    $user->gender = $_REQUEST["gender"];
    $user->roles =0;

    if (strlen($_FILES["image"]["name"])>0){
        $target_dir ="../public/images/user/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extention = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extention, ['jpg', 'jpeg', 'png', 'gif', 'webp'])){
            $filename = date('YmdHis') . "." . $extention;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $filename);
            $user->image = $filename;

        }
    }

    $user->created_at = date('Y-m-d H:i:s');
    $user->created_by = $_SESSION["user_id"] ?? 1;
    $user->status = $_REQUEST["status"];
    $user->save();
set_flash("message", ["type"=> "success", "msg" =>"Thêm thành công"]);
header("location:index.php?opt=customer");
}

if (isset($_REQUEST['CAPNHAT'])) {
    $id = $_REQUEST["id"];
    $user = user::find($id);
    $user->name = $_REQUEST["name"];
    $user->username = $_REQUEST["username"];
    $user->password = sha1($_REQUEST["password"]);
    $user->email = $_REQUEST["email"];
    $user->address = $_REQUEST["address"];
    $user->phone = $_REQUEST["phone"];
    $user->status = $_REQUEST["status"];
    $user->gender = $_REQUEST["gender"];
    $user->roles =0;

    if (strlen($_FILES["image"]["name"])>0){
        $target_dir ="../public/images/user/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extention = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extention, ['jpg', 'jpeg', 'png', 'gif', 'webp'])){
            //xóa hình
            if(file_exists("../public/images/user/".$user->image))
            {
                unlink("../public/images/user/".$user->image);
            }
            //end
            $filename = date('YmdHis') . "." . $extention;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $filename);
            $user->image = $filename;

        }
    }
    $user->updated_at = date('Y-m-d H:i:s');
    $user->updated_by = $_SESSION["user_id"] ?? 1;
    $user->status = $_REQUEST["status"];
    $user->save();
set_flash("message", ["type"=> "success", "msg" =>"Thêm thành công"]);
header("location:index.php?opt=customer");
}