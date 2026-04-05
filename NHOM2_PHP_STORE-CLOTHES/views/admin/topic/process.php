<?php

use App\Models\Topic;

if (isset($_REQUEST['THEM'])) {
    $topic = new Topic();
    $topic->name = $_REQUEST["name"];
    $topic->slug = str_slug($_REQUEST["name"]);
    $topic->description = $_REQUEST["description"];
    $topic->sort_order = $_REQUEST["sort_order"];
    $topic->created_at = date('Y-m-d H:i:s');
    $topic->created_by = $_SESSION["user_id"] ?? 1;
    $topic->status = $_REQUEST["status"];
    $topic->save();
set_flash("message", ["type"=> "success", "msg" =>"Thêm thành công"]);
header("location:index.php?opt=topic");
}

if (isset($_REQUEST['CAPNHAT'])) {
    $id = $_REQUEST["id"];
    $topic = Topic::find($id);
    $topic->name = $_REQUEST["name"];
    $topic->slug = str_slug($_REQUEST["name"]);
    $topic->description = $_REQUEST["description"];
    $topic->sort_order = $_REQUEST["sort_order"];

    $topic->updated_at = date('Y-m-d H:i:s');
    $topic->updated_by = $_SESSION["user_id"] ?? 1;
    $topic->status = $_REQUEST["status"];
    $topic->save();
set_flash("message", ["type"=> "success", "msg" =>"Thêm thành công"]);
header("location:index.php?opt=topic");
}