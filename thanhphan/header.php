<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
session_start();
?>

<a href="home.php">Home</a> &nbsp;

<?php
// Kiểm tra nếu người dùng đã đăng nhập
if (isset($_SESSION["user"])) {
    // Kiểm tra xem biến 'permiss' có tồn tại không
    $permiss = isset($_SESSION["permiss"]) ? $_SESSION["permiss"] : null;

    // Nếu người dùng có quyền 1 hoặc 2, hiển thị các liên kết quản trị
    if ($permiss == 2 || $permiss == 1) {
        echo "<a href='them.php'> Thêm</a> 
              <a href='taikhoan.php'> Tài khoản</a> &nbsp;";
    }

    // Hiển thị tên người dùng và nút đăng xuất
    echo "<a href='lietke.php'>Liệt kê</a>
        <a href='timkiem.php'> Tìm kiếm</a> &nbsp;
          Xin chào: {$_SESSION['user']} 
          <a href='logout.php'> Đăng xuất</a>";
} else {
    // Nếu chưa đăng nhập, hiển thị nút đăng nhập và đăng ký
    echo "<a href='login.php'> Đăng nhập</a> 
          <a href='dangky.php'> Đăng ký</a> &nbsp;";
}
?>
</body>
</html>