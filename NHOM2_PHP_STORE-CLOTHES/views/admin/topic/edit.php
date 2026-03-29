<?php
use App\Models\Topic;
$id = $_REQUEST["id"];
$topic = Topic::where('id', '=', $id)->first();
if($topic==null){
    set_flash("message", ["type"=> "danger", "msg" =>"Mẫu tin không tồn tại"]);
    header("location:index.php?opt=topic");

}
$topics = Topic::where('status', '!=', 0)
->orderBy('created_at', 'DESC')
->get(); // Seclect * from topic
$str_sort_order ="";
foreach($topics as $item){
   if($item->sort_order == $topic->sort_order-1)
   {
      $str_sort_order .= "<option selected value='" . $item->sort_order+1 . "'>" . $item->name . "</option>";

   }
   else
   {
   $str_sort_order .= "<option value='" . $item->sort_order+1 . "'>" . $item->name . "</option>";
   }
}
?>
<?php require_once "../views/admin/header.php"; ?>
               <!--CONTENT  -->
               <div class="content">
               <form action="index.php?opt=topic&cat=process" method="post" enctype="multipart/form-data">

                  <section class="content-header my-2">
                     <h1 class="d-inline">Cập nhật chủ đề</h1>
                     <div class="text-end">
                        <a class="btn btn-sm btn-primary" href="index.php?opt=topic">Về danh sách</a>
                     </div>
                  </section>
                  <section class="content-body my-2">

                     <div class="row">
                        <div class="col-md-9">
                        <input name="id" hidden value="<?=$topic->id;?>">

                           <div class="mb-3">
                              <label><strong>Tên chủ đề (*)</strong></label>
                              <input type="text" value="<?= $topic->name;?>" name="name" id="name" placeholder="Nhập tên chủ đề"
                                 class="form-control" required />
                           </div>
                           <div class="mb-3">
                              <label><strong>Slug</strong></label>
                              <input type="text" value="<?= $topic->slug;?>" name="slug" id="slug" placeholder="Nhập slug" class="form-control" />
                           </div>
                           <div class="mb-3">
                              <label><strong>Mô tả</strong></label>
                              <input name="description" value="<?= $topic->description;?>" rows="6" class="form-control"
                                 placeholder="Nhập mô tả"/>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="box-container mt-4 bg-white">
                              <div class="box-header py-1 px-2 border-bottom">
                                 <strong>Chọn trạng thái đăng</strong>
                              </div>
                              <div class="box-body p-2 border-bottom">
                              <select name="status" class="form-control">
                                    <option value="1" <?= $topic->status==1 ? 'selected' :'';?>>Xuất bản</option>
                                    <option value="2" <?= $topic->status==2 ? 'selected' :'';?>>Chưa xuất bản</option>
                                 </select>
                              </div>
                              <div class="box-footer text-end px-2 py-3">
                                 <button type="submit" class="btn btn-success btn-sm text-end" name="CAPNHAT">
                                    <i class="fa fa-save" aria-hidden="true"></i> Cập nhât
                                 </button>
                              </div>
                           </div>
                           <div class="box-container mt-4 bg-white">
                              <div class="box-header py-1 px-2 border-bottom">
                                 <strong>Thứ tự</strong>
                              </div>
                              <div class="box-body p-2 border-bottom">
                                 <select name="sort_order" class="form-select">
                                 <option value="0">Chọn vị trí</option>
                              <?=$str_sort_order;?>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>

                  </section>
               </form>
               </div>
               <!--END CONTENT-->
               <?php require_once "../views/admin/footer.php"; ?>