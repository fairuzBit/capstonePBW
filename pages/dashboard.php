<?php
session_start();
include "../service/database.php"; // PENTING: Panggil koneksi database

// Cek apakah user sudah login
if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] == false) {
    header("location: login.php");
    exit();
}

// QUERY 1: ARTICLE
$sql1 = "SELECT * FROM article ORDER BY tanggal DESC";
$hasil1 = $db->query($sql1); // Ganti $conn jadi $db

// Cek jika query error (untuk debug)
if (!$hasil1) {
    die("Query Error: " . $db->error); 
}

$jumlah_article = $hasil1->num_rows;

// QUERY 2: GALLERY (Saya uncomment dan perbaiki sekalian)
//$sql2 = "SELECT * FROM gallery ORDER BY tanggal DESC";
//$hasil2 = $db->query($sql2); // Ganti $conn jadi $db
//$jumlah_gallery = ($hasil2) ? $hasil2->num_rows : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    
    <link rel="stylesheet" href="../styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    <link rel="icon" href="../img/logo.webp" />
</head>
<body>


    <div class="container mt-5" style="min-height: 60vh;">
        <h2 class="text-center mb-4">Dashboard Admin</h2>
        <h5 class="text-center text-muted mb-5">Selamat Datang, <b><?= $_SESSION['username'] ?></b></h5>

        <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
            
            <div class="col">
                <div class="card border border-danger mb-3 shadow" style="max-width: 18rem;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="p-3">
                                <h5 class="card-title"><i class="bi bi-newspaper fs-2"></i><br>Article</h5> 
                            </div>
                            <div class="p-3">
                                <span class="badge rounded-pill text-bg-danger fs-2"><?php echo $jumlah_article; ?></span>
                            </div> 
                        </div>
                    </div>
                </div>
            </div> 

            <div class="col">
                <div class="card border border-danger mb-3 shadow" style="max-width: 18rem;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="p-3">
                                <h5 class="card-title"><i class="bi bi-camera fs-2"></i><br>Gallery</h5> 
                            </div>
                            <div class="p-3">
                                <span class="badge rounded-pill text-bg-danger fs-2">0</span> </div> 
                        </div>
                    </div>
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
</body>
</html>