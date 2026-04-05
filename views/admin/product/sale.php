<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Tiêu đề giao diện</title>
   <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="public/fontawesome/css/all.min.css">

   <link rel="stylesheet" href="public/css/backend.css">
</head>

<body>
   <section class="hdl-header sticky-top">
      <div class="container-fluid">
         <ul class="menutop">
            <li>
               <a href="">
                  <i class="fa-brands fa-dashcube"></i> Shop Thời trang
               </a>
            </li>
            <li class="text-phai">
               <a href="">
                  <i class="fa-solid fa-power-off"></i> Thoát
               </a>
            </li>
            <li class="text-phai">
               <a href="">
                  <i class="fa fa-user" aria-hidden="true"></i> Chào quản lý
               </a>
            </li>
         </ul>
      </div>
   </section>
   <section class="hdl-content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-2 bg-dark p-0 hdl-left">
               <div class="hdl-left">
                  <div class="dashboard-name">
                     Bản điều khiển
                  </div>
                  <nav class="m-2 mainmenu">
                     <ul class="main">
                        <li class="hdlitem item-sub">
                           <i class="fa-brands fa-product-hunt icon-left"></i>
                           <a href="#">Sản phẩm</a>
                           <i class="fa-solid fa-plus icon-right"></i>
                           <ul class="submenu">
                              <li>
                                 <a href="product_index.html">Tất cả sản phẩm</a>
                              </li>
                              <li>
                                 <a href="product_import.html">Nhập hàng</a>
                              </li>
                              <li>
                                 <a href="category_index.html">Danh mục</a>
                              </li>
                              <li>
                                 <a href="brand_index.html">Thương hiệu</a>
                              </li>
                              <li>
                                 <a href="product_sale.html">Khuyễn mãi</a>
                              </li>
                           </ul>
                        </li>
                        <li class="hdlitem item-sub">
                           <i class="fa-brands fa-product-hunt icon-left"></i>
                           <a href="#">Bài viết</a>
                           <i class="fa-solid fa-plus icon-right"></i>
                           <ul class="submenu">
                              <li>
                                 <a href="post_index.html">Tất cả bài viết</a>
                              </li>
                              <li>
                                 <a href="topic_index.html">Chủ đề</a>
                              </li>
                              <li>
                                 <a href="page_index.html">Trang đơn</a>
                              </li>
                           </ul>
                        </li>
                        <li class="hdlitem item-sub">
                           <i class="fa-brands fa-product-hunt icon-left"></i>
                           <a href="#">Quản lý bán hàng</a>
                           <i class="fa-solid fa-plus icon-right"></i>
                           <ul class="submenu">
                              <li>
                                 <a href="order_index.html">Tất cả đơn hàng</a>
                              </li>
                              <li>
                                 <a href="order_export.html">Xuất hàng</a>
                              </li>
                           </ul>
                        </li>
                        <li class="hdlitem">
                           <i class="fa-regular fa-circle icon-left"></i>
                           <a href="customer_index.html">Khách hàng</a>
                        </li>
                        <li class="hdlitem">
                           <i class="fa-regular fa-circle icon-left"></i>
                           <a href="contact_index.html">Liên hệ</a>
                        </li>
                        <li class="hdlitem item-sub">
                           <i class="fa-brands fa-product-hunt icon-left"></i>
                           <a href="#">Giao diện</a>
                           <i class="fa-solid fa-plus icon-right"></i>
                           <ul class="submenu">
                              <li>
                                 <a href="menu_index.html">Menu</a>
                              </li>
                              <li>
                                 <a href="banner_index.html">Banner</a>
                              </li>
                           </ul>
                        </li>
                        <li class="hdlitem item-sub">
                           <i class="fa-brands fa-product-hunt icon-left"></i>
                           <a href="#">Hệ thống</a>
                           <i class="fa-solid fa-plus icon-right"></i>
                           <ul class="submenu">
                              <li>
                                 <a href="user_index.html">Thành viên</a>
                              </li>
                              <li>
                                 <a href="config_index.html">Cấu hình</a>
                              </li>
                           </ul>
                        </li>
                     </ul>
                  </nav>
               </div>
            </div>
            <div class="col-md-10">
               <!--CONTENT  -->
               <div class="content">
                  <section class="content-header my-2">
                     <h1 class="d-inline">Khuyến mãi</h1>
                     <div class="row mt-3 align-items-center">
                        <div class="col-12 text-end">
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

                     <table class="table table-bordered" id="mytable2">
                        <thead>
                           <tr>
                              <th class="text-center" style="width:30px;">
                                 <input type="checkbox" id="checkboxAll" />
                              </th>
                              <th class="text-center" style="width:90px;">Hình ảnh</th>
                              <th>Tên sản phẩm</th>
                              <th>Giá bán</th>
                              <th>Ngày BĐ</th>
                              <th>Ngày kết thúc</th>
                              <th>Giá sale</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr class="datarow">
                              <td class="text-center">
                                 <input type="checkbox" id="checkId" />
                              </td>
                              <td>
                                 <img style="width:90px;" src="hinh" alt="hh" />
                              </td>
                              <td>
                                 <div class="name">
                                    Tên sản phẩm
                                 </div>
                                 <div class="function_style">
                                    <a class="mx-1 text-success" href="#">
                                       <i class="fas fa-toggle-on"></i>
                                    </a>
                                    <a class="mx-1 text-primary" href="#">
                                       <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="mx-1 text-info" href="#">
                                       <i class="fas fa-eye"></i>
                                    </a>
                                    <a class="mx-1 text-danger" href="#">
                                       <i class="fas fa-trash"></i>
                                    </a>
                                 </div>
                              </td>
                              <td>324343</td>
                              <td>ngày bd</td>
                              <td>jjjj</td>
                              <td>2321</td>
                           </tr>
                        </tbody>
                     </table>

                  </section>
               </div>
               <!--END CONTENT-->
            </div>
         </div>
      </div>
   </section>
   <script src="public/jquery/jquery-3.7.0.min.js"></script>

   <script src="public/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="public/js/backend.js"></script>
</body>

</html>