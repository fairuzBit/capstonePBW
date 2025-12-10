<section id="hero" class="text-center p-5 text-sm-start">
  <div class="container">
    <div class="d-sm-flex flex-sm-row-reverse align-items-center">
      <img src="../img/banner.jpg" class="img-fluid" width="300" style="margin-left: 50px" />
      <div>
        <h1 class="fw-bold display-4">Kenangan Jogja</h1>
        <h4 class="lead display-6">Melukis semua cerita menjadi kenangan abadi</h4>
        <h6>
          <span id="tanggal">Tanggal</span>
          <span id="jam">Jam</span>
        </h6>
      </div>
    </div>
  </div>
</section>

<section id="article" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">Article</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <div class="col">
        <div class="card h-100">
          <img src="../img/aku.jpeg" class="card-img-top" alt="Potret Aku" />
          <div class="card-body">
            <h5 class="card-title">Tentang Aku</h5>
            <p class="card-text">Potret diriku ketika SMA dengan semua kesibukan ku.</p>
          </div>
          <div class="card-footer"><small class="text-body-secondary">Last updated 3 mins ago</small></div>
        </div>
      </div>
      
      <div class="col">
        <div class="card h-100">
          <img src="../img/bankIndo.jpeg" class="card-img-top" alt="Gedung BI" />
          <div class="card-body">
            <h5 class="card-title">Bank Indonesia</h5>
            <p class="card-text">Gedung Bank Indonesia yang terletak di Jogja.</p>
          </div>
          <div class="card-footer"><small class="text-body-secondary">Last updated 3 mins ago</small></div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100">
          <img src="../img/budaya.jpeg" class="card-img-top" alt="Leyak" />
          <div class="card-body">
            <h5 class="card-title">Leyak</h5>
            <p class="card-text">Penampilan ragam budaya Indonesia untuk memperingati hari Kemerdekaan.</p>
          </div>
          <div class="card-footer"><small class="text-body-secondary">Last updated 3 mins ago</small></div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100">
          <img src="../img/kotaLama.jpeg" class="card-img-top" alt="Barang Antik" />
          <div class="card-body">
            <h5 class="card-title">Barang Antik</h5>
            <p class="card-text">Patung bunda maria yang menjadi salah satu barang antik di kota lama.</p>
          </div>
          <div class="card-footer"><small class="text-body-secondary">Last updated 3 mins ago</small></div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100">
          <img src="../img/rumput.jpeg" class="card-img-top" alt="Rumput" />
          <div class="card-body">
            <h5 class="card-title">Rumput</h5>
            <p class="card-text">Gambar close up rumput dengan typography bertuliskan "suket" (aksara jawa).</p>
          </div>
          <div class="card-footer"><small class="text-body-secondary">Last updated 3 mins ago</small></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="gallery" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">Gallery</h1>
    <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner">
        <div class="carousel-item active"><img src="../img/aku.jpeg" class="d-block w-100" alt="..." /></div>
        <div class="carousel-item"><img src="../img/bankIndo.jpeg" class="d-block w-100" alt="..." /></div>
        <div class="carousel-item"><img src="../img/rumput.jpeg" class="d-block w-100" alt="..." /></div>
        <div class="carousel-item"><img src="../img/silat.jpeg" class="d-block w-100" alt="..." /></div>
        <div class="carousel-item"><img src="../img/budaya.jpeg" class="d-block w-100" alt="..." /></div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>

<script type="text/javascript">
  window.setTimeout("TampilWaktu()", 1000);
  function TampilWaktu() {
    var waktu = new Date();
    var bulan = waktu.getMonth() + 1;
    setTimeout("TampilWaktu()", 1000);
    document.getElementById("tanggal").innerHTML = waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
    document.getElementById("jam").innerHTML = waktu.getHours() + ":" + waktu.getMinutes() + ":" + waktu.getSeconds();
  }
</script>