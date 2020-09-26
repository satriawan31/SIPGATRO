<?php
date_default_timezone_set("Asia/Jakarta");
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
if(isset($_POST['submit'])){

    $nama = $_POST['nama'];
    $penyulang = $_POST['penyulang'];
    $alamat = $_POST['alamat'];
    $pelanggan = $_POST['pelanggan'];
    $ulp = $_POST['ulp'];
    $kapasitas = $_POST['kapasitas'];
    $keterangan = $_POST['keterangan'];
    $r = $_POST['r'];
    $s = $_POST['s'];
    $t = $_POST['t'];
    $n = $_POST['n'];
    $rn = $_POST['rn'];
    $sn = $_POST['sn'];
    $tn = $_POST['tn'];
    $rs = $_POST['rs'];
    $rt = $_POST['rt'];
    $st = $_POST['st'];
    $p = $_POST['p'];
    $un = $_POST['un'];
    $tanggal = date("Y-m-d");

    $ins = mysqli_query($link, "INSERT INTO pengukuran VALUES('','$nama','$penyulang','$alamat','$pelanggan','$ulp','$kapasitas','$keterangan','$r','$s','$t','$n','$rn','$sn','$tn','$rs','$rt','$st','$p','$un','$username','$tanggal')");
    if($ins){
        echo "<script>alert('Berhasil menambah data');window.location='list_pengukuran'</script>";
    }else{
        echo "<script>alert('Gagal menambah data');window.location=self.location</script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>PLN | Input Pengukuran</title>
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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Input Pengukuran</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">


                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">TAMBAH PENGUKURAN</h4>
                                <p>Input data pengukuran sesuai dengan form yang disediakan</p><br>
                                <div class="basic-form">
                                    <form action="" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Nama Gardu</label>
                                                <select name="nama" class="form-control" required>
                                                    <option value=""></option>
                                                    <?php
                                                    $q = mysqli_query($link, "SELECT * FROM gardu ORDER BY kode DESC");
                                                    while($row = mysqli_fetch_assoc($q)){
                                                        $kode = $row['kode'];
                                                        $nama = $row['nama'];
                                                    ?>
                                                    <option value="<?php echo $kode; ?>"><?php echo $nama; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select> 
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Penyulang</label>
                                                <input type="text" name="penyulang" class="form-control" required> 
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Alamat</label>
                                                <input type="text" name="alamat" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Pelanggan</label>
                                                <input type="text" name="pelanggan" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>ULP</label>
                                                <input type="text" name="ulp" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Kapasitas</label>
                                                <input type="text" name="kapasitas" class="form-control" required> 
                                            </div>
                                        </div>
                                        
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Keterangan</label>
                                                <input type="text" name="keterangan" class="form-control" required> 
                                            </div>
                                        </div><hr>
                                        
                                        <h5>Data Arus (A)</h5>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>R</label>
                                                <input type="text" name="r" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>S</label>
                                                <input type="text" name="s" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>T</label>
                                                <input type="text" name="t" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>N</label>
                                                <input type="text" name="n" class="form-control" required> 
                                            </div>
                                        </div>
                                        <hr>


                                        <h5>Tegangan (V)</h5>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>RN</label>
                                                <input type="text" name="rn" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>SN</label>
                                                <input type="text" name="sn" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>TN</label>
                                                <input type="text" name="tn" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>RS</label>
                                                <input type="text" name="rs" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>RT</label>
                                                <input type="text" name="rt" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>ST</label>
                                                <input type="text" name="st" class="form-control" required> 
                                            </div>
                                        </div><hr>

                                        
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Pemakaian(%)</label>
                                                <input type="text" name="p" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Unbalached (%)</label>
                                                <input type="text" name="un" class="form-control" required> 
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