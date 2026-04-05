<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$title = $_POST['title'];
$content = $_POST['content'];

$conn = new mysqli('127.0.0.1:3307', 'root', '', 'nguyenthanhan_2121110226');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO 2121110226_contact(name, email, phone, title, content, replay_id, updated_by, status) VALUES (?, ?, ?, ?, ?, ?, ?, 1)"); // Sử dụng giá trị mặc định là 1 cho trường `status`
    $stmt->bind_param("ssisssi", $name, $email, $phone, $title, $content, $replay_id, $updated_by);

    // Thực hiện các bước khác và kiểm tra lỗi
    if ($stmt->execute()) {
        echo "Liên hệ thành công";
        header("Location: index.php");
    } else {
        echo "Lỗi (" . $stmt->errno . "): " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
