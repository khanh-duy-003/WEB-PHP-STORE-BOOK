<?php
use App\Models\Contact;

$title = 'Liên hệ';
$message = '';

if (isset($_POST['REGISTER'])) {
    $contact = new Contact();
    $contact->name = $_POST['name'] ?? null;
    $contact->email = $_POST['email'];
    $contact->phone = $_POST['phone'];
    $contact->title = $_POST['title'];
    $contact->content = $_POST['content'];
    $contact->status = 1;
    $contact->save();
    $message = 'Đã gửi liên hệ thành công';
}
?>

<?php require_once('views/sites/header.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>

<body>
    <form action="index.php?opt=lienhe" method="post">
        <section class="container">
            <div class="card-body">
                <table class="table table-bordered table-hover table-striped">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6" style="margin-top: 30px;">
                                <div class="form-group">
                                    <label for="name">Tên người liên hệ</label>
                                    <input type="text" class="form-control" id="name" name="name"  required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Nhập email liên hệ</label>
                                    <input type="email" class="form-control" id="email" name="email"  required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Nhập số điện thoại liên hệ</label>
                                    <input type="text" class="form-control" id="phone" name="phone"  required>
                                </div>
                                <div class="form-group">
                                    <label for="title">Nhập chủ đề liên hệ</label>
                                    <input type="text" class="form-control" id="title" name="title"  required>
                                </div>
                                <div class="form-group">
                                    <label for="content">Nhập chi tiết liên hệ</label>
                                    <textarea class="form-control" id="content" name="content"  required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15553.925930115105!2d108.2496147!3d12.9410129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1679771318750!5m2!1svi!2s" width="600" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="margin-top: -50px; margin-left:500px">
                                    <button name="REGISTER" type="submit" class="btn btn-success text-center"> GỬI LIÊN HỆ</button>
                                    <?php if (!empty($message)) : ?>
                                        <div class="alert alert-success"><?php echo $message; ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                </table>
            </div>
        </section>
    </form>

    <!-- Thêm các script JS cần thiết cho trang của bạn -->
    <script src="path/to/your/js/script.js"></script>
</body>

</html>
<?php require_once('views/sites/footer.php'); ?>
