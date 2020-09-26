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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>PLN | List Gardu</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/pln.png">
    <!-- Custom Stylesheet -->
    <link href="../plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">List Data</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Pengukuran</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">DATA PENGUKURAN</h4>
                                <p>Tabel data pengukuran yang telah diupload</p>
                                <a href="excel">
                                    <button class="btn btn-success" style="color: #fff;">
                                        <i class="fa fa-file-excel-o"></i>
                                        EXPORT DATA
                                    </button>
                                </a>
                                <div class="table-responsive">
                                    <table class="table table-striped nowrap table-bordered scroll-horizontal">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">NO</th>
                                                <th rowspan="2">KODE GARDU</th>
                                                <th rowspan="2">PENYULANG</th>
                                                <th rowspan="2">NAMA GARDU</th>
                                                <th rowspan="2">ALAMAT</th>
                                                <th rowspan="2">PELANGGAN</th>
                                                <th rowspan="2">KAPASITAS</th>
                                                <th rowspan="2">ULP</th>
                                                <th rowspan="2">KETERANGAN</th>
                                                <th rowspan="2">TANGGAL</th>
                                                <th colspan="4">ARUS (A)</th>
                                                <th colspan="6">TEGANGAN (V)</th>
                                                <th rowspan="2">P (%)</th>
                                                <th rowspan="2">UNBALACED (&)</th>
                                                <th rowspan="2">AKSI</th>
                                            </tr>
                                            <tr>
                                                <th>R</th>
                                                <th>S</th>
                                                <th>T</th>
                                                <th>N</th>
                                                <th>RN</th>
                                                <th>SN</th>
                                                <th>TN</th>
                                                <th>RS</th>
                                                <th>RT</th>
                                                <th>ST</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $q = mysqli_query($link, "SELECT * FROM pengukuran ORDER BY id DESC");
                                            while($row = mysqli_fetch_assoc($q)){
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

                                                $check_nama= mysqli_query($link, "SELECT * FROM gardu WHERE kode='$kode'");
                                                $rw = mysqli_fetch_assoc($check_nama);
                                                $nama = $rw['nama'];
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $kode; ?></td>
                                                <td><?php echo $penyulang; ?></td>
                                                <td><?php echo $nama; ?></td>
                                                <td><?php echo $alamat; ?></td>
                                                <td><?php echo $pelanggan; ?></td>
                                                <td><?php echo $kapasitas; ?></td>
                                                <td><?php echo $ulp; ?></td>
                                                <td><?php echo $keterangan; ?></td>
                                                <td><?php echo $tanggal; ?></td>
                                                <td><?php echo $r; ?></td>
                                                <td><?php echo $s; ?></td>
                                                <td><?php echo $t; ?></td>
                                                <td><?php echo $n; ?></td>
                                                <td><?php echo $rn; ?></td>
                                                <td><?php echo $sn; ?></td>
                                                <td><?php echo $tn; ?></td>
                                                <td><?php echo $rs; ?></td>
                                                <td><?php echo $rt; ?></td>
                                                <td><?php echo $st; ?></td>
                                                <td><?php echo $p; ?></td>
                                                <td><?php echo $un; ?></td>
                                                <td>
                                                    <a href="edit_pengukuran?c=<?php echo $code; ?>">
                                                        <button class="btn btn-primary">EDIT</button>
                                                    </a>
                                                    <a href="delete?c=<?php echo $code; ?>&t=pengukuran">
                                                        <button class="btn btn-danger">HAPUS</button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;
                                            }
                                            ?>
                                        </tbody>
                                        
                                    </table>
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

    <script src="../plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="../plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/tables/js/datatable-init/datatable-basic.min.js?v=123"></script>

</body>

</html>