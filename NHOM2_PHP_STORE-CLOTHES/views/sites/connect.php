<?php


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["REGISTER"])) {
    $servername = "127.0.0.1:3307";
    $username = "root";
    $password = "";
    $database = "fashion_shop";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = isset($_POST['gender']) && $_POST['gender'] === 'on' ? 1 : 0;
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $image = isset($_POST['image']) ? $_POST['image'] : 'default.jpg';
    
    $createdBy = 1;

    $status = 1;

    $stmt = $conn->prepare("INSERT INTO `user` (name, username, email, password, phone, address, gender, image, created_by, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssisii", $name, $username, $email, $hashed_password, $phone, $address, $gender, $image, $createdBy, $status);

    if ($stmt->execute()) {
        echo "Đăng ký thành công";
        header("Location: index.php?opt=customer&f=login");
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
