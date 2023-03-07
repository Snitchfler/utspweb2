<?php
// memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

// mengecek apakah di url ada nilai GET id
if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM datamhs WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
    // apabila data tidak ada pada database maka akan dijalankan perintah ini
    if (!count($data)) {
        echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
    }
} else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>UTS PWEB</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body class="loggedin">
    <nav class="navtop">
        <div>
            <h1>Data Mahasiswa</h1>
            <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
    </nav>
    <center>
        <h1>Edit Data</h1>
        <center>
            <form method="POST" action="config_edit.php" enctype="multipart/form-data">
                <section class="base">
                    <!-- menampung nilai id produk yang akan di edit -->
                    <input name="id" value="<?php echo $data['id']; ?>" hidden />
                    <div>
                        <label>Nama</label>
                        <input type="text" name="nama" value="<?php echo $data['nama']; ?>" autofocus="" required="" />
                    </div>
                    <div>
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" value="<?php echo $data['jurusan']; ?>" />
                    </div>
                    <div>
                        <label>Mata Kuliah</label>
                        <input type="text" name="mata_kuliah" required="" value="<?php echo $data['mata_kuliah']; ?>" />
                    </div>
                    <div>
                        <label>Kampus</label>
                        <input type="text" name="kampus" required="" value="<?php echo $data['kampus']; ?>" />
                    </div>
                    <div>
                        <label>Foto</label>
                        <img src="gambar/<?php echo $data['foto']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
                        <input type="file" name="foto" />
                        <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak ingin merubah foto</i>
                    </div>
                    <div>
                        <button type="submit">Simpan Perubahan</button>
                    </div>
                </section>
            </form>
</body>

</html>