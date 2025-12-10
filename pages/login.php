<?php
//memulai session atau melanjutkan session yang sudah ada
session_start();

//menyertakan code dari file koneksi
include "../service/database.php";
//check jika sudah ada user yang login arahkan ke halaman admin
if (isset($_SESSION['username'])) { 
	header("location:admin.php"); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['user'];
  
  //menggunakan fungsi enkripsi md5 supaya sama dengan password  yang tersimpan di database
  $password = md5($_POST['password']);

	//prepared statement
  $stmt = $conn->prepare("SELECT username 
                          FROM user 
                          WHERE username=? AND password=?");

	//parameter binding 
  $stmt->bind_param("ss", $username, $password);//username string dan password string
  
  //database executes the statement
  $stmt->execute();
  
  //menampung hasil eksekusi
  $hasil = $stmt->get_result();
  
  //mengambil baris dari hasil sebagai array asosiatif
  $row = $hasil->fetch_array(MYSQLI_ASSOC);

  //check apakah ada baris hasil data user yang cocok
  if (!empty($row)) {
    //jika ada, simpan variable username pada session
    $_SESSION['username'] = $row['username'];

    //mengalihkan ke halaman admin
    header("location:admin.php");
  } else {
	  //jika tidak ada (gagal), alihkan kembali ke halaman login
    header("location:login.php");
  }

	//menutup koneksi database
  $stmt->close();
  $conn->close();
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    
   <link rel="stylesheet" href="../styles.css" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    />

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
                            <button type="submit" name="" class="btn btn-primary" style="background-color: #1e3a5f; border: none;">
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

    <?php
}
?>
</body>
</html>