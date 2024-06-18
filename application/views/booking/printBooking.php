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
                    <th class="s">Id Booking</th>
                    <th></th>
                    <td class="s">
                        <?= $id_booking; ?>
                    </td>
                </tr>
                <tr  class="s">
                    <th class="s">Id Pelanggan</th>
                    <th class=""></th>
                    <td class="s"><?= $booking['id_pelanggan']; ?></td>
                </tr>
                <tr  class="s">
                    <th class="s">Nama Pelanggan</th>
                    <th ></th>
                    <td class="s"><?= $booking['nama']; ?></td>
                </tr>
                <tr  class="s">
                    <th class="s">No Telepon</th>
                    <th class=""></th>
                    <td class="s"><?= $booking['no_telepon']; ?></td>
                </tr>
                <tr  class="s">
                    <th class="s">Tanggal Booking</th>
                    <th class="p-2"></th>
                    <td class="s"><?= $booking['tanggal']; ?></td>
                </tr>
                <tr  class="s">
                    <th class="s">Jam</th>
                    <th class="p-2"></th>
                    <td class="s"><?= $booking['jam_mulai']; ?></td>
                </tr>
                <tr  class="s">
                    <th class="s">Harga</th>
                    <th class="p-2"></th>
                    <td class="s"><?="Rp " . number_format($booking['harga'],2,',','.') ; ?></td>
                </tr>

            </table>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>