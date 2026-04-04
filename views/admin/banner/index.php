<?php

use App\Models\Banner;

$banners = Banner::where('status', '!=', 0)
   ->orderBy('created_at', 'DESC')
   ->get(); // Seclect * from banner
?>
<?php require_once "../views/admin/header.php"; ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Banner</h1>
      <a class="btn-add" href="?opt=banner&cat=create">Thêm mới</a>
      <div class="row mt-3 align-items-center">
         <div class="col-6">
            <ul class="manager">
               <li><a href="index.php?opt=banner">Tất cả (123)</a></li>
               <li><a href="#">Xuất bản (12)</a></li>
               <li><a href="index.php?opt=banner&cat=trash">Rác (12)</a></li>
            </ul>
         </div>
         <div class="col-6 text-end">
            <input type="text" class="search d-inline" />
            <button class="d-inline btnsearch">Tìm kiếm</button>
         </div>
      </div>
      <div class="row mt-1 align-items-center">
         <div class="col-md-8">
            <select name="" class="d-inline me-1">
               <option value="">Hành động</option>
               <option value="">Bỏ vào thùng rác</option>
            </select>
            <button class="btnapply">Áp dụng</button>
            <select name="" class="d-inline me-1">
               <option value="">Tất cả vị trí</option>
            </select>
            <button class="btnfilter">Lọc</button>
         </div>
         <div class="col-md-4 text-end">
            <nav aria-label="Page navigation example">
               <ul class="pagination pagination-sm justify-content-end">
                  <li class="page-item disabled">
                     <a class="page-link">&laquo;</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                     <a class="page-link" href="#">&raquo;</a>
                  </li>
               </ul>
            </nav>
         </div>
      </div>
   </section>
   <section class="content-body my-2">
      <?php require_once '../views/admin/message.php'; ?>

       <table class="table table-bordered">
          <thead>
             <tr>
                <th class="text-center" style="width:30px;">
                   <input type="checkbox" id="checkboxAll" />
                </th>
                <th class="text-center" style="width:130px;">Hình ảnh</th>
                <th>Tên banner</th>
                <th>Vị trí</th>
                <th>Liên kết</th>
                <th class="text-center">Hành động</th>
                <th class="text-center" style="width:30px;">ID</th>
             </tr>
          </thead>
          <tbody>
             <?php foreach ($banners as $banner) : ?>
                <tr class="datarow">
                   <td class="text-center">
                      <input type="checkbox" id="checkId" />
                   </td>
                   <td class="text-center">
                      <?php if ($banner->image && file_exists("../public/images/banner/" . $banner->image)): ?>
                         <img class="img-fluid" src="../public/images/banner/<?= $banner->image; ?>" alt="<?= $banner->image; ?>" style="width:100px;">
                      <?php else: ?>
                         <div class="img-placeholder mx-auto" style="width:100px; height:50px;">PH</div>
                      <?php endif; ?>
                   </td>
                   <td>
                      <div class="name">
                         <a href="index.php?opt=banner&cat=edit&id=<?= $banner->id ?>">
                            <?= $banner->name ?: '#'; ?>
                         </a>
                      </div>
                   </td>
                   <td><?= $banner->position ?: '#' ?></td>
                   <td><?= $banner->link ?: '#' ?></td>
                   <td class="text-center">
                      <div class="function_style">
                         <?php if ($banner->status == 1) : ?>
                            <a href="index.php?opt=banner&cat=status&id=<?= $banner->id; ?>" class="btn btn-sm btn-success mx-1" title="Kích hoạt">
                               <i class="fa fa-toggle-on"></i>
                            </a>
                         <?php else : ?>
                            <a href="index.php?opt=banner&cat=status&id=<?= $banner->id; ?>" class="btn btn-sm btn-danger mx-1" title="Tạm ngưng">
                               <i class="fa fa-toggle-off"></i>
                            </a>
                         <?php endif; ?>
                         <a href="index.php?opt=banner&cat=edit&id=<?= $banner->id ?>" class="btn btn-sm btn-primary mx-1" title="Sửa">
                            <i class="fa fa-edit"></i>
                         </a>
                         <a href="index.php?opt=banner&cat=show&id=<?= $banner->id ?>" class="btn btn-sm btn-info mx-1" title="Chi tiết">
                            <i class="fa fa-eye text-white"></i>
                         </a>
                         <a href="index.php?opt=banner&cat=delete&id=<?= $banner->id ?>" class="btn btn-sm btn-danger mx-1 btn-delete-js" title="Xóa">
                            <i class="fa fa-trash"></i>
                         </a>
                      </div>
                   </td>
                   <td class="text-center"><?= $banner->id ?></td>
                </tr>
             <?php endforeach; ?>
          </tbody>
       </table>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>