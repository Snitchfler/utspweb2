<?php
include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<!DOCTYPE html>
<html>

<head>
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
        <h1>Tambah Data Mahasiswa</h1>
        <center>
            <form method="POST" action="config.php" enctype="multipart/form-data">
                <section class="base">
                    <div>
                        <label>Nama</label>
                        <input type="text" name="nama" autofocus="" required="" />
                    </div>
                    <div>
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" />
                    </div>
                    <div>
                        <label>Mata Kuliah</label>
                        <input type="text" name="mata_kuliah" required="" />
                    </div>
                    <div>
                        <label>Kampus</label>
                        <input type="text" name="kampus" required="" />
                    </div>
                    <div>
                        <label>Foto</label>
                        <input type="file" name="foto" required="" />
                    </div>
                    <div>
                        <button type="submit">Simpan Data</button>
                    </div>
                </section>
            </form>
</body>

</html>
</body>

</html>