<?php
    session_start();
    // Periksa apakah pengguna sudah login
    if (!isset($_SESSION['log']) || $_SESSION['log'] !== true) {
        header('location:login.php');
        exit();
    }
    require 'connect.php';
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
<html>
    <head>
        <meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="fontawesome/css/all.min.css">
        <link rel="stylesheet" href="style.css">
        <title>warehouse</title>
    </head>
    <body class= "">
        <div class="background" height="">
            <video autoplay loop muted >
                <source src="assets/luffy.mp4">
            </video>
        </div>
        <!-- navbar -->
        <nav class="navbar navbar-dark bg-dark mb-0 opacity-75">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                <i class="fa-solid fa-warehouse mx-4"></i> Warehouse.</a>
                <a href="logout.php"><i class="fa-solid fa-right-from-bracket mx-4" style="color: #ffffff;"></i></a>
            </div>
            </nav>


        <!-- Judul -->
        <div class="container-xxl">
            <figure class="text-center">
                <blockquote class="blockquote mt-5">
                <h1 class="">
                    <?php 
                            $ambil_nama_login = mysqli_query($db_conn, "SELECT * FROM tb_login");
                            if($fetcharray = mysqli_fetch_array($ambil_nama_login)){
                                $nama_login = $fetcharray['nama_login'];
                                $id_login = $fetcharray['id_login'];        
                    ?>
                        <span value=<?= $id_login; ?>> Selamat Datang <?= $nama_login; ?></span>
                    <?php 
                        }
                    ?>      
                </h1>
                </blockquote>
                    <figcaption class="blockquote-footer my-2">
                    have a <cite title="Source Title">nice days.</cite>
                    </figcaption>
            </figure>
            <a href="add.php" type="button" class="btn btn-info btn-sm mb-2">
                <i class="fa-regular fa-square-plus"></i>
                Add</a>
        
            <!-- tabel -->
                <div class="table-responsive">
                <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Merek</th>
                        <th>Seri</th>
                        <th>Memori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
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
                        <td>
                            <a href="edit.php?edit=<?php echo $result['id_number']; ?>" type="button" class="btn btn-success btn-sm">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <a href="process.php?delete=<?php echo $result['id_number'];?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus?')">
                                <i class="fa-regular fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
                </table>
            </div>
            
            
        </div>

        <br><br><br><br><br><br><br>
        <center>terimakashi.</center>

        <br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>

    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>    
</html>