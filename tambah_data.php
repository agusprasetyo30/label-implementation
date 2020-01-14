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
            <h3 class="mb-3">Tambah Data</h3>
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
                           <span>Tambah Data</span>
                        </div>
                     </div>
                     <div class="col-md-6 text-right pt-1">
                        <a href="./" class="btn btn-warning btn-sm">Kembali</a>
                     </div>
                  </div>

               </div>
               <div class="card-body">
                  <form action="" method="post">
                     <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan nama" required>
                     </div>
                     <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3" class="form-control" placeholder="Masukan alamat"></textarea>
                     </div>
                     <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                           <option selected disabled>Pilih Status</option>
                           <option value="AKTIF">AKTIF</option>
                           <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                        </select>
                     </div>
                     
                     <input type="submit" name="simpan" value="Simpan" class="btn btn-success float-right">

                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>

   <?php
      include "./koneksi/koneksi.php";
   
      // Untuk menyimpan data di database
      if (isset($_POST['simpan'])) {
         // Memasukan inputan ke dalam variabel untuk di proses
         $nama = $_POST['nama'];
         $alamat = $_POST['alamat'];
         $status = $_POST['status'];

         $query = "INSERT INTO mahasiswa VALUES (NULL, '$nama', '$alamat', '$status') ";
         // Mengeksekusi query diatas
         $data = mysqli_query($koneksi, $query);

         // Mengecek apakah inputan berhasil diinputkan atau belumS
         if (mysqli_affected_rows($koneksi) > 0) { // jika berhasil masuk ke dalam database
            echo "
               <script>
                  alert('Data berhasil ditambahkan');
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