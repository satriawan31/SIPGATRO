<?php

include("../inc/koneksi.php");
session_start();
$username = $_SESSION['username'];
$tipe_user= $_SESSION['tipe'];
if(!$username){
    header("location: logout");
}

if($tipe_user != "Admin"){
    header("location: logout");
}

$code = $_GET['c'];
$check = mysqli_query($link, "SELECT * FROM gardu WHERE id='$code' LIMIT 1");
$num = mysqli_num_rows($check);
if($num == 1){
    $row = mysqli_fetch_assoc($check);
    $kode = $row['kode'];
    $nama = $row['nama'];
    $jenis = $row['jenis'];
    $gi = $row['gi'];
    $alamat = $row['alamat'];
    $temp = $row['temp'];
    $trafo = $row['trafo'];
}else{
    header("location: list_gardu");
}



if(isset($_POST['submit'])){

    $kode_post = $_POST['kode'];
    $nama_post = $_POST['nama'];
    $jenis_post = $_POST['jenis'];
    $gi_post = $_POST['gi'];
    $alamat_post = $_POST['alamat'];
    $temp_post = $_POST['temp'];
    $trafo_post = $_POST['trafo'];

    if($kode != $kode_post){

        $check = mysqli_query($link, "SELECT * FROM gardu WHERE kode='$kode_post' LIMIT 1");
        $num = mysqli_num_rows($check);
        if($num == 1){
            echo "<script>alert('Kode gardu telah terdaftar');window.location=self.location</script>";
        }else{

            $upd = mysqli_query($link, "UPDATE gardu SET kode='$kode_post' WHERE id='$code'");
            $upd = mysqli_query($link, "UPDATE gardu SET nama='$nama_post' WHERE id='$code'");
            $upd = mysqli_query($link, "UPDATE gardu SET jenis='$jenis_post' WHERE id='$code'");
            $upd = mysqli_query($link, "UPDATE gardu SET gi='$gi_post' WHERE id='$code'");
            $upd = mysqli_query($link, "UPDATE gardu SET alamat='$alamat_post' WHERE id='$code'");
            $upd = mysqli_query($link, "UPDATE gardu SET temp='$temp_post' WHERE id='$code'");
            $upd = mysqli_query($link, "UPDATE gardu SET trafo='$trafo_post' WHERE id='$code'");
        
            if($upd){
                echo "<script>alert('Berhasil merubah data');window.location='list_gardu'</script>";
            }else{
                echo "<script>alert('Gagal merubah data');window.location=self.location</script>";
            }

        }

    }else{

        $upd = mysqli_query($link, "UPDATE gardu SET kode='$kode_post' WHERE id='$code'");
        $upd = mysqli_query($link, "UPDATE gardu SET nama='$nama_post' WHERE id='$code'");
        $upd = mysqli_query($link, "UPDATE gardu SET jenis='$jenis_post' WHERE id='$code'");
        $upd = mysqli_query($link, "UPDATE gardu SET gi='$gi_post' WHERE id='$code'");
        $upd = mysqli_query($link, "UPDATE gardu SET alamat='$alamat_post' WHERE id='$code'");
        $upd = mysqli_query($link, "UPDATE gardu SET temp='$temp_post' WHERE id='$code'");
        $upd = mysqli_query($link, "UPDATE gardu SET trafo='$trafo_post' WHERE id='$code'");
        
        if($upd){
            echo "<script>alert('Berhasil merubah data');window.location='list_gardu'</script>";
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
    <title>PLN | Edit Gardu</title>
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

        
        <?php include("../inc/header_admin.php"); ?>


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Gardu</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">


                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">EDIT GARDU</h4>
                                <p>Edit data gardu sesuai dengan form yang disediakan</p><br>
                                <div class="basic-form">
                                    <form action="" method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Kode Gardu</label>
                                                <input type="text" value="<?php echo $kode; ?>" name="kode" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Nama Gardu</label>
                                                <input type="text" value="<?php echo $nama; ?>" name="nama" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Jenis Gardu</label>
                                                <input type="text" value="<?php echo $jenis; ?>" name="jenis" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>GI Gardu</label>
                                                <input type="text" value="<?php echo $gi; ?>" name="gi" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Alamat</label>
                                                <input type="text" value="<?php echo $alamat; ?>" name="alamat" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Temp Gardu</label>
                                                <input type="text" value="<?php echo $temp; ?>" name="temp" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Trafo</label>
                                                <input type="text" value="<?php echo $trafo; ?>" name="trafo" class="form-control">
                                            </div>
                                        </div>

                                        <button type="submit" name="submit" class="btn btn-dark">UBAH</button>
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