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


    <title>Update Data</title>
  </head>
  <body id="home">
    <!-- navbar -->
    <?php include '../layout/navbar.php' ?>
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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_karyawan
    if (isset($_GET['id_karyawan'])) {
        $id_karyawan=input($_GET["id_karyawan"]);

        $sql="select * from karyawan where id_karyawan=$id_karyawan";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_karyawan=htmlspecialchars($_POST["id_karyawan"]);
        $nama_karyawan=input($_POST["nama_karyawan"]);
        $alamat=input($_POST["alamat"]);
        $no_telp=input($_POST["no_telp"]);

        //Query update data pada tabel anggota
        $sql="update karyawan set
            nama_karyawan='$nama_karyawan',
            alamat='$alamat',
            no_telp='$no_telp'
            where id_karyawan=$id_karyawan";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama Karyawan :</label>
            <input type="text" name="nama_karyawan" class="form-control" value="<?php echo $data['nama_karyawan']; ?>" placeholder="Masukan Nama Karyawan" required />

        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" rows="5" placeholder="Masukan Alamat" required><?php echo $data['alamat']; ?></textarea>

        </div>
        <div class="form-group">
            <label>No Telpon :</label>
            <input type="text" name="no_telp" class="form-control" value="<?php echo $data['no_telp']; ?>" placeholder="Masukan Nomor Telpon" required/>
        </div>
        <input type="hidden" name="id_karyawan" value="<?php echo $data['id_karyawan']; ?>" />

        <button type="submit mt-5" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<!-- footer -->
<?php include '../layout/footer.php' ?>
<!-- akhir footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>