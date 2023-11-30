<?php
    session_start();
    // // Periksa apakah pengguna sudah login
    // if (!isset($_SESSION['log']) || $_SESSION['log'] !== true) {
    //     header('location:login.php');
    //     exit();
    // }
    require '../connect.php';
    // require 'cek.php';
    $database = new DbHouse();
    $db_conn = $database->connect();
    
    $query_nama_login = "SELECT nama_login FROM tb_login ";
    $sql_nama_login = mysqli_query($db_conn, $query_nama_login);
    $query = "SELECT * FROM tb_stock";
    $sql = mysqli_query($db_conn, $query );
    $no = 0;


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Warehouse Magelang's</title>
  <link rel="stylesheet" href="../fontawesome/css/all.min.css">

  <style>
    /* Custom CSS for full-height hero section */
    .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Menambahkan overlay dengan efek transparan hitam */
  }

  /* Gaya tambahan sesuai kebutuhan Anda */
  .container {
    position: relative; /* Diperlukan untuk membuat konten berada di atas latar belakang */
    z-index: 1; /* Mengatur lapisan depan agar kontennya muncul di atas latar belakang */
    color: #fff; /* Mengatur warna teks menjadi putih */
  }

  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">
        <i class="fa-solid fa-warehouse mx-4"></i> Warehouse.
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#stok">Stok</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../login.php">Admin</a>
            </li>
        </ul>
    </div>
</nav>


<!-- Hero Section -->
<div class="jumbotron jumbotron-fluid hero-section custom-bg" style="background-image: url('bg.jpg'); background-size: cover; height: 100vh; position: relative; display: flex; align-items: center;">
  <div class="overlay"></div> <!-- Menambahkan div overlay untuk efek semu hitam -->
  <div class="container text-center">
    <h1 class="display-4">Warehouse Magelang's</h1>
    <p class="lead">gudang smartphone no.1 di Magelang's</p>
    <a class="btn btn-primary btn-lg" href="#stok" role="button">lihat stock</a>
  </div>
</div>

<!-- section1 -->
 
<section class="about-section text-dark" style="min-height: 100vh; display: flex; justify-content: center; margin: auto;">
  <div class="container mx-auto"> <!-- Tambahkan class mx-auto di sini -->
    <div id="about">
      <div class="p-3 text-center mx-auto">
        <h2 class="text-dark mt-5">About Warehouse Magelang's</h2>
        <p class="text-dark">
        "Selamat datang di Warehouse Magelang, penyedia stok smartphone terbesar di Magelang! Kami bangga menjadi destinasi utama bagi Anda yang mencari berbagai pilihan handphone terkini dengan stok yang melimpah. Dengan komitmen kami untuk memberikan layanan terbaik, kami menyediakan beragam brand dan model handphone dengan harga yang kompetitif. Temukan kepuasan berbelanja Anda di Warehouse Magelang, tempat di mana kebutuhan smartphone Anda dapat terpenuhi dengan lengkap dan memuaskan."
        </p>
      </div>
    </div>

    <div class="row mt-4 justify-content-center">
      <!-- Card 1 -->
      <div class="col-md-6 text-center">
        <div class="card bg-primary text-white">
          <img src="./assets/founder1.jpg" class="card-img-top" alt="Owner 1">
          <div class="card-body">
            <h5 class="card-title">Fakhri Arro'uf</h5>
            <p class="card-text">Co-Founder</p>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-6 text-center">
        <div class="card bg-primary text-white">
          <img src="./assets/founder2.jpg" class="card-img-top" alt="Owner 2">
          <div class="card-body">
            <h5 class="card-title">Zalle Awesome</h5>
            <p class="card-text">Co-Founder</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- section2 -->
        <!-- Judul -->
        <div class="w-75 mx-auto vh-100 mt-5">
            <figure class="text-center ">
                <blockquote class="blockquote mt-5">
                <h1 class="py-3">
                        <span id="stok" class="mt-5 py-5"> List Stock </span>
                          
                </h1>
                </blockquote>
                <!-- <figcaption class="blockquote-footer my-2">have a <cite title="Source Title">nice days.</cite> -->
                </figcaption>
            </figure>

        
            <!-- tabel -->
                <div class="table table-bordered table-hover ">
                <table class="table">
                <thead>
                    <tr>
                        <th>Num.</th>
                        <th>Brand</th>
                        <th>Serial Number</th>
                        <th>Memory</th>
                        <th>Price</th>
                        <th>Stock</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($result = mysqli_fetch_assoc($sql)){
                    ?>
                    <tr>
                        <td><?php echo ++$no;?>.</td>
                        <td><?php echo $result['brand'];?></td>
                        <td><?php echo $result['serial_number'];?></td>
                        <td><?php echo $result['memory'];?></td>
                        <td><?php echo $result['price'];?></td>
                        <td><?php echo $result['stock'];?></td>

                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
                </table>
          </div>
        </div>

        <footer class="bg-dark text-white text-center py-3">
            <h2>Our Partners:</h2>
        <p class="mb-0">PT Handphone Baik Sekali | Smartphone Magelang | HP Magelang Bukan Main | Counter Mas Magelang | Samsul | Papel | Xiomay | Huweei | Illfinix | Popo | Pipo | Rilkih | Kasus</p>
    </footer>
        


    
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>    
    </body>





<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
