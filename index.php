<?php
include("inc/koneksi.php");
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $check = mysqli_query($link, "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1");
    $num= mysqli_num_rows($check);
    if($num == 1){

        $row = mysqli_fetch_assoc($check);
        $tipe = $row['tipe'];

        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['tipe'] = $tipe;

        if($tipe == "Admin"){
            header("location: admin/home");
        }else if($tipe == "Petugas"){
            header("location: petugas/home");
        }
    }else{
        echo "<script>alert('Pengguna tidak ditemukan');window.location=self.location</script>";
    }

}
?>
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SIPGATRO</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/pln.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="h-100">

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
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <center>
                                    <img src="images/pln.png" style="width: 130px;" alt="">
                                </center>
                                
                                <h3 class="text-center" style="margin-top: 5px;">SIPAGATRO</h3>
                                <h6 class="text-center" style="margin-top: 5px;">SISTEM INFORMASI PENDATAAN GARDU PLN</h6>

                                <form action="" method="POST" class="mt-5 mb-5 login-input">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <button name="submit" class="btn login-form__btn submit w-100">Sign In</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>

</html>