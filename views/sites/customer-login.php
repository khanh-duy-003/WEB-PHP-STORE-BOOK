<?php
use App\Models\User;
if (isset($_POST['DANGNHAP']))
{
    $message_alert='';
    $username=$_POST['username'];
    $password=sha1($_POST['password']);
    $args=null;
    $user = null;
   
    if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $user = User::where('email', $username)
                    ->where('status', 1)
                    ->first();
    } else {
        $user = User::where('username', $username)
                    ->where('status', 1)
                    ->first();
    }

    if ($user && password_verify($_POST['password'], $user->password)) {
        $_SESSION['logincustomer'] = $username;
        $_SESSION['user_id'] = $user->id;

        header("Location: index.php");
        exit();
    } else {
        $message_alert = "Tài khoản hoặc mật khẩu không đúng";
    }
}


?>
<?php require_once('views/sites/header.php'); ?>
<section class="maincontent my-3">
    <form action="index.php?opt=customer&f=login" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                <?php require_once('views/sites/account.php')?>
                </div>
                <div class="col-md-6" style="margin-left: 350px;">
                    <h3 style="text-align: center;">ĐĂNG NHẬP KHÁCH HÀNG</h3>
                    <?php if(!isset($_SESSION['logincustomer'])):?>
                    <div class="mb-3">
                        <label for="username">Tên Đăng Nhập</label>
                        <input type="text" required name="username" id="username" 
                        placeholder="Tên đăng nhập hoặc email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password">Mật Khẩu</label>
                        <input type="password" required name="password" id="password" 
                        placeholder="nhập mật khẩu" class="form-control">
                    </div>
                    <div class="mb-3" style="margin-left: 530px;">
                        <input type="submit" name="DANGNHAP" class="btn btn-success" value="Đăng Nhập">
                    </div>
                    <?php else:?>
                        <div class="mb-3">
                        <div class="alert alert-info">
                            Bạn đã đăng nhập
                        </div>
                    </div>
                    <?php endif ;?>
                    <?php if (isset($message_alert)):?>
                    <div class="mb-3">
                        <div class="alert alert-info">
                            <?=$message_alert;?>
                        </div>
                    </div>
                    <?php endif;?>
                </div>
                
            </div>
        </div>
    </form>

</section>


<?php require_once('views/sites/footer.php'); ?>
