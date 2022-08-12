<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Barang Keluar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body onload="window.print()">
    <h1>Surat Keluar Barang</h1>
    <table class="table table-borderless">
        <tr>
            <th style="text-align: left;">ID</th>
            <td style="text-align: left;"><?php echo $itemOut['pkey'] ?></td>
        </tr>
        <tr>
            <th style="text-align: left;">Team</th>
            <td><?php echo $itemOut['teamname'] ?></td>
        </tr>
        <tr>
            <th style="text-align: left;">Catatan</th>
            <td><?php echo $itemOut['note'] ?></td>
        </tr>
        <tr>
            <th style="text-align: left;">Nama Teknisi</th>
        </tr>
        <?php foreach ($worker as $key => $value) { ?>
            <tr style="text-align: left;">
                <td><?php echo ($key + 1) . '. ' . $value['name'] ?> <span style="margin-left: 20px;">___________</span></td>
            </tr>
        <?php } ?>
    </table>
    <hr>
    <table class="table responsive table-bordered">
        <thead>
            <tr>
                <th>Barang</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($itemDetail as $key => $value) { ?>
                <tr>
                    <td><?php echo $value['name'] . '_' . $value['type'] ?></td>
                    <td style="text-align: center;"><?php echo  $value['count'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>