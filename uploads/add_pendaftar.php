<?php
include_once("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan file diunggah
    if (!empty($_FILES['berkas']['name'])) {
        $file_upload = $_FILES['berkas'];

        // Ambil data dari formulir
        $nama_mhs = $_POST['nama_mhs'];
        $email = $_POST['email'];
        $nomorhp = $_POST['nomorhp'];
        $semester = $_POST['semester'];
        $ipk = $_POST['ipk'];
        $beasiswa = $_POST['beasiswa'];
        $berkas = $file_upload['name'];
        $status = "belum di verifikasi";

        // Tentukan direktori tempat Anda ingin menyimpan berkas
        $upload_dir = __DIR__ . "/uploads/";
        $target_file = $upload_dir . $berkas;

        // Validasi jenis file (misalnya, hanya izinkan gambar)
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif', 'pdf');
        $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
        if (!in_array(strtolower($file_extension), $allowed_types)) {
            echo "Jenis file tidak diizinkan. Hanya file gambar (jpg, jpeg, png, gif) yang diizinkan.";
        } else {
            // Validasi ukuran file (misalnya, maksimum 2MB)
            $max_file_size = 2 * 1024 * 1024; // 2MB
            if ($file_upload['size'] > $max_file_size) {
                echo "Ukuran file terlalu besar. Maksimum 2MB diizinkan.";
            } else {
                // Masukkan data ke database dengan prepared statement
                $stmt = $koneksi->prepare("INSERT INTO tb_daftar_beasiswa(nama_mhs, email, nomorhp, semester, ipk, beasiswa, berkas, status) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssissss", $nama_mhs, $email, $nomorhp, $semester, $ipk, $beasiswa, $berkas, $status);

                if ($stmt->execute()) {
                    // Pindahkan file yang diunggah ke direktori yang ditentukan
                    if (move_uploaded_file($file_upload['tmp_name'], $target_file)) {
                        // Setelah Anda berhasil menambahkan data
                        header("Location: form.php?link_page=2&status=success");

                        exit();
                    } else {
                        echo "Gagal mengunggah berkas.";
                    }
                } else {
                    echo "Gagal memasukkan data ke database.";
                }

                $stmt->close();
            }
        }
    } else {
        echo "Silakan unggah berkas terlebih dahulu.";
    }
} else {
    echo "Permintaan tidak valid.";
}
