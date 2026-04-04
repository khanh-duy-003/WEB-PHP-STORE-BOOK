<?php
$opt = $_GET['opt'] ?? 'dashboard';
$cat = $_GET['cat'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Trang quản lý</title>
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="../public/fontawesome/css/all.min.css">

   <link rel="stylesheet" href="../public/css/backend.css">
   <style>
      /* Style cho Bản điều khiển */
      .dashboard-name {
         background-color: #1a202c !important; /* Màu sẫm hơn sang trọng */
         border-bottom: 2px solid #2d3748;
         transition: all 0.3s;
      }
      .dashboard-name.active {
         background-color: #2271b1 !important; /* Highlight xanh khi active */
         color: #fff !important;
      }
      .dashboard-name a {
         color: #fff;
         text-decoration: none;
         display: block;
         padding: 12px 0;
         font-weight: bold;
      }
      .dashboard-name a i {
         margin-right: 8px;
         font-size: 1.1rem;
      }

      /* Style cho Menu Active */
      .mainmenu ul li.hdlitem.active > a {
         background-color: #2271b1 !important;
         color: #fff !important;
      }
      .mainmenu ul li.item-sub.active ul.submenu {
         display: block !important;
         visibility: visible !important;
         opacity: 1 !important;
         background-color: #2d3748; /* Nền tối cho submenu của item active */
         padding: 5px 0;
      }

      /* Style cho mục con đang được chọn (Active Submenu) */
      .submenu li a.active-sub {
         background-color: #4a5568 !important; /* Màu sáng hơn để phân biệt */
         border-left: 4px solid #2271b1 !important;
         color: #fff !important;
         font-weight: 500;
      }
      
      .img-placeholder {
         width: 60px;
         height: 60px;
         background-color: #dee2e6;
         display: flex;
         align-items: center;
         justify-content: center;
         color: #6c757d;
         font-weight: bold;
         border-radius: 4px;
      }

      /* Popup/Modal CSS tinh chỉnh */
      .modal-content {
         border-radius: 12px;
         border: none;
         box-shadow: 0 10px 30px rgba(0,0,0,0.2);
      }
      .modal-header {
         background-color: #f8f9fa;
         border-bottom: 1px solid #eee;
         border-top-left-radius: 12px;
         border-top-right-radius: 12px;
      }
      .modal-footer {
         border-top: 1px solid #eee;
      }
   </style>
</head>

<body>
   
   <section class="hdl-header sticky-top">
      <div class="container-fluid">
         <ul class="menutop">
            <li>
               <a href="index.php">
                  <i class="fa-brands fa-dashcube"></i> Shop Thời trang
               </a>
            </li>
            <li class="text-phai">
               <a href="logout.php">
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
                  <div class="dashboard-name <?= ($opt == 'dashboard' || empty($_GET['opt'])) ? 'active' : '' ?>">
                     <a href="index.php"><i class="fas fa-tachometer-alt"></i> Bản điều khiển</a>
                  </div>
                  <nav class="m-2 mainmenu">
                     <ul class="main">
                        <li class="hdlitem item-sub <?= in_array($opt, ['product', 'category', 'brand']) ? 'active' : '' ?>">
                           <i class="fa-brands fa-product-hunt icon-left"></i>
                           <a href="#">Sản phẩm</a>
                           <i class="fa-solid fa-plus icon-right"></i>
                           <ul class="submenu">
                              <li>
                                 <a class="<?= ($opt == 'product') ? 'active-sub' : '' ?>" href="index.php?opt=product">Tất cả sản phẩm</a>
                              </li>
                          
                              <li>
                                 <a class="<?= ($opt == 'category') ? 'active-sub' : '' ?>" href="index.php?opt=category">Danh mục</a>
                              </li>
                              <li>
                                 <a class="<?= ($opt == 'brand') ? 'active-sub' : '' ?>" href="index.php?opt=brand">Thương hiệu</a>
                              </li>
                           </ul>
                        </li>
                        <li class="hdlitem item-sub <?= in_array($opt, ['post', 'topic', 'page']) ? 'active' : '' ?>">
                           <i class="fa-brands fa-product-hunt icon-left"></i>
                           <a href="#">Bài viết</a>
                           <i class="fa-solid fa-plus icon-right"></i>
                           <ul class="submenu">
                              <li>
                                 <a class="<?= ($opt == 'post') ? 'active-sub' : '' ?>" href="index.php?opt=post">Tất cả bài viết</a>
                              </li>
                              <li>
                                 <a class="<?= ($opt == 'topic') ? 'active-sub' : '' ?>" href="index.php?opt=topic">Chủ đề</a>
                              </li>
                              <li>
                                 <a class="<?= ($opt == 'page') ? 'active-sub' : '' ?>" href="index.php?opt=page">Trang đơn</a>
                              </li>
                           </ul>
                        </li>
                        <li class="hdlitem item-sub <?= ($opt == 'order') ? 'active' : '' ?>">
                           <i class="fa-brands fa-product-hunt icon-left"></i>
                           <a href="#">Quản lý bán hàng</a>
                           <i class="fa-solid fa-plus icon-right"></i>
                           <ul class="submenu">
                              <li>
                                 <a class="<?= ($opt == 'order') ? 'active-sub' : '' ?>" href="index.php?opt=order">Tất cả đơn hàng</a>
                              </li>
                           </ul>
                        </li>
                        <li class="hdlitem <?= ($opt == 'customer') ? 'active' : '' ?>">
                           <i class="fa-regular fa-circle icon-left"></i>
                           <a href="index.php?opt=customer">Khách hàng</a>
                        </li>
                        <li class="hdlitem <?= ($opt == 'contact') ? 'active' : '' ?>">
                           <i class="fa-regular fa-circle icon-left"></i>
                           <a href="index.php?opt=contact">Liên hệ</a>
                        </li>
                        <li class="hdlitem item-sub <?= in_array($opt, ['menu', 'banner']) ? 'active' : '' ?>">
                           <i class="fa-brands fa-product-hunt icon-left"></i>
                           <a href="#">Giao diện</a>
                           <i class="fa-solid fa-plus icon-right"></i>
                           <ul class="submenu">
                              <li>
                                 <a class="<?= ($opt == 'menu') ? 'active-sub' : '' ?>" href="index.php?opt=menu">Menu</a>
                              </li>
                              <li>
                                 <a class="<?= ($opt == 'banner') ? 'active-sub' : '' ?>" href="index.php?opt=banner">Banner</a>
                              </li>
                           </ul>
                        </li>
                        <li class="hdlitem item-sub <?= ($opt == 'user') ? 'active' : '' ?>">
                           <i class="fa-brands fa-product-hunt icon-left"></i>
                           <a href="#">Hệ thống</a>
                           <i class="fa-solid fa-plus icon-right"></i>
                           <ul class="submenu">
                              <li>
                                 <a class="<?= ($opt == 'user') ? 'active-sub' : '' ?>" href="index.php?opt=user">Thành viên</a>
                              </li>
                              <li>
                                 <a href="logout.php" class="btn btn-danger btn-sm mx-2 my-2" style="border-radius: 0;">Đăng xuất</a>
                              </li>
                           </ul>
                        </li>
                     </ul>
                  </nav>
               </div>
               
            </div>
            
               <div class="col-md-10 mt-3 px-4">

<!-- Modal Xác nhận xóa -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="deleteConfirmModalLabel">
           <i class="fas fa-exclamation-triangle me-2"></i> Xác nhận xóa
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Bạn có chắc chắn muốn xóa mục này không? Hành động này sẽ đưa dữ liệu vào thùng rác.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy bỏ</button>
        <a href="#" id="btnConfirmDelete" class="btn btn-danger">Đồng ý xóa</a>
      </div>
    </div>
  </div>
</div>

<script>
   // Script xử lý Modal xóa
   document.addEventListener('DOMContentLoaded', function() {
      const deleteModalElement = document.getElementById('deleteConfirmModal');
      const btnConfirmDelete = document.getElementById('btnConfirmDelete');

      // Sử dụng Event Delegation để bắt các nút xóa
      document.body.addEventListener('click', function(e) {
         const triggerBtn = e.target.closest('.btn-delete-js');
         if (triggerBtn) {
            e.preventDefault();
            const href = triggerBtn.getAttribute('href') || triggerBtn.getAttribute('data-href');
            
            // Cập nhật href cho nút đồng ý xóa
            btnConfirmDelete.setAttribute('href', href);
            
            // Hiện Modal (Bootstrap 5)
            const modal = new bootstrap.Modal(deleteModalElement);
            modal.show();
         }
      });
   });
</script>