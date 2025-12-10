<!DOCTYPE html>
<html lang="en" data-bs-theme="">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fairuz-homepage</title>

    <!-- Styles -->
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
    <link rel="icon" href="../img/logo.webp" />
  </head>

  <body>
    <!-- HERO -->
    <section id="hero" class="text-center p-5 text-sm-start">
      <div class="container">
        <div class="d-sm-flex flex-sm-row-reverse align-items-center">
          <img
            src="../img/banner.jpg"
            class="img-fluid"
            width="300"
            style="margin-left: 50px"
          />
          <div>
            <h1 class="fw-bold display-4">Kenangan Jogja</h1>
            <h4 class="lead display-6">
              Melukis semua cerita menjadi kenangan abadi
            </h4>
            <h6>
              <span id="tanggal">Tanggal</span>
              <span id="jam">Jam</span>
            </h6>
          </div>
        </div>
      </div>
    </section>

    <!-- ARTICLE -->
    <!-- article begin -->
<section id="article" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">article</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>
<!-- article end -->

    <!-- GALLERY -->
    <section id="gallery" class="text-center p-5">
      <div class="container">
        <h1 class="fw-bold display-4 pb-3">Gallery</h1>
        <div id="carouselExample" class="carousel slide">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../img/aku.jpeg" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
              <img src="../img/bankIndo.jpeg" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
              <img src="../img/rumput.jpeg" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
              <img src="../img/silat.jpeg" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
              <img src="../img/budaya.jpeg" class="d-block w-100" alt="..." />
            </div>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExample"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExample"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </section>

    <!-- Scripts -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    <script type="text/javascript">
      window.setTimeout("TampilWaktu()", 1000);
      function TampilWaktu() {
        var waktu = new Date();
        var bulan = waktu.getMonth() + 1;
        setTimeout("TampilWaktu()", 1000);
        document.getElementById("tanggal").innerHTML =
          waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
        document.getElementById("jam").innerHTML =
          waktu.getHours() +
          ":" +
          waktu.getMinutes() +
          ":" +
          waktu.getSeconds();
      }
    </script>
    <script type="text/javascript" src="../javascript.js" defer></script>
  </body>
</html>
