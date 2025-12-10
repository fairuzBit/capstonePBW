<?php
    include "/service/database.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="../styles.css" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />

    <!-- Bootstrap Icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    />

    <!-- Favicon -->
    <link rel="icon" href="img/logo.webp" />
</head>
<body>
    <?php include "layout/header.html" ?>
    
    <div class="container text-center mt-5">
        <h1>Masuk untuk melihat web</h1>
        <a href="/pages/login.php" class="btn btn-primary mt-3">Login</a>
    </div>

    <?php include "layout/footer.html" ?>
</body>
</html>