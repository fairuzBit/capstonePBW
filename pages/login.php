<?php
// 1. Memulai Session
session_start();

// 2. Panggil Koneksi Database
include "../service/database.php"; 

// 3. Cek apakah user sudah login? Jika ya, lempar ke dashboard
if (isset($_SESSION['is_login']) && $_SESSION['is_login'] == true) { 
    header("location: dashboard.php"); 
    exit();
}

$login_message = ""; // Inisialisasi variabel pesan

// 4. Logika saat tombol Login ditekan
// Kita cek apakah ada request POST masuk
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // PERBAIKAN A: Ambil nama yang benar dari form HTML ('username' bukan 'user')
    $username = $_POST['username'];
    $password = $_POST['password']; 
    // Catatan: Saya hapus md5() agar cocok dengan data register sebelumnya yang plain text. 
    // Jika database Anda pakai md5, ubah jadi: $password = md5($_POST['password']);

    // PERBAIKAN B: Gunakan variabel $db (dari database.php), BUKAN $conn
    // PERBAIKAN C: Gunakan tabel 'users' (jamak), biasanya sebelumnya Anda pakai 'users'
    $stmt = $db->prepare("SELECT * FROM users WHERE username=? AND password=?");
    
    // Binding parameter
    $stmt->bind_param("ss", $username, $password);
    
    // Eksekusi
    $stmt->execute();
    $hasil = $stmt->get_result();
    
    // Cek hasil
    if ($hasil->num_rows > 0) {
        $data = $hasil->fetch_assoc();
        
        // Simpan sesi
        $_SESSION['username'] = $data['username'];
        $_SESSION['is_login'] = true; // Penanda login sukses

        // PERBAIKAN D: Redirect ke dashboard.php (karena admin.php tidak ada)
        header("location: dashboard.php");
        exit();
    } else {
        $login_message = "Username atau password salah!";
    }

    $stmt->close();
    // Jangan close $db di sini jika ingin include footer yang mungkin butuh db, tapi aman ditaruh di akhir.
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
        <button id="darkModeToggle" class="btn btn-outline-secondary rounded-circle p-3 shadow">
            🌙
        </button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        const toggleBtn = document.getElementById('darkModeToggle');
        const elementsToToggle = [
            document.body, 
            document.querySelector('.navbar'), 
            document.querySelector('.card'), 
            document.querySelector('footer'),
            document.querySelector('section')
        ];

        toggleBtn.addEventListener('click', () => {
            elementsToToggle.forEach(el => {
                if(el) el.classList.toggle('dark-mode');
            });

            if (document.body.classList.contains('dark-mode')) {
                toggleBtn.innerText = '☀️';
            } else {
                toggleBtn.innerText = '🌙';
            }
        });
    </script>
    
    <script>
      document.getElementById("loginForm").addEventListener("submit", function(event) {
          const user = document.getElementById("username").value.trim();
          const pass = document.getElementById("password").value.trim();
          const errorMsg = document.getElementById("errorMsg");

          errorMsg.textContent = "";

          if (user === "") {
              errorMsg.textContent = "Username tidak boleh kosong!";
              event.preventDefault();
              return;
          }

          if (pass === "") {
              errorMsg.textContent = "Password tidak boleh kosong!";
              event.preventDefault();
              return;
          }
      });
    </script>
</body>
</html>