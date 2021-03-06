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

        
        <?php include("../inc/header_petugas.php"); ?>


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">List Data</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Gardu</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">DATA GARDU</h4>
                                <p>Tabel data gardu yang telah diupload</p>

                                
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>NAMA GARDU</th>
                                                <th>JENIS GARDU</th>
                                                <th>GI GARDU</th>
                                                <th>ALAMAT</th>
                                                <th>TEMP GARDU</th>
                                                <th>TRAFO</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $q = mysqli_query($link, "SELECT * FROM gardu WHERE username='$username' ORDER BY id DESC");
                                            while($row = mysqli_fetch_assoc($q)){
                                                $kode = $row['kode'];
                                                $nama = $row['nama'];
                                                $jenis = $row['jenis'];
                                                $gi = $row['gi'];
                                                $alamat = $row['alamat'];
                                                $temp = $row['temp'];
                                                $trafo = $row['trafo'];
                                                $code = $row['id'];
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $nama; ?></td>
                                                <td><?php echo $jenis; ?></td>
                                                <td><?php echo $gi; ?></td>
                                                <td><?php echo $alamat; ?></td>
                                                <td><?php echo $temp; ?></td>
                                                <td><?php echo $trafo; ?></td>
                                                <td>
                                                    <a href="edit_gardu?c=<?php echo $code; ?>">
                                                        <button class="btn btn-primary">EDIT</button>
                                                    </a>
                                                    <a href="delete?c=<?php echo $code; ?>&t=gardu">
                                                        <button class="btn btn-danger">HAPUS</button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>NO</th>
                                                <th>NAMA GARDU</th>
                                                <th>JENIS GARDU</th>
                                                <th>GI GARDU</th>
                                                <th>ALAMAT</th>
                                                <th>TEMP GARDU</th>
                                                <th>TRAFO</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </tfoot>
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
    <script src="../plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

</body>

</html>