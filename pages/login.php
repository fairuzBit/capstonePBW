<?php
    include "./service/database.php";
    session_start();

    $login_message = "";

    // Cek status login
    if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true){
         header("location:../index.php");
         exit();
    }

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Query database
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $db->query($sql);

        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            $_SESSION['username'] = $data["username"];
            $_SESSION['is_login'] = true;

            header("location:pages/dashboard.php");
        } else {
            $login_message = "Akun tidak ditemukan atau password salah";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    
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
                    <h3 class="text-center mb-4 fw-bold" style="color: #1e3a5f;">Masuk Akun</h3>
                    
                    <?php if($login_message): ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?= $login_message ?>
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
                            <button type="submit" name="login" class="btn btn-primary" style="background-color: #1e3a5f; border: none;">
                                Login Sekarang
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="card-footer text-center bg-transparent border-0 mt-2">
                    <small>Belum punya akun? <a href="/pages/register.php" class="fw-bold">Daftar disini</a></small>
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