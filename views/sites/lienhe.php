<?php
use App\Models\Contact;

// Lấy dữ liệu từ form
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$title = $_POST['title'] ?? '';
$content = $_POST['content'] ?? '';

if (empty($name) || empty($email)) {
    // Nếu dữ liệu trống, có thể quay lại trang liên hệ hoặc báo lỗi
    header("Location: index.php?opt=contact");
    exit();
}

// Sử dụng Eloquent Model để lưu dữ liệu
$contact = new Contact();
$contact->name = $name;
$contact->email = $email;
$contact->phone = $phone;
$contact->title = $title;
$contact->content = $content;
$contact->replay_id = 0;
$contact->updated_by = 1; // Mặc định admin xử lý
$contact->status = 1; // Trạng thái mới liên hệ
$contact->created_at = date('Y-m-d H:i:s');

if ($contact->save()) {
    // Lưu thành công
    // Bạn có thể dùng thông báo session hoặc alert đơn giản
    echo "<script>alert('Gửi liên hệ thành công! Chúng tôi sẽ phản hồi sớm nhất.'); window.location.href='index.php';</script>";
} else {
    // Lưu thất bại
    echo "<script>alert('Có lỗi xảy ra, vui lòng thử lại sau.'); window.history.back();</script>";
}
?>
