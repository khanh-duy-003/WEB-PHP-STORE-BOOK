<?php

use App\Models\Category;
use App\Models\Menu;

// Fetch categories from the database
$list = Category::where('status', '!=', '0')->get();

// Generate options for parent category dropdown
function generateParentOptions($categories)
{
   $options = '<option value="0">-- Chọn danh mục cha --</option>';
   foreach ($categories as $category) {
      $options .= '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
   }
   return $options;
}

$str_parent_id = generateParentOptions($list);


$id = $_REQUEST['id'];
$menu = Menu::find($id);
if ($menu == null) {
   set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
   header("location:index.php?opt=menu");
}
?>
<?php require_once "../views/admin/header.php"; ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Cập nhật menu</h1>
      <div class="text-end">
         <a href="menu_index.html" class="btn btn-sm btn-success">
            <i class="fa fa-arrow-left"></i> Về danh sách
         </a>
      </div>
   </section>
   <section class="content-body my-2">
      <form action="index.php?opt=menu&cat=process" method="post" enctype="multipart/form-data">

         <div class="row">
            <div class="col-md-9">
               <div class="form-group">
                  <label for="name">Tên menu</label>
                  <input type="name" class="form-control" value="<?= $menu->name; ?>" id="name" name="name" required>
               </div>

               <div class="form-group">
                  <label for="link">Link:</label>
                  <input class="form-control" id="link" value="<?= $menu->link; ?>" name="link" required></input>
               </div>
               <div class="form-group">
                  <label for="position">Vị trí</label>
                  <input type="text" class="form-control" value="<?= $menu->position; ?>" id="position" name="position">
               </div>
               <div class="form-group">
                  <label for="parent_id">Danh mục cha:</label>
                  <select class="form-control" id="parent_id" name="parent_id">
                     <?= $str_parent_id; ?>
                  </select>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="id">Sau sản phẩm:</label>
                  <select class="form-control" id="id" name="id">
                     <option value="">-- Chọn ID --</option>
                     <?php
                     foreach ($list as $category) {
                        echo '<option value="' . $category->sort_order + 1 . '">Sau:' . $category['name'] . '</option>';
                     }
                     ?>
                  </select>
               </div>
               <div class="box-body p-2 border-bottom">

                  <select name="status" class="form-select">
                     <option value="1" <?= $menu->status == 1 ? 'selected' : ''; ?>>Xuất bản</option>
                     <option value="2" <?= $menu->status == 2 ? 'selected' : ''; ?>>Chưa xuất bản</option>
                  </select>
               </div>

            </div>
            <div class="row">
               <div class="col-md-12 text-end">
                  <button style="border-radius: 0px; width:120px; margin-right:12px; margin-top:-60px " name="CAPNHAT" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cập nhật</button>
               </div>
            </div>
         </div>
         <form action="index.php?opt=menu&cat=process" method="post" enctype="multipart/form-data">

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/header.php"; ?>