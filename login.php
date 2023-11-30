<?php 
require 'function.php';
require_once 'connect.php'; 

class LoginDb extends DbHouse {
    public function checkLogin($email, $password) {
        $db_conn = $this->connect();
        $cekdatabase = mysqli_query($db_conn, "SELECT * FROM tb_login where email='$email' and password='$password'");
        $id_query = mysqli_fetch_assoc($db_conn, "SELECT * FROM tb_login");
        $hitung = mysqli_num_rows($cekdatabase);

        if ($hitung > 0) {
            $_SESSION['log'] = true;
            $_SESSION['nama_login'] = $id_query['nama_login'];
            header('location:index.php');
        } else {
            header('location:login.php');
        }
        
    }
}

$loginDb = new LoginDb();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $loginDb->checkLogin($email, $password);
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - Gudang</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="fontawesome/css/all.min.css">
        <link rel="stylesheet" href="styleLogin.css">
    </head>

<body class="">

    <div class="background" height="100%">
        <video autoplay loop muted >
            <source src="assets/luffy.mp4">
        </video>
    </div>

        <!-- navbar -->
    <nav class="navbar navbar-dark bg-dark mb-0 opacity-75">
            <div class="container-fluid d-flex justify-content-center">
              <a class="navbar-brand" href="#">
                <i class="fa-solid fa-warehouse"></i>
                Warehouse.
              </a>
            </div>
        </nav>
            
            
            <!-- login form -->
        <div id="layoutAuthentication mt-4">
            <div id="layoutAuthentication_content">
                <main class="LoginAdmin">
                    <div class="container mt-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-4">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 p-3 bg-dark opacity-40 bg-transparent ">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-2">Login Admin</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input required class="form-control py-2" name="email" id="inputEmailAddress" type="email" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group my-0">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input required class="form-control py-2" name="password" id="inputPassword" type="password" placeholder="Enter password" />
                                            </div>

                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-center mt-0 mb-4 mr-4">
                                                <button class="btn btn-primary" name="login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </main>
            </div>
           
        </div>

        <!-- footer -->
         <footer class="navbar fixed-bottom navbar-dark bg-dark">
            <div class="container-fluid d-flex justify-content-center">
                <span class="navbar-brand" mb02 h1>
                "i don't want to conquer anything, i just think the guy with the most freedom in this whole ocean.. is the pirate king!"
                </span>
            </div>
        </footer>

    </body>
</html>
