<?php

use App\Models\User;

$id = $_REQUEST['id'];
$user = User::find($id);

?>
<?php require_once "../views/admin/header.php"; ?>
               <!--CONTENT  -->
               <div class="content">
                  <section class="content-header my-2">
                     <h1 class="d-inline">Thêm thành viên</h1>
                     <div class="row mt-2 align-items-center">
                        <div class="col-md-12 text-end">
                          
                           <a href="user_index.html" class="btn btn-primary btn-sm">
                              <i class="fa fa-arrow-left"></i> Về danh sách
                           </a>
                        </div>
                     </div>
                  </section>
                  <section class="content-body my-2">

               <form action="index.php?opt=user&cat=process" method="post" enctype="multipart/form-data">
                  
                        <div class="row">
                           <div class="col-md-6">
                           <input name="id" hidden value="<?=$user->id;?>">
                              <div class="mb-3">
                                 <label><strong>Tên đăng nhập(*)</strong></label>
                                 <input type="text" name="username" value="<?= $user->username;?>" class="form-control" placeholder="Tên đăng nhập" />
                              </div>
                              <div class="mb-3">
                                 <label><strong>Mật khẩu(*)</strong></label>
                                 <input type="password" name="password" value="<?= $user->password;?>" class="form-control" placeholder="Mật khẩu" />
                              </div>
                              <div class="mb-3">
                                 <label><strong>Email(*)</strong></label>
                                 <input type="text" name="email" value="<?= $user->email;?>" class="form-control" placeholder="Email" />
                              </div>
                              <div class="mb-3">
                                 <label><strong>Điện thoại(*)</strong></label>
                                 <input type="text" name="phone" class="form-control" value="<?= $user->phone;?>" placeholder="Điện thoại" />
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="mb-3">
                                 <label><strong>Họ tên (*)</strong></label>
                                 <input type="text" name="name" class="form-control" value="<?= $user->name;?>" placeholder="Họ tên" />
                              </div>
                              <div class="mb-3">
                                 <label><strong>Giới tính</strong></label>
                                 <select name="gender" id="gender" class="form-control">
                                    <option>Chọn giới tinh</option>
                                    <option value="1" <?= $user->gender==1 ? 'selected' :'';?>>Nam</option>
                                    <option value="2" <?= $user->gender==0 ? 'selected' :'';?>>Nữ</option>
                                 </select>
                              </div>
                              <div class="mb-3">
                                 <label><strong>Địa chỉ</strong></label>
                                 <input type="text" name="address" value="<?= $user->address;?>" class="form-control" placeholder="Địa chỉ" />
                              </div>
                              <div class="mb-3">
                                 <label><strong>Hình đại diện</strong></label>
                                 <input type="file" name="image" class="form-control" />
                              </div>
                              <div class="mb-3">
                                 <label><strong>Trạng thái</strong></label>
                                 <select name="status" class="form-control">
                                 <option value="1" <?= $user->status==1 ? 'selected' :'';?>>Xuất bản</option>
                                    <option value="2" <?= $user->status==2 ? 'selected' :'';?>>Chưa xuất bản</option>
                                 </select>
                              </div>
                           </div>
                           <button class="btn btn-success btn-sm" name="CAPNHAT">
                              <i class="fa fa-save"></i> Cập nhật
                           </button>
                        </div>
                     </form>

                  </section>
               </div>
               <!--END CONTENT-->
               <?php require_once "../views/admin/footer.php"; ?>