<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
          
        }
        header{
            text-align: center;
            border-bottom: 2px solid black;
            margin-bottom: 20px;
        }
        table{
            width: 100%;
            text-align: center;
        }
        table thead tr th{
            padding: 1rem;
            background-color: navy;
            color: white;
        }

        .total td{
            padding: 1rem;
            background-color: navy;
            color: white;
            font-weight: bold;
        }
        .jam p {
            width: 100%;
            color: gray;
            text-align: end;
            font-style: italic;
        }
        .pentotalan{
            margin-top: 50px;
            width: 50%;
            position: absolute;
            right: 0;
            text-align: left;        
        }
        tr.garis td, tr.garis th{
            padding: 10px;
            border-top: 2px solid black;
        }
        .jaga{
            margin-top: 5rem;
        }
        table.header{
            width: 50%;
            text-align: left;
            font-size: 1.2rem;
            margin: 30px 0;
        }
            table.header tr th{
            text-align: left;
            
        }
    </style>
</head>
<body>
    <header>
        <center>
            <h1>BCL Futsal</h1>
            <h2>Detail Laporan <?= $laporan['id_laporanB']; ?></h2>
            <h3>Bulan <?= $laporan['bulan']; ?></h3>
        </center>
    </header>
    <center>
    <table class="header">
        <tr>
            <td>Id Laporan</td>
            <td> <?= $laporan['id_laporanB']; ?></td>
        </tr>
        <tr>
            <td>Bulan</td>
            <td> <?= $laporan['bulan']; ?></td>
        </tr>
        <tr>
            <td>Pendapatan</td>
            <th> <?= "Rp " . number_format($laporan['pendapatan'], 0, ',', '.'); ?></th>
        </tr>
    </table>
    </center>
    <table border="2">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Laporan</th>
                <th>Tanggal</th>
                <th>Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            $total = 0;
            ?>
            <?php foreach($harian as $s): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $s['id']; ?></td>
                <td><?= $s['tanggal']; ?></td>
                <td><?= "Rp " . number_format($s['pendapatan'],0,',','.'); ?></td>
                <?php $total += $s['pendapatan']; ?>
            </tr>
            <?php endforeach; ?>
            <tr class="total">
                <td colspan="3" >Total</td>
                <td><?= "Rp " . number_format($total,0,',','.'); ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>