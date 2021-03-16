<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<!-- my Css -->
<link rel="stylesheet" type="text/css" href="css/style.css">


    <title>Jangkar Mas</title>
  </head>
  <body id="home">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">Jangkar Mas Fishing</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <a class="nav-link active" aria-current="page" href="#home">Beranda</a>
        <a class="nav-link" href="#">Daftar Pegawai</a>
        <a class="nav-link" href="#">Daftar Barang</a>
        <a class="nav-link" href="#">Keluar</a>
      </div>
    </div>
  </div>
</nav>
<!-- akhir Navbar -->

<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "../koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama_karyawan=input($_POST["nama_karyawan"]);
        $alamat=input($_POST["alamat"]);
        $no_telp=input($_POST["no_telp"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into karyawan (nama_karyawan,alamat,no_telp) values
        ('$nama_karyawan','$alamat','$no_telp')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data Produk</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama Karyawan:</label>
            <input type="text" name="nama_karyawan" class="form-control" placeholder="Masukan Nama Karyawan" required />

        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <input type="text" name="alamat" class="form-control" placeholder="Alamat" required/>

        </div>
        <div class="form-group">
            <label>No Telpon:</label>
            <input type="text" name="no_telp" class="form-control" rows="5"placeholder="Masukan Nomor Telpon" required/>

        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>