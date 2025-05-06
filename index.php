<?php
// BẮT BUỘC HTTPS: Nếu không phải HTTPS, chuyển hướng
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $redirect = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header("Location: $redirect");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chính</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
          crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Nếu có CSS -->
</head>
<body>

    <?php include("views/template/header.php"); ?>

    <main>
        <!-- Nội dung chính của trang -->
        <h1>Chào mừng bạn đến với Nhóm 8</h1>

    <?php include("views/template/footer.php"); ?>

</body>
</html>
