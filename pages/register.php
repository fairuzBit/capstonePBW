<?php 
    // include "../service/database.php";
    // session_start();

    // $register_message="";
    // if($_SESSION['is_login']){
    //      header("location:../pages/dashboard.php");

    // }
    
    // if(isset($_POST["register"])){
    //     $username=$_POST["username"];
    //     $password=$_POST["password"];
    
    
    //     $sql = "INSERT INTO users (username, password) VALUES
    //     ('$username','$password')";

    //     if($db->query($sql)){
    //         $register_message="silahkan login";

    //     } else {
    //         $register_message="gagal mendaftar coba lagi";
    //     }
    // }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    
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

    <?php include "../layout/header.html" ?>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-5">
            
            <div class="card shadow-lg p-4">
                <div class="card-body">
                    <h3 class="text-center mb-4 fw-bold" style="color: #1e3a5f;">Buat Akun</h3>
                    
                    <?php if($register_message): ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?= $register_message ?>
                        </div>
                    <?php endif; ?>

                    <form action="/pages/login.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Masukkan username" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukkan password" required>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" name="register" class="btn btn-primary" style="background-color: #1e3a5f; border: none;">
                                Daftar Sekarang
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="card-footer text-center bg-transparent border-0 mt-2">
                    <small>Sudah punya akun? <a href="login.php" class="fw-bold">login disini</a></small>
                </div>
            </div>

        </div>
    </div>

    <?php include "../layout/footer.html" ?>
    

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <button id="darkModeToggle" class="btn btn-outline-secondary rounded-circle p-3 shadow">
            🌙
        </button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Script Sederhana untuk Mengaktifkan CSS Dark Mode Bos
        const toggleBtn = document.getElementById('darkModeToggle');
        const elementsToToggle = [
            document.body, 
            document.querySelector('.navbar'), 
            document.querySelector('.card'), 
            document.querySelector('footer'),
            document.querySelector('section') // Jika ada section
        ];

        toggleBtn.addEventListener('click', () => {
            elementsToToggle.forEach(el => {
                if(el) el.classList.toggle('dark-mode');
            });

            // Ganti Icon
            if (document.body.classList.contains('dark-mode')) {
                toggleBtn.innerText = '☀️';
            } else {
                toggleBtn.innerText = '🌙';
            }
        });
    </script>
</body>
</html>