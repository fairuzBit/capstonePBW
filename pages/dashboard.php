<?php
    session_start();
    include "service/database.php"; // PENTING: Panggil koneksi database

    // Cek login
    if (!isset($_SESSION['is_login'])) {
        header("location: /pages/login.php");
        exit();
    }

    // Logout logic
    if(isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header("location: index.php");
        exit();
    }

    // --- STEP READ DATA ---
    // 1. Buat query untuk mengambil semua data user
    $sql = "SELECT * FROM users";
    
    // 2. Eksekusi query
    $result = $db->query($sql);
    // ----------------------
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <?php include "layout/header.html" ?>

    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Dashboard Admin</h3>
            </div>
            <div class="card-body">
                <h4 class="mb-4">Selamat Datang, <b><?= $_SESSION['username'] ?></b>!</h4>
                
                <div class="table-responsive">
                    <p class="fw-bold">Daftar Akun Terdaftar:</p>
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Password (Encrypted)</th>
                                <th>Action</th> </tr>
                        </thead>
                        <tbody>
                            <?php
                            // 3. Tampilkan data dengan perulangan
                            if ($result->num_rows > 0) {
                                $no = 1;
                                // Ambil setiap baris data sebagai array asosiatif
                                while($row = $result->fetch_assoc()) { 
                            ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['username'] ?></td>
                                        <td><?= $row['password'] ?></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                            <?php 
                                } 
                            } else { 
                                echo "<tr><td colspan='4' class='text-center'>Belum ada data user.</td></tr>";
                            } 
                            ?>
                        </tbody>
                    </table>
                </div>
                <form action="dashboard.php" method="POST" class="mt-4">
                    <button type="submit" name="logout" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <?php include "layout/footer.html" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>