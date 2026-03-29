<?php
use App\Models\Post;
$posts = Post::where('status', '!=', 0)
->orderBy('created_at', 'DESC')
->get(); // Seclect * from post

?>
<?php require_once "../views/admin/header.php"; ?>
               <!--CONTENT  -->
               <div class="content">
                  <section class="content-header my-2">
                     <h1 class="d-inline">Quản lý bài viết</h1>
                     <a href="?opt=post&cat=create" class="btn-add">Thêm mới</a>
                     <div class="row mt-3 align-items-center">
                        <div class="col-6">
                           <ul class="manager">
                              <li><a href="?opt=post">Tất cả (123)</a></li>
                              <li><a href="#">Xuất bản (12)</a></li>
                              <li><a href="?opt=post&cat=trash">Rác (12)</a></li>
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
                              <option value="">Chủ đề</option>
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
                  <?php require_once '../views/admin/message.php';?>

                     <table class="table table-bordered">
                        <thead>
                           <tr>
                              <th class="text-center" style="width:30px;">
                                 <input type="checkbox" id="checkboxAll" />
                              </th>
                              <th class="text-center" style="width:130px;">Hình ảnh</th>
                              <th style="width:230px;">Tiêu đề bài viết</th>
                              <th>Nội dung</th>
                              <th class="text-center" style="width:30px;">ID</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php foreach($posts as $post):?>
                           <tr class="datarow">
                              <td>
                                 <input type="checkbox" id="checkId"  />
                              </td>
                              <td>
                                 <img class="img-fluid" src="../public/images/post/<?=$post->image;?>" alt="<?=$post->image;?>">
                              </td>
                              <td>
                                 <div class="name">
                                    <a href="index.php?opt=post&cat=edit&id=<?=$post->id?>">
                                    <?=$post->title?>
                                    </a>
                                 </div>
                                 <div class="function_style">
                                 <?php if($post->status == 1): ?>
                                               <a href="index.php?opt=post&cat=status&id=<?=$post->id;?>" class="px-1 text-success">
                                             <i class="fa fa-toggle-on"></i>
                                          </a>
                                          <?php else : ?>
                                             <a href="index.php?opt=post&cat=status&id=<?=$post->id;?>" class="px-1 text-danger">
                                             <i class="fa fa-toggle-off"></i>
                                             </a>
                                          <?php endif;?>
                                    <a href="index.php?opt=post&cat=edit&id=<?=$post->id?>" class="text-primary mx-1">
                                       <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="index.php?opt=post&cat=show&id=<?=$post->id?>" class="text-info mx-1">
                                       <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="index.php?opt=post&cat=delete&id=<?=$post->id?>" class="text-danger mx-1">
                                       <i class="fa fa-trash"></i>
                                    </a>
                                 </div>
                              </td>
                              <td><?=$post->detail?></td>
                              <td class="text-center"><?=$post->id?></td>
                           </tr>
                           <?php endforeach;?>
                        </tbody>
                     </table>

                  </section>
               </div>
               <!--END CONTENT-->
               <?php require_once "../views/admin/footer.php"; ?>