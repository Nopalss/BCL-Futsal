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

    </style>
</head>
<body>
    <header>
        <h1>BCL Futsal</h1>
        <h2>Daftar Laporan Harian</h2>
        <h3>Tahun <?= date('Y'); ?></h3>
    </header>
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

            <?php foreach($laporan as $l): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $l['id']; ?></td>
                <td><?= $l['tanggal']; ?></td>
                <td><?= "Rp " . number_format($l['pendapatan'],0,',','.'); ?></td>
                <?php $total += $l['pendapatan']; ?>
            </tr>
            <?php endforeach; ?>
            <tr class="total">
                <td colspan="3" >Total</td>
                <td><?= "Rp " . number_format($total,0,',','.'); ?></td>
            </tr>
        </tbody>
    </table>
    <div class="jam">
        <?php date_default_timezone_set('Asia/Jakarta'); ?>
        <p><?= date("d M Y - H:i"); ?></p>
    </div>
</body>
</html>