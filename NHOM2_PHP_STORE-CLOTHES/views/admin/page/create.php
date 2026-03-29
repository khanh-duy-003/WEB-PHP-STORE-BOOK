<?php

use App\Models\Post;
use App\Models\Topic;

$topic = Topic::where('status', '!=', '0')->get();
$str_topic_id = "";
foreach ($topic as $item) {
   $str_topic_id .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
}
?>

<?php require_once "../views/admin/header.php"; ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Thêm trang đơn</h1>
      <div class="text-end">
         <a href="index.php?opt=page" class="btn btn-sm btn-success">
            <i class="fa fa-arrow-left"></i> Về danh sách
         </a>
      </div>
   </section>
   <section class="content-body my-2">
      <form action="index.php?opt=page&cat=process" method="post" enctype="multipart/form-data">
         <div class="row">
            <div class="col-md-9">
               <div class="mb-3">
                  <label><strong>Tiêu đề bài viết (*)</strong></label>
                  <input id="title" type="text" name="title" class="form-control" placeholder="Nhập tiêu đề" />
               </div>
               <div class="mb-3">
                  <label><strong>Chi tiết (*)</strong></label>
                  <textarea id="detail" name="detail" rows="7" class="form-control" placeholder="Nhập chi tiết"></textarea>
               </div>
               <div class="form-group">
                  <label for="metakey">Từ khóa (SEO):</label>
                  <input type="text" class="form-control" id="metakey" name="metakey" placeholder="VD: Từ khóa">
               </div>
               <div class="mb-3">
                  <label><strong>Mô tả (*)</strong></label>
                  <textarea id="metadesc" name="metadesc" rows="4" class="form-control" placeholder="Mô tả"></textarea>
               </div>
            </div>
            <div class="col-md-3">
               <div class="box-container mt-4 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Chọn trạng thái đăng</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">

                     <select name="status" class="form-select">
                        <option value="1">Xuất bản</option>
                        <option value="2">Chưa xuất bản</option>
                     </select>
                  </div>
                  <div class="box-footer text-end px-2 py-3">
                     <button type="submit" class="btn btn-success btn-sm text-end" name="THEM">
                        <i class="fa fa-save" aria-hidden="true"></i> Lưu[Thêm]
                     </button>
                  </div>
               </div>
               <div class="box-container mt-2 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Chủ đề (*)</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">
                     <select name="topic_id" class="form-select">

                        <option value="0">Tên chủ đề</option>
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
      </form>
   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>