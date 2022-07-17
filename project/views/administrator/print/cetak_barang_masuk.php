<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS Offline -->
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <!-- Bootstrap CSS Online -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../../../css/cetak.css">
    <title>Cetak Barang Masuk - <?= date("D, d M Y"); ?></title>
</head>

<!-- <body onload="window.print()"> -->

<body onload="javascript:window.print()">
    <div style="margin-left: 20px;"></div>
    <label class="label">ASLI</label>

    <p>&nbsp;</p>
    <img src="img/logo-DT.png" alt="logo" class="logo">
    <table width="90%" cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td>
                <div align="center">
                    <img src="img/logo-DT.png" alt="" width="90px" style="margin-right: 20px;">
                    <font size="10" center>
                        <b>D</b>igital <b>T</b>oko
                    </font>
                    <br>
                    <span class="fs-4">Jl. Sukadamai Blok Pahing No.35 SindangLaut, Kota Cirebon, Jawa Barat</span>
                </div>
            </td>
        </tr>
    </table>
    <br>
    <hr width="1900">

    <?php

    include '../../../model/database.php';
    $db = new Database();
    
    if (isset($_GET['dari']) && isset($_GET['sampai'])) {
        $dari = $_GET['dari'];
        $sampai = $_GET['sampai'];
        $data_barang_masuk = $db->data_barang_masuk($dari, $sampai);
    } else {
        $data_barang_masuk = $db->data_barang_masuk();
    }
    $no = 0; 
    ?>

    <center>
        <h3>Laporan Barang Masuk</h3>
    </center>

    <table width="100%" cellspacing="0" cellpadding="30" class="table-data">
        <tr>
            <th class="thead">No</th>
            <th class="thead">No Ref</th>
            <th class="thead">Tanggal Masuk</th>
            <th class="thead">Produk</th>
            <th class="thead">Distributor</th>
            <th class="thead">Harga</th>
            <th class="thead">Jumlah Beli</th>
            <th class="thead">Total</th>
            <th class="thead">Penerima</th>
        </tr>
        <?php

        if ($data_barang_masuk) :
            foreach ($data_barang_masuk as $row) {
        ?>
        <tr class="td-data">
            <td class="td-data"><?= $no++; ?></td>
            <td class="td-data"><?= $row['no_ref']; ?></td>
            <td class="td-data"><?= $row['tgl_masuk']; ?></td>
            <td class="td-data"><?= $row['nm_barang']; ?></td>
            <td class="td-data"><?= $row['nm_distributor']; ?></td>
            <td class="td-data"><?= $db->rupiah($row['harga']); ?></td>
            <td class="td-data"><?= $row['jumlah']; ?></td>
            <td class="td-data"><?= $db->rupiah($row['total']); ?></td>
            <td class="td-data"><?= $row['penerima']; ?></td>
        </tr>

        <?php
            };
        endif; ?>
    </table>

    <br><br><br><br>
    <div class="ttd">
        <table align="right">
            <tr>
                <td>
                    <center>
                        Cirebon, <?= date("d F Y"); ?>
                    </center>
                </td>
            </tr>
            <tr>
                <td>
                    <center>
                        Direktur Digital Toko
                        <p>
                            <img src="img/qrcode.jpg" alt="" width="100px">
                        </p>
                    </center>
                </td>
            </tr>
            <tr>
                <td>
                    <center>
                        Muhammad Ivan Chriana
                    </center>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>