<?php
   // ini_set("display_errors", 1);
   include "./koneksi/koneksi.php";

   
   $query = "SELECT * FROM mahasiswa";
   // Mengeksekusi query yang sudah diinputkan
   $result = mysqli_query($koneksi, $query);
   $rows = [];

   // mengambil data dengan cara melakukan perulangan dan memasukannya kedalam variabel array $rows
   while ($data = mysqli_fetch_assoc($result)) {
      $rows[] = $data;
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Label Example</title>
   <!-- Bootstrap 4 -->
   <link rel="stylesheet" href="./dist/css/bootstrap.min.css">
   <!-- Custom CSS -->
   <link rel="stylesheet" href="./dist/css/app.css">
</head>
<body>
   <div class="container">
      <div class="row justify-content-center m-5">
         <h3 class="mb-3">Tabel Label Example</h3>
         <div class="col-md-12">
            <div class="float-right mb-2">
               <a href="tambah_data.php" class="btn btn-success">Tambah Data</a>
            </div>
            <table class="table table-bordered table-hover table-striped text-center" >
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Nama</th>
                     <th>Alamat</th>
                     <th>Status</th>
                     <th>Tanggal Mulai</th>
                     <th>Tanggal Akhir</th>
                     <th>Tanggal Ingat 1</th>
                     <th>Tanggal Ingat 2</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     $nomer = 1;
                     foreach ($rows as $dataMahasiswa) {
                  ?>
                  
                  <tr>
                     <td><?= $nomer++ ?></td>
                     <td><?= $dataMahasiswa['nama'] ?></td>
                     <td><?= $dataMahasiswa['alamat'] ?></td>
                     <td>
                        <!-- ada 2 cara yang dapat dipakai, dapat menggunakan one line if (perintah IF tetapi satu baris) -->
                        <!-- dan bisa menggunakan IF seperti biasa untuk menampilkan label -->

                        <!-- cara 1 (one line if) -->
                        <?= $dataMahasiswa['status'] == "AKTIF" ? "<span class='label label-primary'>AKTIF</span>" : "<span class='label label-danger'>TIDAK AKTIF</span>" ?>
                        
                        <!-- cara 2 (IF biasa) -->
                        <?php
                           // if ($dataMahasiswa['status'] == "AKTIF") { // jika statusnya AKTIF
                           //    echo "<span class='label label-primary'>". $dataMahasiswa['status'] ."</span>";
                           
                           // } else { // jika statusnya TIDAK AKTIF
                           //    echo "<span class='label label-danger'>". $dataMahasiswa['status'] ."</span>";
                           // }
                        ?>
                     </td>
                     <td><?= $dataMahasiswa['tgl_mulai'] ? $dataMahasiswa['tgl_mulai'] : '-' ?></td>
                     <td><?= $dataMahasiswa['tgl_akhir'] ? $dataMahasiswa['tgl_akhir'] : '-' ?></td>
                     <td><?= $dataMahasiswa['tgl_ingat_1'] ? $dataMahasiswa['tgl_ingat_1'] : '-' ?></td>
                     <td><?= $dataMahasiswa['tgl_ingat_2'] ? $dataMahasiswa['tgl_ingat_2'] : '-' ?></td>
                     <td>
                        <a href="ubah_data.php?id=<?= $dataMahasiswa['id'] ?>" class="btn btn-warning">Ubah Tanggal</a>
                     </td>
                  </tr>
                  
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>

   <script src="./dist/js/jquery-3.4.1.min.js"></script>
   <script src="./dist/js/popper.min.js"></script>
   <script src="./dist/js/bootstrap.min.js"></script>
</body>
</html>