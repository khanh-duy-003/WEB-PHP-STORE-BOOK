<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deliveryname = isset($_POST['deliveryname']) ? $_POST['deliveryname'] : '';
    $deliveryphone = isset($_POST['deliveryphone']) ? $_POST['deliveryphone'] : '';
    $deliveryaddress = isset($_POST['deliveryaddress']) ? $_POST['deliveryaddress'] : '';
    $deliveryemail = isset($_POST['deliveryemail']) ? $_POST['deliveryemail'] : '';
    $created_at = date('Y-m-d H:i:s');
    $conn = new mysqli('localhost', 'root', '', 'nguyenthanhan_2121110226');

    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        $user_id = 1;

        $stmt = $conn->prepare("INSERT INTO 2121110226_order (user_id, deliveryname, deliveryphone, deliveryaddress, deliveryemail, created_at, status) VALUES (?, ?, ?, ?, ?, ?, 1)");
        $stmt->bind_param("isssss", $user_id, $deliveryname, $deliveryphone, $deliveryaddress, $deliveryemail, $created_at);

        if ($stmt->execute()) {
            echo '<script>';
            echo 'alert("Đơn hàng đã được đặt thành công!");';
            echo 'window.location.href = "index.php";';  // Redirect after showing the alert
            echo '</script>';
            unset($_SESSION['contentcart']);
            exit();
        } else {
            echo "Lỗi (" . $stmt->errno . "): " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}


?>
