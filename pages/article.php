


<div class="container">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th class="w-25">Judul</th>
                        <th class="w-75">Isi</th>
                        <th class="w-25">Gambar</th>
                        <th class="w-25">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM article ORDER BY tanggal DESC";
                    
                    // PERBAIKAN: Gunakan $db, bukan $conn
                    $hasil = $db->query($sql);

                    $no = 1;
                    // Cek apakah query berhasil dan ada datanya
                    if ($hasil && $hasil->num_rows > 0) {
                        while ($row = $hasil->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <strong><?= $row["judul"] ?></strong>
                                <br>pada : <?= $row["tanggal"] ?>
                                <br>oleh : <?= isset($row["username"]) ? $row["username"] : "-" ?>
                            </td>
                            <td><?= $row["isi"] ?></td>
                            <td>
                                <?php
                                if ($row["gambar"] != '') {
                                    // Pastikan path gambarnya benar
                                    if (file_exists('../img/' . $row["gambar"] . '')) {
                                ?>
                                        <img src="../img/<?= $row["gambar"] ?>" width="100">
                                <?php
                                    } elseif (file_exists('img/' . $row["gambar"] . '')) {
                                ?>
                                        <img src="img/<?= $row["gambar"] ?>" width="100">
                                <?php
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php
                        }
                    } else {
                    ?>
                        <tr>
                            <td colspan="5" class="text-center text-danger">
                                <strong>Belum ada data artikel.</strong>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include "../layout/footer.html" ?>
