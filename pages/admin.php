<?php
session_start();

include "../service/database.php";  

// Cek jika belum login
if (!isset($_SESSION['username'])) { 
	header("location:login.php"); 
    exit();
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    
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
    <style>  
        html { position: relative; min-height: 100%; }
        body { margin-bottom: 100px; }
        footer { position: absolute; bottom: 0; width: 100%; height: 100px; }
    </style>
</head>
<body>
    
    <?php include "../layout/header.html" ?>

    <section id="content" class="p-5">
        <div class="container">
            <?php
            if(isset($_GET['page'])){
                // Ambil nilai page (misal: 'article', 'home')
                $page_name = ucfirst($_GET['page']);
                
                // Include file halaman
                if(file_exists($_GET['page'].".php")){
                    include($_GET['page'].".php");
                } else {
                    echo "<h3 class='text-danger'>Halaman tidak ditemukan!</h3>";
                }
            } else {
                $page_name = "Dashboard"; // Default title
                include("dashboard.php");
            }
            ?>
        </div>
    </section>
    <?php include "../layout/footer.html" ?>
    <script>
        // Ambil elemen judul di navbar (id="judul")
        const judulElement = document.getElementById("judul");
        
        // Ambil nama halaman dari PHP tadi
        const pageName = "<?= $page_name ?>";

        // Ubah teks "My Daily Journal" menjadi nama halaman (misal: Article)
        // Jika bos ingin formatnya "My Daily Journal - Article", ubah jadi:
        // judulElement.innerText = "My Daily Journal - " + pageName;
        if(pageName) {
            judulElement.innerText = pageName + " Page";
        }
    </script>

</body>
</html>