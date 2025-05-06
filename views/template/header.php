<?php
session_start();
$permiss = $_SESSION['permiss'] ?? null;
$user = $_SESSION['user']['usename'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trang chính</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
        crossorigin="anonymous">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">Trang chính</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarContent" aria-controls="navbarContent" 
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">

      <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if ($user): ?>
          <li class="nav-item"><a class="nav-link" href="lietke.php">Liệt kê</a></li>
          <li class="nav-item"><a class="nav-link" href="timkiem.php">Tìm kiếm</a></li>

          <?php if ($permiss == 1 || $permiss == 2): ?>
            <li class="nav-item"><a class="nav-link" href="them.php">Thêm</a></li>
            <li class="nav-item"><a class="nav-link" href="taikhoan.php">Tài khoản</a></li>
          <?php endif; ?>
        <?php endif; ?>
      </ul> -->

      <ul class="navbar-nav ms-auto">
        <?php if ($user): ?>
          <li class="nav-item">
            <span class="navbar-text text-light me-2">
              Xin chào, <strong><?= htmlspecialchars($user) ?></strong>
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-light btn-sm" href="controllers/xllogout.php">Đăng xuất</a>
          </li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="views/login.php">Đăng nhập</a></li>
          <li class="nav-item"><a class="nav-link" href="views/resign.php">Đăng ký</a></li>
        <?php endif; ?>
      </ul>

    </div>
  </div>
</nav>

<!-- Nội dung chính -->

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ltrjvnR4+oVnYc4YI4kU67U67Jow62A0n5kIfnJYTDQZx2Q+6M42HgZs9Dnh8Jgm" 
        crossorigin="anonymous"></script>

</body>
</html>
