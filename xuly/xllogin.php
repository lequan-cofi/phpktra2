<?php
session_start();
require '../db/connect.php'; // Kết nối database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = mysqli_real_escape_string($conn, $_POST["user"]);
    $pass = mysqli_real_escape_string($conn, $_POST["pass"]);

    // Truy vấn kiểm tra tài khoản
    $sql = "SELECT * FROM account WHERE usename='$user'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Kiểm tra mật khẩu
        if ($pass == $row['pass']) {
            $_SESSION["user"] = $row["usename"];
            $_SESSION["permiss"] = $row["permiss"]; // Lưu quyền hạn từ CSDL
            
            header("Location: ../home.php");
            exit();
        } else {
            echo "Mật khẩu không đúng!";
        }
    } else {
        echo "Tài khoản không tồn tại!";
    }
}
?>
