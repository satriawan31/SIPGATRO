<?php
date_default_timezone_set("Asia/Jakarta");
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
$check = mysqli_query($link, "SELECT * FROM pengukuran WHERE id='$code' LIMIT 1");
$num = mysqli_num_rows($check);
if($num == 1){

    $row = mysqli_fetch_assoc($check);
    $kode = $row['kode'];
    $penyulang = $row['penyulang'];
    $alamat = $row['alamat'];
    $pelanggan = $row['pelanggan'];
    $ulp = $row['ulp'];
    $kapasitas = $row['kapasitas'];
    $keterangan = $row['keterangan'];
    $r = $row['r'];
    $s = $row['s'];
    $t = $row['t'];
    $n = $row['n'];
    $rn = $row['rn'];
    $sn = $row['sn'];
    $tn = $row['tn'];
    $rs = $row['rs'];
    $rt = $row['rt'];
    $st = $row['st'];
    $p = $row['p'];
    $un = $row['un'];
    $code = $row['id'];
    $tanggal = $row['tanggal'];
    

}else{
    header("location: list_pengukuran");
}


if(isset($_POST['submit'])){

    $penyulang_post = $_POST['penyulang'];
    $alamat_post = $_POST['alamat'];
    $pelanggan_post = $_POST['pelanggan'];
    $ulp_post = $_POST['ulp'];
    $kapasitas_post = $_POST['kapasitas'];
    $keterangan_post = $_POST['keterangan'];
    $r_post = $_POST['r'];
    $s_post = $_POST['s'];
    $t_post = $_POST['t'];
    $n_post = $_POST['n'];
    $rn_post = $_POST['rn'];
    $sn_post = $_POST['sn'];
    $tn_post = $_POST['tn'];
    $rs_post = $_POST['rs'];
    $rt_post = $_POST['rt'];
    $st_post = $_POST['st'];
    $p_post = $_POST['p'];
    $un_post = $_POST['un'];
    $tanggal_post = date("Y-m-d");

    $upd = mysqli_query($link, "UPDATE pengukuran SET penyulang='$penyulang_post' WHERE id='$code'");
    $upd = mysqli_query($link, "UPDATE pengukuran SET alamat='$alamat_post' WHERE id='$code'");
    $upd = mysqli_query($link, "UPDATE pengukuran SET pelanggan='$pelanggan_post' WHERE id='$code'");
    $upd = mysqli_query($link, "UPDATE pengukuran SET ulp='$ulp_post' WHERE id='$code'");
    $upd = mysqli_query($link, "UPDATE pengukuran SET kapasitas='$kapasitas_post' WHERE id='$code'");
    $upd = mysqli_query($link, "UPDATE pengukuran SET keterangan='$keterangan_post' WHERE id='$code'");
    $upd = mysqli_query($link, "UPDATE pengukuran SET r='$r_post' WHERE id='$code'");
    $upd = mysqli_query($link, "UPDATE pengukuran SET s='$s_post' WHERE id='$code'");
    $upd = mysqli_query($link, "UPDATE pengukuran SET t='$t_post' WHERE id='$code'");
    $upd = mysqli_query($link, "UPDATE pengukuran SET n='$n_post' WHERE id='$code'");
    $upd = mysqli_query($link, "UPDATE pengukuran SET rn='$rn_post' WHERE id='$code'");
    $upd = mysqli_query($link, "UPDATE pengukuran SET sn='$sn_post' WHERE id='$code'");
    $upd = mysqli_query($link, "UPDATE pengukuran SET tn='$tn_post' WHERE id='$code'");
    $upd = mysqli_query($link, "UPDATE pengukuran SET rs='$rs_post' WHERE id='$code'");
    $upd = mysqli_query($link, "UPDATE pengukuran SET rt='$rt_post' WHERE id='$code'");
    $upd = mysqli_query($link, "UPDATE pengukuran SET st='$st_post' WHERE id='$code'");
    $upd = mysqli_query($link, "UPDATE pengukuran SET p='$p_post' WHERE id='$code'");
    $upd = mysqli_query($link, "UPDATE pengukuran SET un='$un_post' WHERE id='$code'");

    if($upd){
        echo "<script>alert('Berhasil merubah data');window.location='list_pengukuran'</script>";
    }else{
        echo "<script>alert('Gagal merubah data');window.location=self.location</script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>PLN | Edit Pengukuran</title>
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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Pengukuran</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">


                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">EDIT PENGUKURAN</h4>
                                <p>Edit data pengukuran sesuai dengan form yang disediakan</p><br>
                                <div class="basic-form">
                                    <form action="" method="POST">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Kode Gardu</label>
                                                <input type="text" value="<?php echo $kode; ?>" class="form-control" readonly> 
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Penyulang</label>
                                                <input type="text" value="<?php echo $penyulang; ?>" name="penyulang" class="form-control" required> 
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Alamat</label>
                                                <input type="text" value="<?php echo $alamat; ?>" name="alamat" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Pelanggan</label>
                                                <input type="text" value="<?php echo $pelanggan; ?>" name="pelanggan" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>ULP</label>
                                                <input type="text" value="<?php echo $ulp; ?>" name="ulp" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Kapasitas</label>
                                                <input type="text" value="<?php echo $kapasitas; ?>" name="kapasitas" class="form-control" required> 
                                            </div>
                                        </div>
                                        
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Keterangan</label>
                                                <input type="text" value="<?php echo $keterangan; ?>" name="keterangan" class="form-control" required> 
                                            </div>
                                        </div><hr>
                                        
                                        <h5>Data Arus (A)</h5>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>R</label>
                                                <input type="text" value="<?php echo $r; ?>" name="r" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>S</label>
                                                <input type="text" value="<?php echo $s; ?>" name="s" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>T</label>
                                                <input type="text" value="<?php echo $t; ?>" name="t" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>N</label>
                                                <input type="text" value="<?php echo $n; ?>" name="n" class="form-control" required> 
                                            </div>
                                        </div>
                                        <hr>


                                        <h5>Tegangan (V)</h5>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>RN</label>
                                                <input type="text" value="<?php echo $rn; ?>" name="rn" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>SN</label>
                                                <input type="text" value="<?php echo $sn; ?>" name="sn" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>TN</label>
                                                <input type="text" value="<?php echo $tn; ?>" name="tn" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>RS</label>
                                                <input type="text" value="<?php echo $rs; ?>" name="rs" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>RT</label>
                                                <input type="text"  value="<?php echo $rt; ?>" name="rt" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>ST</label>
                                                <input type="text" value="<?php echo $st; ?>" name="st" class="form-control" required> 
                                            </div>
                                        </div><hr>

                                        
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>P(%)</label>
                                                <input type="text" value="<?php echo $p; ?>" name="p" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Unbalached (%)</label>
                                                <input type="text" value="<?php echo $un; ?>" name="un" class="form-control" required> 
                                            </div>
                                        </div>

                                        
                                        



                                        <button type="submit" name="submit" class="btn btn-dark">EDIT</button>
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