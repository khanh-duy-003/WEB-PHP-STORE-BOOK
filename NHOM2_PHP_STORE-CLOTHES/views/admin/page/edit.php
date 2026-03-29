<?php

use App\Models\Post;
use App\Models\Topic;


$posts = Post::where('status', '!=', 0)
   ->orderBy('created_at', 'DESC')
   ->get(); // Seclect * from post

$topic = Topic::where('status', '!=', '0')->get();
$str_topic_id = "";

foreach ($topic as $item) {
   $str_topic_id .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
}

$id = $_REQUEST['id'];
$post = Post::find($id);
if ($post == null) {
   set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
   header("location:index.php?opt=post");
}
$posts = Post::where('status', '!=', 0)
   ->orderBy('created_at', 'DESC')
   ->get(); // Seclect * from post
?>
<?php require_once "../views/admin/header.php"; ?>
<!--CONTENT  -->
<div class="content">
   <form action="index.php?opt=page&cat=process" method="post" enctype="multipart/form-data">
      <section class="content-header my-2">
         <h1 class="d-inline">Cập nhật bài viết</h1>
         <div class="text-end">
            <a href="index.php?opt=post" class="btn btn-sm btn-success">
               <i class="fa fa-arrow-left"></i> Về danh sách
            </a>
         </div>
      </section>
      <section class="content-body my-2">

         <div class="row">
            <div class="col-md-9">
               <input name="id" hidden value="<?= $post->id; ?>">

               <div class="mb-3">
                  <label><strong>Tiêu đề bài viết (*)</strong></label>
                  <input type="text" name="title" value="<?= $post->title; ?>" class="form-control" placeholder="Nhập tiêu đề" />
               </div>
               <div class="mb-3">
                  <label><strong>Slug (*)</strong></label>
                  <input type="text" name="slug" value="<?= $post->slug; ?>" class="form-control" placeholder="Slug" />
               </div>
               <div class="mb-3">
                  <label for="title"><strong>Chi tiết (*)</strong></label>
                  <input type="text" rows="7" value="<?= $post->detail ?>" class="form-control" id="title" name="detail" placeholder="Nhập chi tiết" />
               </div>
               <div class="form-group">
                  <label for="metakey">Từ khóa (SEO):</label>
                  <input type="text" value="<?= $post->metakey ?>" class="form-control" id="metakey" name="metakey" placeholder="VD: Từ khóa">
               </div>
               <div class="mb-3">
                  <label for="metadesc"><strong>Mô tả (*)</strong></label>
                  <input type="text" id="metadesc" name="metadesc" rows="4" value="<?= $post->metadesc; ?>" class="form-control" placeholder="Mô tả" />
               </div>
            </div>
            <div class="col-md-3">
               <div class="box-container mt-4 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Chọn trạng thái đăng</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">

                     <select name="status" class="form-select">
                        <option value="1" <?= $post->status == 1 ? 'selected' : ''; ?>>Xuất bản</option>
                        <option value="2" <?= $post->status == 2 ? 'selected' : ''; ?>>Chưa xuất bản</option>
                     </select>
                  </div>
                  <div class="box-footer text-end px-2 py-3">
                     <button type="submit" class="btn btn-success btn-sm text-end" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i> Cập nhật
                     </button>
                  </div>
               </div>
               <div class="box-container mt-2 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Chủ đề (*)</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">
                     <select name="topic_id" class="form-select">
                        <option value="0">Chọn chủ đề</option>
                        <?= $str_topic_id; ?>

                     </select>
                  </div>
               </div>
               <div class="box-container mt-2 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Hình đại diện</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">
                     <input type="file" name="image" class="form-control" />
                  </div>
               </div>
            </div>
         </div>

      </section>
      <form action="index.php?opt=post&cat=process" method="post" enctype="multipart/form-data">
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>