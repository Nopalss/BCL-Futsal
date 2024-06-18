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
            width: 100%;
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
        <h2>Detail Laporan <?= $laporan['id']; ?></h2>
    <h3>Tanggal <?= $laporan['tanggal']; ?></h3>
    </center>
    </header>
    <center>
    <table class="header">
        <tr>
            <td>Id Laporan</td>
            <td> <?= $laporan['id']; ?></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td> <?= $laporan['tanggal']; ?></td>
        </tr>
        <tr>
            <td>Pendapatan</td>
            <th> <?= "Rp " . number_format($laporan['pendapatan'], 0, ',', '.'); ?></th>
        </tr>
    </table>
    </center>
    <h3 class="jaga">*Lapangan Standart</h3>
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
            <?php foreach($standar as $s): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $s['nota']; ?></td>
                    <td><?= $s['jam']; ?></td>
                    <td><?= "Rp " . number_format($s['total'], 0, ',', '.'); ?></td>
                    <?php $total += $s['total']; ?>
                </tr>
            <?php endforeach; ?>
            <tr class="total">
                <td colspan="3" >Total</td>
                <td><?= "Rp " . number_format($total,0,',','.'); ?></td>
            </tr>
        </tbody>
    </table>
    <h3 class="jaga">*Lapangan Sintetis</h3>
    <table border="2">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Laporan</th>
                <th>Jam</th>
                <th>Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            $total2 = 0;
            ?>
            <?php foreach($sintetis as $s): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $s['nota']; ?></td>
                    <td><?= $s['jam']; ?></td>
                    <td><?= "Rp " . number_format($s['total'], 0, ',', '.'); ?></td>
                    <?php $total2 += $s['total']; ?>
                </tr>
            <?php endforeach; ?>
            <tr class="total">
                <td colspan="3" >Total</td>
                <td><?= "Rp " . number_format($total2,0,',','.'); ?></td>
            </tr>
        </tbody>
    </table>
    <table class="pentotalan">
        <tr>
            <td>Lapangan Standart</td>
            <th><?= "Rp " . number_format($total,0,',','.') ?></th>
        </tr>
        <tr>
            <td>Lapangan Sintetis</td>
            <th><?= "Rp " . number_format($total2,0,',','.')?></th>
        </tr>
        <tr class="garis">
            <th>Total</th>
            <?php $tambah =  $total2 + $total; ?>
            <th style="font-size: 1.2rem; color: #409b71;"><?= "Rp " . number_format($tambah,0,',','.'); ?></th>
        </tr>
    </table>
</body>
</html>