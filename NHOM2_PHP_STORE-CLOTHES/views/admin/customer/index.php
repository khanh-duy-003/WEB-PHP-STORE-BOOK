
<?php

use App\Models\User;


$users = User::where([['status', '!=', '0'],['roles','=','0']])->orderBy('created_at', 'DESC')->get();
?>
<?php require_once "../views/admin/header.php"; ?>
               <!--CONTENT  -->
               <div class="content">
                  <section class="content-header my-2">
                     <h1 class="d-inline">Khách hàng</h1>
                     <a class="btn-add" href="?opt=customer&cat=create">Thêm mới</a>
                     <div class="row mt-3 align-items-center">
                        <div class="col-6">
                           <ul class="manager">
                              <li><a href="?opt=customer">Tất cả (123)</a></li>
                              <li><a href="#">Xuất bản (12)</a></li>
                              <li><a href="?opt=customer&cat=trash">Rác (12)</a></li>
                           </ul>
                        </div>
                        <div class="col-6 text-end">
                           <input type="text" class="search d-inline" />
                           <button class="d-inlin btnsearch">Tìm kiếm</button>
                        </div>
                     </div>
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
                  </section>
                  <section class="content-body my-2">
                  <?php require_once '../views/admin/message.php';?>

                     <table class="table table-bordered">
                        <thead>
                           <tr>
                              <th class="text-center" style="width:30px;">
                                 <input type="checkbox" id="checkboxAll" />
                              </th>
                              <th class="text-center" style="width:130px;">Hình ảnh</th>
                              <th>Họ tên</th>
                              <th>Điện thoại</th>
                              <th>Email</th>
                              <th class="text-center" style="width:30px;">ID</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php foreach($users as $user):?>
                           <tr class="datarow">
                              <td>
                                 <input type="checkbox" id="checkId" />
                              </td>
                              <td>
                                 <img class="img-fluid" src="../public/images/user/<?=$user->image;?>" alt="<?=$user->image;?>">
                              </td>
                              <td>
                                       <div class="name">
                                          <a href="index.php?opt=customer&cat=edit&id=<?=$user->id;?>">
                                             <?= $user->name;?>
                                          </a>
                                       </div>
                                       <div class="function_style">
                                          <?php if($user->status == 1): ?>
                                               <a href="index.php?opt=customer&cat=status&id=<?=$user->id;?>" class="px-1 text-success">
                                             <i class="fa fa-toggle-on"></i>
                                          </a>
                                          <?php else : ?>
                                             <a href="index.php?opt=customer&cat=status&id=<?=$user->id;?>" class="px-1 text-danger">
                                             <i class="fa fa-toggle-off"></i>
                                             </a>
                                          <?php endif;?>
                                        
                                          <a href="index.php?opt=customer&cat=edit&id=<?=$user->id;?>" class="px-1 text-primary">
                                             <i class="fa fa-edit"></i>
                                          </a>
                                          <a href="index.php?opt=customer&cat=show&id=<?=$user->id;?>" class="px-1 text-info">
                                             <i class="fa fa-eye"></i>
                                          </a>
                                          <a href="index.php?opt=customer&cat=delete&id=<?=$user->id;?>" class="px-1 text-danger">
                                             <i class="fa fa-trash"></i>
                                          </a>
                                       </div>
                                    </td>
                              <td><?=$user->phone;?></td>
                              <td><?=$user->email;?></td>
                              <td class="text-center"><?=$user->id;?></td>
                           </tr>
                           <?php endforeach;?>
                        </tbody>
                     </table>
                  </section>
               </div>
               <!--END CONTENT-->
               <?php require_once "../views/admin/footer.php"; ?>