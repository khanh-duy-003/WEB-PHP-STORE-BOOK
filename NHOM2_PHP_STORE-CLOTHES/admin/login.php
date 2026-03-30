<?php

use App\Libraries\MyClass;
use App\Models\Brand;
session_start();

// var_dump($list);
use node_modules\bootstrap\dist\js\bootstrap;
?>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Theme style -->
<link rel="stylesheet" href="../public/dist/css/adminlte.min.css">


<link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../public/fontawesome/css/all.min.css">

<link rel="stylesheet" href="../public/css/backend.css">
<script src="../public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../public/dist/js/demo.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<!-- Default box -->
<div class="container">
    <div class="row justify-content-center">
        <?php
    require_once ('../vendor/autoload.php');
    require_once ('../config/database.php');
    use App\Models\User;
    $error = '';
    if(isset($_POST['DANGNHAP'])){
      $username=$_POST['username'];
      $password = $_POST['password'];

      $password=sha1($_POST['password']);
      $args=[
          ['status','=',1],
          ['roles','=',1],
          ['password','=',$password],
      ];
      if(!filter_var($username,FILTER_VALIDATE_EMAIL)){
        array_push($args,['username','=',$username]);
      }else{
        array_push($args,['email','=',$username]);
      }
      $user=User::where($args)->first();
      if($user!=null){

        $_SESSION['useradmin']=$user->username;
        $_SESSION['fullname']=$user->name;
        $_SESSION['userid']=$user->id;
        header('location:index.php?opt=category');

      }else{
        $error="<div class='text-danger'>Tài khoản không chính xác</div>";
      }
    }
    ?>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title d-flex justify-content-center">Đăng nhập</h1>
                    <?=$error?>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="text">Tên đăng nhập:</label><i class="fas fa-user"></i>
                            <input type="text" class="form-control" id="text" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu:</label><i class="fas fa-lock"></i>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button name="DANGNHAP" type="submit" class="btn btn-primary">Đăng nhập</button>
                        </div>
                        <div class="form-group">
                            <a href="#">Quên mật khẩu?</a>
                        </div>
                        <div class="form-group">
                            <hr>
                            <p class="text-center">Hoặc đăng nhập bằng:</p>
                            <div class="text-center">
                                <a href="#" class="btn btn-primary">Facebook</a>
                                <a href="#" class="btn btn-danger">Google</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>