<?php require_once "../views/admin/header.php"; ?>
               <!--CONTENT  -->
               <div class="content">
                  <section class="content-header my-2">
                     <h1 class="d-inline">Blank Page</h1>
                     <a href="" class="btn btn-secondary btn-sm">Thêm mới</a>
                     <div class="row mt-3 align-items-center">
                        <div class="col-6">
                           <ul class="manager">
                              <li><a href="#">Tất cả (123)</a></li>
                              <li><a href="#">Xuất bản (12)</a></li>
                              <li><a href="#">Rác (12)</a></li>
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
                              <option value="">Tất cả danh mục</option>
                           </select>
                           <select name="" class="d-inline me-1">
                              <option value="">Tất cả thương hiệu</option>
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

                     <div class="row">
                        <div class="col-12 my-2">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                              data-bs-target="#chonkhachhang">
                              Chọn khách hàng
                           </button>
                        </div>
                     </div>
                     <div class="row" id="rowshowcustome">
                        <div class="col-md">
                           <label>Họ tên (*)</label>
                           <input type="text" name="name" class="form-control" readonly />
                        </div>
                        <div class="col-md">
                           <label>Email (*)</label>
                           <input type="text" name="email" class="form-control" readonly />
                        </div>
                        <div class="col-md">
                           <label>Điện thoại (*)</label>
                           <input type="text" name="phone" class="form-control" readonly />
                        </div>
                        <div class="col-md-5">
                           <label>Địa chỉ (*)</label>
                           <input type="text" name="address" class="form-control" readonly />
                        </div>
                        <input type="hidden" name="user_id" />
                     </div>
                     <div class="row my-3">
                        <div class="col-12 my-2">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                              data-bs-target="#chonsanpham">
                              Chọn sản phẩm
                           </button>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-12">
                           <table class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th class="text-center" style="width:140px;">Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Tên danh mục</th>
                                    <th>Tên thương hiệu</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody id="bodyproduct">
                                 <tr>
                                    <td>
                                       <img class="img-fluid" src="h" alt="h" />
                                    </td>
                                    <td>Hoten</td>
                                    <td>DanhMuc</td>
                                    <td>ThuongHieu</td>
                                    <td>Gia</td>
                                    <td><input style="width:60px" name="qty[]" type="number" min="0" />
                                    </td>
                                    <td>ThanhTine</td>
                                    <td><button class="btn btn-danger btn-xs px-2">X</button>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>

                  </section>
               </div>
               <!--END CONTENT-->
               <?php require_once "../views/admin/footer.php"; ?>