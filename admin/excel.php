<?php

include("../inc/koneksi.php");
header("Content-type: application/vnd-ms-excel");

$date = date("Y_m_d");
$filename = "Data Pengukuran ".$date;
header("Content-Disposition: attachment; filename=" . $filename . ".xls");
?>
<table style="table-layout: fixed; width: 100px;" border="1" class="table table-striped nowrap table-bordered scroll-horizontal">
    <thead>
        <tr>
            <th rowspan="2" style="width: 100px;">NO</th>
            <th rowspan="2" style="width: 150px;">KODE GARDU</th>
            <th rowspan="2" style="width: 150px;">PENYULANG</th>
            <th rowspan="2" style="width: 150px;">NAMA GARDU</th>
            <th rowspan="2" style="width: 150px;">ALAMAT</th>
            <th rowspan="2" style="width: 150px;">PELANGGAN</th>
            <th rowspan="2" style="width: 150px;">KAPASITAS</th>
            <th rowspan="2" style="width: 150px;">ULP</th>
            <th rowspan="2" style="width: 150px;">KETERANGAN</th>
            <th rowspan="2" style="width: 150px;">TANGGAL</th>
            <th colspan="4" style="width: 150px;">ARUS (A)</th>
            <th colspan="6" style="width: 150px;">TEGANGAN (V)</th>
            <th rowspan="2" style="width: 150px;">P (%)</th>
            <th rowspan="2" style="width: 150px;">UNBALACED (&)</th>
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
            <td style="width: 100px;"><?php echo $no; ?></td>
            <td style="width: 150px;"><?php echo $kode; ?></td>
            <td style="width: 150px;"><?php echo $penyulang; ?></td>
            <td style="width: 150px;"><?php echo $nama; ?></td>
            <td style="width: 150px;"><?php echo $alamat; ?></td>
            <td style="width: 150px;"><?php echo $pelanggan; ?></td>
            <td style="width: 150px;"><?php echo $kapasitas; ?></td>
            <td style="width: 150px;"><?php echo $ulp; ?></td>
            <td style="width: 150px;"><?php echo $keterangan; ?></td>
            <td style="width: 150px;"><?php echo $tanggal; ?></td>
            <td style="width: 100px;"><?php echo $r; ?></td>
            <td style="width: 100px;"><?php echo $s; ?></td>
            <td style="width: 100px;"><?php echo $t; ?></td>
            <td style="width: 100px;"><?php echo $n; ?></td>
            <td style="width: 100px;"><?php echo $rn; ?></td>
            <td style="width: 100px;"><?php echo $sn; ?></td>
            <td style="width: 100px;"><?php echo $tn; ?></td>
            <td style="width: 100px;"><?php echo $rs; ?></td>
            <td style="width: 100px;"><?php echo $rt; ?></td>
            <td style="width: 100px;"><?php echo $st; ?></td>
            <td style="width: 150px;"><?php echo $p; ?></td>
            <td style="width: 150px;"><?php echo $un; ?></td>
        </tr>
        <?php
        $no++;
        }
        ?>
    </tbody>
                                        
</table>