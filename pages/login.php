<?php
session_start();
include "../service/database.php"; 

// Cek jika user sudah login, lempar ke dashboard
if (isset($_SESSION['is_login'])) { 
    header("location: dashboard.php"); 
    exit();
}

$login_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // PERBAIKAN 1: Ambil 'username' (sesuai name di form), bukan 'user'
  $username = $_POST['username'];
  
  // PERBAIKAN 2: Hapus md5() dulu jika data lama bos tidak di-hash
  $password = $_POST['password']; 

  // PERBAIKAN 3: Gunakan $db (sesuai file database.php), bukan $stmt = $conn...
  $stmt = $db->prepare("SELECT * FROM users WHERE username=? AND password=?");

  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $hasil = $stmt->get_result();
  
  // Ambil data
  if ($hasil->num_rows > 0) {
    $row = $hasil->fetch_assoc();
    
    $_SESSION['username'] = $row['username'];
    $_SESSION['is_login'] = true; // Tambahkan ini sebagai penanda login

    // PERBAIKAN 4: Redirect ke dashboard.php (karena admin.php tidak ada di file bos)
    header("location: dashboard.php");
    exit();
  } else {
    $login_message = "Username atau Password salah!";
  }

  $stmt->close();
  // $db->close(); // Jangan di close kalau mau include footer di bawah
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
   <link rel="stylesheet" href="../styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"/>
    <link rel="icon" href="../img/logo.webp" />
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

                    <form action="" method="POST" id="loginForm">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username">
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password">
                        </div>

                        <div class="text-center mb-2">
                            <small id="errorMsg" class="text-danger fw-bold"></small>
                        </div>

                        <div class="d-grid gap-2 mt-2">
                            <button type="submit" class="btn btn-primary" style="background-color: #1e3a5f; border: none;">
                                Login Sekarang
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="card-footer text-center bg-transparent border-0 mt-2">
                    <small>Belum punya akun? <a href="register.php" class="fw-bold">Daftar disini</a></small>
                </div>
            </div>
        </div>
    </div>

    <?php include "../layout/footer.html" ?>
    
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <button id="darkModeToggle" class="btn btn-outline-secondary rounded-circle p-3 shadow">🌙</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        const toggleBtn = document.getElementById('darkModeToggle');
        const elementsToToggle = [document.body, document.querySelector('.navbar'), document.querySelector('.card'), document.querySelector('footer'), document.querySelector('section')];

        toggleBtn.addEventListener('click', () => {
            elementsToToggle.forEach(el => { if(el) el.classList.toggle('dark-mode'); });
            toggleBtn.innerText = document.body.classList.contains('dark-mode') ? '☀️' : '🌙';
        });

        document.getElementById("loginForm").addEventListener("submit", function(event) {
          const user = document.getElementById("username").value.trim();
          const pass = document.getElementById("password").value.trim();
          const errorMsg = document.getElementById("errorMsg");
          errorMsg.textContent = "";

          if (user === "") { errorMsg.textContent = "Username wajib diisi!"; event.preventDefault(); return; }
          if (pass === "") { errorMsg.textContent = "Password wajib diisi!"; event.preventDefault(); return; }
        });
    </script>
</body>
</html>