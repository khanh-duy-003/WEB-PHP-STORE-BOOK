
<?php require_once "views/sites/header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Form</title>
</head>
<body>
    <form action="index.php?opt=connect" method="post">
        <div class="container">
            <h1 class="fs-2 text-main text-center">ĐĂNG KÝ TÀI KHOẢN</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="text-main">Họ tên(*)</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nhập họ tên" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="text-main">Điện thoại(*)</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập điện thoại" required>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 text-main">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" id="address" class="form-control text-danger" placeholder="Nhập địa chỉ">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="text-main">Giới tính</label>
                        <div class="form-check form-switch">
                            <input name="gender" class="form-check-input" type="checkbox" role="switch" id="genderChecked" checked onchange="changeGender()">
                            <label class="form-check-label text-main" id="labelgender" for="genderChecked">Nam</label>
                        </div>
                    </div>
                    <script>
                        function changeGender() {
                            const elementGender = document.querySelector("#genderChecked").checked;
                            if (elementGender == true) {
                                document.querySelector("#labelgender").innerHTML = "Nam";
                            }
                            else {
                                document.querySelector("#labelgender").innerHTML = "Nữ";
                            }
                        }
                    </script>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="username" class="text-main">Tên tài khoản(*)</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tài khoản đăng nhập" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="text-main">Email(*)</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="text-main">Mật khẩu(*)</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_re" class="text-main">Xác nhận Mật khẩu(*)</label>
                        <input type="password" name="password_re" id="password_re" class="form-control" placeholder="Xác nhận mật khẩu" required>
                    </div>
                    <div class="mb-3 text-end">
                        <button style="border-radius: 0px; width:120px" class="btn btn-sm btn-success" name="REGISTER">Đăng ký</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
<?php require_once "views/sites/footer.php"; ?>