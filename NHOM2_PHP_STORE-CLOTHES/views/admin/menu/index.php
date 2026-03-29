<?php

use App\Models\Menu;

$menus = Menu::where('status', '!=', 0)
   ->orderBy('created_at', 'DESC')
   ->get(); // Seclect * from Brand
?>
<?php require_once "../views/admin/header.php"; ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Quản lý menu</h1>
      <a href="?opt=menu&cat=create" class="btn-add">Thêm mới</a>
      <div class="row mt-3 align-items-center">
         <div class="col-6">
            <ul class="manager">
               <li><a href="?opt=menu">Tất cả (123)</a></li>
               <li><a href="#">Xuất bản (12)</a></li>
               <li><a href="?opt=menu&cat=trash">Rác (12)</a></li>
            </ul>
         </div>
         <div class="col-6 text-end">
            <input type="text" class="search d-inline" />
            <button class="d-inline btnsearch">Tìm kiếm</button>
         </div>
      </div>
   </section>
   <section class="content-body my-2">
      <div class="row">
         <div class="col-md-12">
            <div class="row mt-1 align-items-center">
               <div class="col-md-8">
                  <select name="" class="d-inline me-1">
                     <option value="">Hành động</option>
                     <option value="">Bỏ vào thùng rác</option>
                  </select>
                  <button class="btnapply">Áp dụng</button>
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
            <?php require_once '../views/admin/message.php'; ?>

            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th class="text-center" style="width:30px;">
                        <input type="checkbox" id="checkboxAll" />
                     </th>
                     <th>Tên menu</th>
                     <th>Liên kết</th>
                     <th>Vị trí</th>
                     <th class="text-center" style="width:30px;">ID</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($menus as $menu) : ?>
                     <tr class="datarow">
                        <td class="text-center">
                           <input type="checkbox" id="checkId" />
                        </td>
                        <td>
                           <div class="name">
                              <?= $menu->name ?>
                           </div>
                           <div class="function_style">
                              <?php if ($menu->status == 1) : ?>
                                 <a href="index.php?opt=menu&cat=status&id=<?= $menu->id ?>" class="text-success mx-1">
                                    <i class="fa fa-toggle-on"></i>
                                 </a>
                              <?php else : ?>
                                 <a href="index.php?opt=menu&cat=status&id=<?= $menu->id ?>" class="text-danger mx-1">
                                    <i class="fa fa-toggle-off"></i>
                                 </a>
                              <?php endif; ?>
                              <a href="index.php?opt=menu&cat=edit&id=<?= $menu->id ?>" class="text-primary mx-1">
                                 <i class="fa fa-edit"></i>
                              </a>
                              <a href="index.php?opt=menu&cat=show&id=<?= $menu->id ?>" class="text-info mx-1">
                                 <i class="fa fa-eye"></i>
                              </a>
                              <a href="index.php?opt=menu&cat=delete&id=<?= $menu->id ?>" class="text-danger mx-1">
                                 <i class="fa fa-trash"></i>
                              </a>
                           </div>
                        </td>
                        <td><?= $menu->link ?></td>
                        <td><?= $menu->position ?></td>
                        <td class="text-center"><?= $menu->id ?></td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>