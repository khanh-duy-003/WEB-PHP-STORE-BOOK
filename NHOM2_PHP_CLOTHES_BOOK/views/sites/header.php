<?php
// Kiểm tra xem session giỏ hàng có tồn tại không
if (isset($_SESSION['contentcart'])) {
    // Lấy số lượng sản phẩm trong giỏ hàng
    $cart_count = count($_SESSION['contentcart']);
} else {
    // Nếu giỏ hàng không tồn tại, số lượng sản phẩm sẽ là 0
    $cart_count = 0;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" href="public/images/logo1.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <meta
      name="description"
      content="Web site created using create-react-app"
    />
    <link rel="apple-touch-icon" href="public/images/logo1.png" />
    <!--
      manifest.json provides metadata used when your web app is installed on a
      user's mobile device or desktop. See https://developers.google.com/web/fundamentals/web-app-manifest/
    -->
   
   <title>Shop thời trang YaMe</title>

   <link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="public/fontawesome/css/all.min.css">
   <!-- <link rel="stylesheet" href="public/css/frontend.css"> -->
   <script src="public/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
   <section class="header">
      <div class="container">
         <div class="row">
            <div class="col-md-12 mt-1 s1 md-2">
               <marquee direction="left" height="20" onmouseout="this.start()" scrollamount="3" onmouseover="this.stop()">
                  <li style="list-style:none;display:inline-block;">
                     <a title="Cửa hàng Thời trang YaMe xin kính chào quý khách,Năm hết tết đến kính chúc mọi người thật nhiều sức khoẻ, miệng cười vui vẻ, ... Kính chúc mọi người một năm mới tràn đầy niềm vui và hạnh phúc:" rel="dofollow" target="_self">
                        <p> Cửa hàng Thời trang YaMe kính chào quý khách, chúc quý khách có món đồ như ý... </p>
                     </a>
                  </li>
                  <li style="list-style:none;display:inline-block"> </li>
               </marquee>
            </div>
         </div>
      </div>
   </section>
   <section class="hdl-header">
      <div class="container">
         <div class="row">
            <div class="col-6 col-sm-6 col-md-2 py-1">

               <a href="index.php">
                  <img src="public/images/logo1.png" class="img-fluid" alt="Logo" style="margin-top: 5px;">
               </a>
            </div>
            <div class="col-12 col-sm-9 d-none d-md-block col-md-5 py-3">
               <form method="post">
                  <div class="input-group mb-3">
                     <input id="searchInput" type="text" class="form-control" name="keyword" style="border-color: #FF9900;" placeholder="Nhập nội dung tìm kiếm" aria-label="Tìm kiếm sản phẩm" aria-describedby="basic-addon2">
                     <button class=" timkiem input-group-text bg-main " type="submit" id="basic-addon2" style="background-color:#FF9900; border-color: #FF9900; ">
                        <i class="fa fa-search" aria-hidden="true"></i>
                     </button>
                  </div>
               </form>
            </div>
            <div class="col-12 col-sm-12 d-none d-md-block col-md-4 text-center py-2" style="margin-top: -10px;">
               <div class="call-login--register border-bottom">
                  <ul class="nav nav-fills py-0 my-0" style="margin-left: 40px;">
                     <li class="nav-item">
                        <a class="nav-link" href="#">
                           <i class="fa fa-phone-square" aria-hidden="true"></i>
                           0342264038
                        </a>
                     </li>
                     <?php if (isset($_SESSION['logincustomer'])) : ?>
                        <a href="index.php?opt=customer&f=logout" class="btn position-relative"><i class="fa-sharp fa-solid fa-user"></i>
                           Đăng xuất
                        </a>
                     <?php else : ?>
                        <a href="index.php?opt=customer&f=login" class="btn position-relative">
                           <i class="fa-sharp fa-solid fa-user"></i>
                           Đăng nhập
                        </a>
                     <?php endif; ?>
                     <a class="btn position-relative" href="index.php?opt=register">
                        <i class="fa-sharp fa-solid fa-user" aria-hidden="true"></i>
                        Đăng ký
                     </a>

                  </ul>
               </div>
               <div class="fs-6 py-2">
                  ĐỔI TRẢ HÀNG HOẶC HOÀN TIỀN <span class="text-main" style="color: #FF9900;">TRONG 3 NGÀY</span>
               </div>
            </div>
            
            <div class="col-6 col-sm-6 col-md-1 text-end py-4 py-md-2" id="cart-icon-container">
               <a href="index.php?opt=cart">
                  <div class="box-cart float-end">
                     <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                     <span id="cart-count"><?php echo $cart_count; ?></span>
                  </div>
               </a>
            </div>
            
         </div>
      </div>
   </section>
   <?php require_once "views/sites/mod_mainmenu.php"; ?>
   <style>
      :root {
         --text-main: #339999;
         --bg-main: #339999;
      }

      .bg-main {
         background-color: #669966;
         color: white;
      }

      .text-main {
         color: var(--text-main);
      }

      .btn-main {
         background-color: var(--bg-main);
         color: white;
      }

      .btn-main:hover {
         border: 1px solid #339999;
         color: #339999;
      }

      /*hdl-header*/
      .box-cart {
         width: 60px;
         height: 60px;
         line-height: 60px;
         text-align: center;
         border: 1px solid #FF9900;
         position: relative;
      }

      .box-cart i {
         font-size: 26px;
         color: #FF9900;
      }

      .box-cart span {
         position: absolute;
         right: -13px;
         top: 0px;
         width: 25px;
         height: 25px;
         border-radius: 50%;
         background-color: red;
         line-height: 25px;
         font-size: 14px;
         color: white;
      }

      .call-login--register ul {
         list-style: none;
         padding: 0px;
         margin: 0px;
      }

      .call-login--register ul li {
         display: inline-block;
      }

      .call-login--register ul li a {
         text-decoration: none;
         color: black;
         padding: 10px;
         font-size: 90%;
      }

      /*hdl-mainmenu*/
      .list-category strong {
         line-height: 50px;
         display: block;
         color: white;
      }

      /*hdl-maincontent*/
      .product-item .product-item-image {
         overflow: hidden;
         position: relative;
      }

      .product-item .product-item-image img {

         transition: 0.5s;
      }

      .product-item .product-item-image #img2 {
         position: absolute;
         left: -100%;
      }

      .product-item .product-item-image:hover #img2 {
         transform: translateX(100%);
      }

      .product-item .product-item-image:hover #img1 {
         opacity: 0;
      }

      .product-item .product-item-name a {
         color: #339999;
         text-decoration: none;
      }

      .product-item .product-item-name a:hover {
         text-decoration: underline;
      }

      .hdl-lastpost h3.post-title a {
         color: white;
         transition: 0.5s;
         text-decoration: none;
      }

      .hdl-lastpost h3.post-title a:hover {
         color: rgb(177, 169, 169);
      }

      ul.list-category li a,
      ul.list-brand li a,
      ul.list-page li a {
         color: #339999;
         text-decoration: none;
         transition: 0.5s;
      }

      ul.list-category li a:hover,
      ul.list-brand li a:hover,
      ul.list-page li a:hover {
         text-shadow: 0px 0px 2px red;
      }

      /*hdl-footer*/
      .hdl-footer {
         background-color: rgba(0, 0, 0, 0.9);
         color: white;
      }

      .hdl-footer p,
      .hdl-footer a {
         color: white;
      }

      .hdl-footer ul.footer-menu {
         padding: 0px;
         margin: 0px;
         list-style: none;
      }

      .hdl-footer ul.footer-menu a {
         display: block;
         padding: 4px 0px;
         text-decoration: none;
         transition: 0.5s;
      }

      .hdl-footer ul.footer-menu a:hover {
         color: wheat;
      }

      .hdl-footer h3.widgettilte {
         font-size: 20px;
         font-weight: 400;
         position: relative;
      }

      .hdl-footer h3.widgettilte::after {
         content: "";
         border: 2px solid #5d5c5c;
         position: absolute;
         bottom: -10px;
         left: 0;
         width: 30%;
      }

      /* .hdl-footer h3.widgettilte strong
{
    border-bottom: 2px solid white;
} */
      .social .facebook-icon,
      .social .instagram-icon,
      .social .google-icon,
      .social .youtube-icon {
         width: 40px;
         height: 40px;
         background-color: red;
         color: white;
         line-height: 40px;
         text-align: center;
         border-radius: 50%;
         display: inline-block;
      }

      /*hdl-copyright*/
   </style>