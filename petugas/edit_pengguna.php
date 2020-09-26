<?php
include("../inc/koneksi.php");
session_start();
$username = $_SESSION['username'];
$tipe_user= $_SESSION['tipe'];
if(!$username){
    header("location: logout");
}

if($tipe_user != "Petugas"){
    header("location: logout");
}

$code = $_GET['c'];

$check = mysqli_query($link, "SELECT * FROM users WHERE id='$code' LIMIT 1");
$num = mysqli_num_rows($check);
if($num == 1){

    $row = mysqli_fetch_assoc($check);
    $nama = $row['nama'];
    $username = $row['username'];
    $tipe= $row['tipe'];

}else{
    header("location: list_pengguna");
}


if(isset($_POST['submit'])){

    $nama_post = $_POST['nama'];
    $username_post = $_POST['username'];


    if(trim($_POST['password']) != ""){
        $pass = md5($_POST['password']);
        $upd = mysqli_query($link, "UPDATE users SET password='$pass' WHERE id='$code'");
    }

    if($username != $username_post){

        $check = mysqli_query($link, "SELECT * FROM users WHERE username='$username_post' LIMIT 1");
        $num= mysqli_num_rows($check);
        if($num == 1){
            echo "<script>alert('Username telah terdaftar');window.location=self.location</script>";
        }else{

            $upd = mysqli_query($link, "UPDATE users SET nama='$nama_post' WHERE id='$code'");
            $upd = mysqli_query($link, "UPDATE users SET username='$username_post' WHERE id='$code'");
            if($upd){
                echo "<script>alert('Berhasil merubah data');window.location='list_pengguna'</script>";
            }else{
                echo "<script>alert('Gagal merubah data');window.location=self.location</script>";
            }

        }

    }else{

        $upd = mysqli_query($link, "UPDATE users SET nama='$nama_post' WHERE id='$code'");
        if($upd){
            echo "<script>alert('Berhasil merubah data');window.location='list_pengguna'</script>";
        }else{
            echo "<script>alert('Gagal merubah data');window.location=self.location</script>";
        }

    }


    

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>PLN | Input Pengguna</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/pln.png">
    <!-- Custom Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        
        <?php include("../inc/header_petugas.php"); ?>


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Input</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Input Gardu</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">


                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">TAMBAH PENGGUNA</h4>
                                <p>Input data pengguna sesuai dengan form yang disediakan</p><br>
                                <div class="basic-form">
                                    <form action="" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Nama Lengkap</label>
                                                <input type="text" value="<?php echo $nama; ?>" name="nama" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Username</label>
                                                <input type="text" value="<?php echo $username; ?>" name="username" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                        </div>
                                       

                                        <button type="submit" name="submit" class="btn btn-dark">UPLOAD</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="../plugins/common/common.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/gleek.js"></script>
    <script src="../js/styleSwitcher.js"></script>

</body>

</html>