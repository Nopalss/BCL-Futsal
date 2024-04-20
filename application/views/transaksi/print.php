<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BCL-Futsal | <?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <style>
        .container {
            margin: auto;
        }

        .header {
            text-align: center;
            padding: 10px;
            border-bottom: 3px solid #FFC94A;
        }

        .text-gold {
            color: #FFC94A;
        }
        .table{
            width: 80%;
            margin: auto;
        }
        table{
            width: 100%;
            margin: 20px auto;
            /* border: 1px solid black; */
            text-align: left;
        }
        .s{
            padding: 20px;
        }
    </style>
</head>

<body>
    <!-- Page Wrapper -->
    <div class="container">
        <div class="header">
            <h2><i class="fas fa-futbol text-gold"></i> BCL Futsal</h2>
            <p>Waluya, Kec. Cikarang Utara, Kabupaten Bekasi, Jawa Barat 17530</p>
        </div>
        <div class="table" border="1">
            <table>
                <tr class="s">
                    <th >Status</th>
                    <th></th>
                    <td>
                        Lunas <i class="far fa-check-circle"></i>
                    </td>
                </tr>
                <tr  class="s">
                    <th>Metode Pembayaran</th>
                    <th class=""></th>
                    <td>Booking</td>
                </tr>
                <tr  class="s">
                    <th>Tanggal</th>
                    <th ></th>
                    <td><?= $transaksi['tanggal']; ?></td>
                </tr>
                <tr  class="s">
                    <th>Nota</th>
                    <th class=""></th>
                    <td><?= $transaksi['nota']; ?></td>
                </tr>
                <tr  class="s">
                    <th>Id Booking</th>
                    <th class="p-2"></th>
                    <td><?= $transaksi['id_booking']; ?></td>
                </tr>
                <tr  class="s">
                    <th>Metode Pembayaran</th>
                    <th class="p-2"></th>
                    <td><?= $transaksi['metode']; ?></td>
                </tr>
                <tr  class="s">
                    <th>Total</th>
                    <th class="p-2"></th>
                    <td>Rp <?= $transaksi['total']; ?></td>
                </tr>

            </table>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>