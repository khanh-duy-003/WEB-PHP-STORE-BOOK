<?php

use App\Models\Post;

if (isset($_REQUEST['THEM'])) {
    $post = new Post();
    $post->title = $_REQUEST["title"];
    $post->topic_id = $_REQUEST["topic_id"];

    $post->slug = str_slug($_REQUEST["title"]);
    $post->detail = $_REQUEST["detail"];

    if (strlen($_FILES["image"]["name"])>0){
        $target_dir ="../public/images/post/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extention = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extention, ['jpg', 'jpeg', 'png', 'gif', 'webp'])){
            $filename = date('YmdHis') . "." . $extention;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $filename);
            $post->image = $filename;

        }
    }
    $post->type = 'post';
    $post->metakey = $_REQUEST["metakey"];
    $post->metadesc = $_REQUEST["metadesc"];
    $post->status = $_REQUEST["status"];
    $post->created_at = date('Y-m-d H:i:s');
    $post->created_by = $_SESSION['user_id'] ?? 1;
    $post->updated_at = date('Y-m-d H:i:s');
    $post->updated_by = $_SESSION['user_id'] ?? 1;
    $post->save();
set_flash("message", ["type"=> "success", "msg" =>"Thêm thành công"]);
header("location:index.php?opt=post");
}

if (isset($_REQUEST['CAPNHAT'])) {
    $id = $_REQUEST["id"];
    $post = Post::find($id);

    $post->title = $_REQUEST["title"];
    $post->slug = str_slug($_REQUEST["title"]);
    $post->detail = $_REQUEST["detail"];
    if (strlen($_FILES["image"]["name"])>0){
        $target_dir ="../public/images/post/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extention = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extention, ['jpg', 'jpeg', 'png', 'gif', 'webp'])){
            //xóa hình
            if(file_exists("../public/images/post/".$post->image))
            {
                unlink("../public/images/post/".$post->image);
            }
            //end
            $filename = date('YmdHis') . "." . $extention;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $filename);
            $post->image = $filename;

        }
    }
    $post->type = 'post';
    $post->metakey = $_REQUEST["metakey"];
    $post->metadesc = $_REQUEST["metadesc"];

    $post->updated_at = date('Y-m-d H:i:s');
    $post->updated_by = $_SESSION["user_id"] ?? 1;
    $post->status = $_REQUEST["status"];
    $post->save();
set_flash("message", ["type"=> "success", "msg" =>"Cập nhật thành công"]);
header("location:index.php?opt=post");
}