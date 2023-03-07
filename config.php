<?php
include 'koneksi.php';
$nama           = $_POST['nama'];
$jurusan        = $_POST['jurusan'];
$mata_kuliah    = $_POST['mata_kuliah'];
$kampus         = $_POST['kampus'];
$foto           = $_FILES['foto']['name'];

if ($foto != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg'); 
    $x = explode('.', $foto);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak     = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $foto; 
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru);
        $query = "INSERT INTO datamhs (nama, jurusan, mata_kuliah, kampus, foto) VALUES ('$nama', '$jurusan', '$mata_kuliah', '$kampus', '$nama_gambar_baru')";
        $result = mysqli_query($koneksi, $query);
        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
                " - " . mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Ekstensi foto yang boleh hanya jpg atau png.');window.location='tambah_data.php';</script>";
    }
} else {
    $query = "INSERT INTO datamhs (nama, jurusan, mata_kuliah, kampus, foto) VALUES ('$nama', '$jurusan', '$mata_kuliah', '$kampus', null)";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
    }
}
