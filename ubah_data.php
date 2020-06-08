<?php
   include "./koneksi/koneksi.php";

   $query = "SELECT * FROM mahasiswa WHERE id = '$_GET[id]'";

   $result = mysqli_query($koneksi, $query);

   $rows = [];

   // mengambil data dengan cara melakukan perulangan dan memasukannya kedalam variabel array $rows
   while ($data = mysqli_fetch_assoc($result)) {
      $rows[] = $data;
   }
   
   // var_dump();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Tambah Data</title>
   <!-- Bootstrap 4 -->
   <link rel="stylesheet" href="./dist/css/bootstrap.min.css">
   <!-- Custom CSS -->
   <link rel="stylesheet" href="./dist/css/app.css">
</head>
<body>
   <div class="container">
      <div class="row justify-content-center m-5">
         <div class="col-md-12 text-center">
            <h3 class="mb-3">Ubah Tanggal Data</h3>
         </div>
         <div class="col-md-6">
            <!-- <div class="float-right mb-2"> -->
               <!-- <a href="./" class="btn btn-warning">Kembali</a> -->
            <!-- </div> -->

            <div class="card">
               <div class="card-header">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="pt-2 pb-2">
                           <span>Ubah Tanggal Data</span>
                        </div>
                     </div>
                     <div class="col-md-6 text-right pt-1">
                        <a href="./" class="btn btn-warning btn-sm">Kembali</a>
                     </div>
                  </div>

               </div>
               <form action="" method="post">
               <div class="card-body">
                     <div class="form-group">
                        <label for="tgl_mulai">Tanggal Mulai</label>
                        <div class="input-group">
                           <input type="text" name="tgl_mulai" id="tgl_mulai" class="form-control" value="<?= $rows[0]["tgl_mulai"] ?>" readonly required>
                        </div>
                     </div>
                     <form action="" method="post" name="cek">
                        <div class="form-group">
                           <label for="tgl_mulai">Tanggal Akhir</label>
                           <div class="input-group">
                              <input type="date" name="tgl_akhir" id="tgl_akhir" value="<?= $_POST['tgl_akhir'] ?>" class="form-control" required>

                              <input type="submit" class="btn btn-primary" value="cek" name="cek">
                           </div>
                        </div>
                     </form>

                     <?php
                        if (isset($_POST['cek'])) {
                           // var_dump($_POST);
                           $ambil_tanggal = $_POST['tgl_akhir'];

                           $tambah_1_bulan = date('Y-m-d', strtotime("$ambil_tanggal +1month"));
                           $tambah_3_bulan = date('Y-m-d', strtotime("$ambil_tanggal +3month"));
                        }
                     ?>

                     <div class="form-group">
                        <label for="tgl_mulai">Tanggal Ingat 1 [tambah 1 bulan]</label>
                        <div class="input-group">
                           <input type="text" name="tgl_ingat_1" id="tgl_ingat_1" value="<?= $tambah_1_bulan ? $tambah_1_bulan : ''  ?>" class="form-control" readonly>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="tgl_mulai">Tanggal Ingat 2 [tambah 3 bulan]</label>
                        <div class="input-group">
                           <input type="text" name="tgl_ingat_2" id="tgl_ingat_2" value="<?= $tambah_3_bulan ? $tambah_3_bulan : '' ?>" class="form-control" readonly>
                        </div>
                     </div>
                     
                     <input type="submit" name="simpan" value="Simpan" class="btn btn-success float-right">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

   <?php
      // Untuk cek tanggal
      if (isset($_POST['simpan'])) {
         $tgl_akhir = $_POST['tgl_akhir'];
         $tgl_ingat_1 = $_POST['tgl_ingat_1'];
         $tgl_ingat_2 = $_POST['tgl_ingat_1'];

         $query = "UPDATE mahasiswa SET
            tgl_akhir   = '$tgl_akhir',
            tgl_ingat_1 = '$tgl_ingat_1',
            tgl_ingat_2 = '$tgl_ingat_2'

            WHERE id = '$_GET[id]' ";

         mysqli_query($koneksi, $query);

         if (mysqli_affected_rows($koneksi) > 0) { // jika berhasil masuk ke dalam database
            echo "
               <script>
                  alert('Update berhasil ditambahkan');
                  document.location.href = './';
               </script>
            ";
         } else { // jika gagal
            echo "
               <script>
                  alert('Data gagal ditambahkan');
               </script>
            ";

            echo("<br>");
            echo mysqli_error($koneksi);
         }
      }
   ?>

   <script src="./dist/js/jquery-3.4.1.min.js"></script>
   <script src="./dist/js/popper.min.js"></script>
   <script src="./dist/js/bootstrap.min.js"></script>
</body>
</html>