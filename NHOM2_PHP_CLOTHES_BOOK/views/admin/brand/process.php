<?php

use App\Models\Brand;

if (isset($_REQUEST['THEM'])) {
    $brand = new Brand();
    $brand->name = $_REQUEST["name"];
    $brand->slug = str_slug($_REQUEST["name"]);
    $brand->description = $_REQUEST["description"];
    $brand->sort_order = $_REQUEST["sort_order"];

    if (strlen($_FILES["image"]["name"])>0){
        $target_dir ="../public/images/brand/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extention = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extention, ['jpg', 'jpeg', 'png', 'gif', 'webp'])){
            $filename = date('YmdHis') . "." . $extention;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $filename);
            $brand->image = $filename;

        }
    }

    $brand->created_at = date('Y-m-d H:i:s');
    $brand->created_by = $_SESSION["user_id"] ?? 1;
    $brand->status = $_REQUEST["status"];
    $brand->save();
set_flash("message", ["type"=> "success", "msg" =>"Thêm thành công"]);
header("location:index.php?opt=brand");
}

if (isset($_REQUEST['CAPNHAT'])) {
    $id = $_REQUEST["id"];
    $brand = Brand::find($id);
    $brand->name = $_REQUEST["name"];
    $brand->slug = str_slug($_REQUEST["name"]);
    $brand->description = $_REQUEST["description"];
    $brand->sort_order = $_REQUEST["sort_order"];

    if (strlen($_FILES["image"]["name"])>0){
        $target_dir ="../public/images/brand/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extention = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extention, ['jpg', 'jpeg', 'png', 'gif', 'webp'])){
            //xóa hình
            if(file_exists("../public/images/brand/".$brand->image))
            {
                unlink("../public/images/brand/".$brand->image);
            }
            //end
            $filename = date('YmdHis') . "." . $extention;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $filename);
            $brand->image = $filename;

        }
    }

    $brand->updated_at = date('Y-m-d H:i:s');
    $brand->updated_by = $_SESSION["user_id"] ?? 1;
    $brand->status = $_REQUEST["status"];
    $brand->save();
set_flash("message", ["type"=> "success", "msg" =>"Thêm thành công"]);
header("location:index.php?opt=brand");
}