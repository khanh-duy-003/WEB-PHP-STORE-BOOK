<?php
use App\Models\contact;
$id = $_REQUEST["id"];
$contact = contact::where('id', '=', $id)->first();
if($contact==null){
    set_flash("message", ["type"=> "danger", "msg" =>"Mẫu tin không tồn tại"]);
    header("location:index.php?opt=contact");

}
?>
<?php require_once "../views/admin/header.php"; ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Trả lời liên hệ</h1>
      <div class="text-end">
         <a href="?opt=contact" class="btn btn-sm btn-success">
            <i class="fa fa-arrow-left"></i> Về danh sách
         </a>

      </div>
   </section>
   <section class="content-body my-2">
      <form action="index.php?opt=contact&cat=process" method="post" enctype="multipart/form-data">

         <div class="row">
            <div class="col-4">
            <input name="id" hidden value="<?=$contact->id;?>">

               <div class="mb-3">
                  <label for="name" class="text-main">Họ tên</label>
                  <input type="text" name="name" id="name" value="<?= $contact->name;?>" class="form-control" placeholder="Nhập họ tên" readonly>
               </div>
            </div>
            <div class="col-4">
               <div class="mb-3">
                  <label for="phone" class="text-main">Điện thoại</label>
                  <input type="text" name="phone" id="phone" value="<?= $contact->phone;?>" class="form-control" placeholder="Nhập điện thoại" readonly>
               </div>
            </div>
            <div class="col-4">
               <div class="mb-3">
                  <label for="email" class="text-main">Email</label>
                  <input type="text" name="email" id="email" value="<?= $contact->email;?>" class="form-control" placeholder="Nhập email" readonly>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               <div class="mb-3">
                  <label for="title" class="text-main">Tiêu đề</label>
                  <input type="text" name="title" id="title" class="form-control" value="<?= $contact->title;?>" placeholder="Nhập tiêu đề" readonly>
               </div>
               <div class="mb-3">
                  <label for="content" class="text-main">Nội dung</label>
                  <input name="content" id="content" class="form-control" value="<?= $contact->content;?>" placeholder="Nhập nội dung liên hệ" readonly></input>
               </div>
               <div class="mb-3">
                  <label for="replay_id" class="text-main">Nội dung trả lời</label>
                  <textarea name="replay_id" id="replay_id" class="form-control" value="<?= $contact->replay_id;?>" placeholder="Nhập nội dung liên hệ" rows="5"></textarea>
               </div>
            </div>
         </div>
         <button type="submit" class="btn btn-success btn-sm text-end" name="TRALOI">
            <i class="fa fa-save" aria-hidden="true"></i> Trả lời liên hệ
         </button>
      </form>
   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>