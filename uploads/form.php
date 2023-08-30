<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran Beasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
    include_once("koneksi.php");
    $result = mysqli_query($koneksi, "SELECT * FROM tb_daftar_beasiswa");

    if (isset($_GET['link_page'])) {
        $link_page = $_GET['link_page'];
    } else {
        $link_page = 1;
    }
    // Mendeteksi mahasiswa yang dipilih sesuai dengan halaman sebelumya
    if (isset($_GET['jenis_beasiswa'])) {
        $jenis_beasiswa = $_GET['jenis_beasiswa'];
    } else {
        $jenis_beasiswa = "Akademik";
    }

    // end mendeteksi mahasiswa
    function SetLinkPage($actual_link, $reference_link)
    {
        $result = "";
        if ($actual_link == $reference_link) {
            $result = "active";
        }
        return $result;
    }
    function SetContentPage($actual_content, $reference_content)
    {
        $result = "";
        if ($actual_content == $reference_content) {
            $result = "show active";
        }
        return $result;
    }
    // menentujan jenis beasiswa
    function SetBeasiswa($actual_beasiswa, $reference_beasiswa)
    {
        $result = "";
        if ($actual_beasiswa == $reference_beasiswa) {
            $result = "selected";
        }
        return $result;
    }

    // function untuk menggenerate bilangan randome dari nilai ipk
    function generateRandomFloat(float $minValue, float $maxValue): float
    {
        return $minValue + mt_rand() / mt_getrandmax() * ($maxValue - $minValue);
    }
    // end function generate
    // Mengidseble komponen ketika ipk <3
    function SetDisable($ipk)
    {
        $result = "";
        if ($ipk < 3) {
            $result = "disabled";
        }
        return $result;
    }
    ?>
    <div class="container">
        <div class="mt-3">
            <h3 class="text-center" id="card-ku">Pendaftaran Beasiswa</h3>
        </div>
        <div class="card mt-3">
            <div class="card-header bg-primary text-white">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link <?php echo SetLinkPage("1", $link_page) ?>" id="beasiswa" data-bs-toggle="tab" data-bs-target="#nav-beasiswa" type="button" role="tab" aria-controls="nav-beasiswa" aria-selected="true">Informasi Beasiswa</button>
                        <button class="nav-link <?php echo SetLinkPage("2", $link_page) ?>" id="pendaftaran" data-bs-toggle="tab" data-bs-target="#nav-pendaftaran" type="button" role="tab" aria-controls="nav-pendaftaran" aria-selected="false">Form Pendaftaran</button>
                        <button class="nav-link <?php echo SetLinkPage("3", $link_page) ?>" id="hasil_pendaftaran" data-bs-toggle="tab" data-bs-target="#nav-hasil_pendaftaran" type="button" role="tab" aria-controls="nav-hasil_pendaftaran" aria-selected="false">Data Hasil Pendaftaran</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <!-- membuat informasi -->
                    <div class="tab-pane fade <?php echo SetContentPage("1", $link_page) ?>" id="nav-beasiswa" role="tabpanel" aria-labelledby="beasiswa" tabindex="0">
                        <div class="card-body">
                            <h6>Apa Itu Beasiswa?</h6>
                            <p>Beasiswa adalah tunjangan bagi siswa dan mahasiswa untuk membantu membiayai administrasi pendidikan agar siswa atau mahasiswa tersebut dapat menyelesaikan pendidikannya dengan ketentuan memenuhi syarat pendaftaran beasiswa.
                            </p>
                            <h6>Pilihan Beasiswa</h6>
                            <p>Ada macam - macam pilihan beasiswa yang terdiri dari <i><strong>beasiswa akademik</strong></i> dan <i><strong>non akademik</strong></i> </p>

                            <ol>
                                <li>
                                    <b>
                                        <h6>Beasiswa Akademik</h6>
                                    </b>
                                </li>
                                <p>Beasiswa akademik adalah bentuk bantuan keuangan yang diberikan kepada siswa berprestasi berdasarkan
                                    pencapaian akademik pendaftar, seperti nilai tinggi atau prestasi dalam bidang studi tertentu.
                                </p>
                                <p>Syarat Dan Ketentuan Pendaftaran</p>
                                <ul>
                                    <li>Fotokopi transkrip nilai dengan Indeks Prestasi Kumulatif (IPK) paling rendah 3,00 yang disahkan oleh pimpinan perguruan tinggi</li>
                                    <li>Surat keterangan penghasilan orang tua dari instansi tempat bekerja atau surat pernyataan penghasilan orang tua bermeterai bagi yang berwirausaha</li>
                                    <li>Surat Keterangan tidak mampu atau layak mendapat bantuan yang dikeluarkan oleh Lurah/Kepala Desa atau pejabat berwenang</li>
                                </ul>
                                <br>
                                <!-- <i>
                                    <p>Klik button dibawah ini untuk mendaftar Beasiswa Akademik!</p>
                                </i>
                                <a href="form.php?link_page=2&jenis_beasiswa=Akademik" class="btn btn-primary btn-sm">Daftar Sekarang</a>
                                <br><br> -->
                                <li>
                                    <b>
                                        <h6>Beasiswa Non-Akademik</h6>
                                    </b>
                                </li>
                                <p>Beasiswa Non Akademik adlah bentuk bantuan keuangan yang diberikan kepada individu berdasarkan kriteria selain
                                    pencapaian akademik, seperti bakat seni, kegiatan ekstrakulikuler, atau pelayanan masyarakat.
                                </p>
                                <p>Syarat Dan Ketentuan Pendaftaran</p>
                                <ul>
                                    <li>Fotokopi transkrip nilai dengan Indeks Prestasi Kumulatif (IPK) paling rendah 3,00 yang disahkan oleh pimpinan perguruan tinggi</li>
                                    <li>Surat keterangan penghasilan orang tua dari instansi tempat bekerja atau surat pernyataan penghasilan orang tua bermeterai bagi yang berwirausaha</li>
                                    <li>Surat Keterangan tidak mampu atau layak mendapat bantuan yang dikeluarkan oleh Lurah/Kepala Desa atau pejabat berwenang</li>
                                    <li>Upload Sertifikat Prestasi</li>
                                </ul>
                                <br>
                                <!-- <i>
                                    <p>Klik button dibawah ini untuk mendaftar Beasiswa Non-Akademik!</p>
                                </i>
                                <a href="form.php?link_page=2&jenis_beasiswa=Non-akademik" class="btn btn-primary btn-sm">Daftar Sekarang</a> -->
                            </ol>
                        </div>
                        <div class="mt-3">
                            <center>
                                <a href="form.php?link_page=2&jenis_beasiswa=Akademik" class="btn btn-primary btn-sm">Daftar Sekarang</a>
                            </center>

                        </div>


                    </div>
                    <!-- membuat form pendaftaran -->
                    <div class="tab-pane fade <?php echo SetContentPage("2", $link_page) ?>" id="nav-pendaftaran" role="tabpanel" aria-labelledby="pendaftaran" tabindex="0">
                        <div class="card-body">
                            <center>
                                <h5>Formulir Pendaftaran Beasiswa</h5>
                            </center><br>
                            <form action="add_pendaftar.php" method="post" enctype="multipart/form-data">
                                <div id="alert-success" class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                                    Data berhasil ditambahkan!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                                <div class="mb-3 row">
                                    <label for="nama_mhs" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_mhs" id="nama_mhs" value="" placeholder="Masukan Nama Lengkap">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="email" id="email" value="" placeholder="Masukan Email" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nomorhp" class="col-sm-2 col-form-label">Nomor HP</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="nomorhp" id="nomorhp" value="" placeholder="Masukan Nomor HP" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="semester" id="semester" aria-label="Default select example" required>
                                            <option selected>Pilih Semester</option>
                                            <?php
                                            for ($i = 1; $i <= 8; $i++) {
                                            ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <?php
                                $minValue = 2.9;
                                $maxValue = 4;
                                $ipk = round(generateRandomFloat($minValue, $maxValue), 1);
                                ?>
                                <div class="mb-3 row">
                                    <label for="ipk" class="col-sm-2 col-form-label">IPK</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="ipk" id="ipk" value="<?php echo $ipk ?>" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="beasiswa" class="col-sm-2 col-form-label">Beasiswa</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="beasiswa" id="beasiswa" aria-label="Default select example" value="" <?php echo SetDisable($ipk); ?> required>
                                            <option value="Akademik" <?php echo SetBeasiswa("Akademik", $jenis_beasiswa); ?>>Akademik</option>
                                            <option value="Non-akademik" <?php echo SetBeasiswa("Non-akademik", $jenis_beasiswa); ?>>Non Akademik</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="berkas" class="col-sm-2 col-form-label">Choose File</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="berkas" name="berkas" value="" <?php echo SetDisable($ipk); ?> required>
                                    </div>
                                </div>
                                <input class="btn btn-primary btn-sm" type="submit" value="submit" <?php echo SetDisable($ipk); ?>>
                                <a class="btn btn-warning btn-sm" href="form.php?link_page=2">Batal </a>

                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade <?php echo SetContentPage("3", $link_page) ?>" id="nav-hasil_pendaftaran" role="tabpanel" aria-labelledby="hasil_pendaftaran" tabindex="0">
                        <br>
                        <center>
                            <h5>Data List Pendaftar</h5>
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </center>
                        <br>
                        <?php
                        $count = 0; // Inisialisasi hitungan untuk mengambil dua baris data sekaligus

                        while ($user_data = mysqli_fetch_array($result)) {
                            // Mengecek apakah kita telah mengambil dua baris data
                            if ($count % 2 == 0) {
                                // Jika genap, buat div row baru untuk card
                                echo '<div class="row">';
                            }
                        ?>
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <?php
                                            $file_extension = pathinfo($user_data['berkas'], PATHINFO_EXTENSION);
                                            if (strtolower($file_extension) === 'pdf') {
                                                // Tampilkan file PDF menggunakan <embed>
                                                echo '<embed src="uploads/' . $user_data['berkas'] . '" type="application/pdf" width="100%" height="250px">';
                                            } else {
                                                // Tampilkan gambar jika bukan file PDF
                                                echo '<img src="uploads/' . $user_data['berkas'] . '" alt="" class="img-fluid card-img" style="margin-top: 10px;">';
                                            }
                                            ?>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <p class="card-text">Nama: <?php echo $user_data['nama_mhs']; ?></p>
                                                <p class="card-text">Email: <?php echo $user_data['email']; ?></p>
                                                <p class="card-text">Nomor HP: <?php echo $user_data['nomorhp']; ?></p>
                                                <p class="card-text">Semester: <?php echo $user_data['semester']; ?></p>
                                                <p class="card-text">IPK: <?php echo $user_data['ipk']; ?></p>
                                                <p class="card-text">Beasiswa: <?php echo $user_data['beasiswa']; ?></p>
                                                <p class="card-text">Status: <?php echo $user_data['status']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
                            // Mengecek kesamaan apakah kita telah mengambil dua baris data(== -> true)
                            if ($count % 2 == 1 || mysqli_num_rows($result) - $count == 1) {
                                // Jika ganjil atau ini adalah baris terakhir, tutup div row
                                echo '</div>';
                            }
                            $count++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    // Function untuk menampilkan alert succes
    function showSuccessAlert() {
        document.getElementById('alert-success').style.display = 'block';
        setTimeout(function() {
            document.getElementById('alert-success').style.display = 'none';
        }, 3000); // untuk menghilangkan alert success
    }

    // Periksa apakah parameter URL 'status' ada dan 'berhasil'
    const urlParams = new URLSearchParams(window.location.search);
    const statusParam = urlParams.get('status');

    if (statusParam === 'success') {
        showSuccessAlert();
    }
</script>
<script>
    // Fungsi untuk menangani pencarian
    function handleSearch(event) {
        event.preventDefault(); // Mencegah form melakukan submit

        // Ambil nilai yang dimasukkan ke dalam input search
        const searchValue = document.querySelector('input[type="search"]').value.toLowerCase();

        // Ambil semua card data hasil pendaftaran
        const cards = document.querySelectorAll('.card');

        // Loop melalui setiap card dan sembunyikan yang tidak cocok dengan pencarian
        // fE(menampilkan array)
        cards.forEach(card => {
            const cardText = card.innerText.toLowerCase();
            if (cardText.includes(searchValue)) {
                card.style.display = 'block'; // Tampilkan card yang cocok
            } else {
                card.style.display = 'none'; // Sembunyikan card yang tidak cocok
            }
        });
    }

    // Tangani pencarian saat tombol "Search" diklik
    document.querySelector('button[type="submit"]').addEventListener('click', handleSearch);
</script>



</html>