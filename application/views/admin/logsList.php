<div class="row">
    <div class="col-sm text-right ">
        <h4 class="font-weight-bold"><?php echo $title ?></h4>
    </div>
</div>
<table class="table table-responsive-sm" id="dataTable">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Transaksi</th>
            <th scope="col">Logs</th>
            <th scope="col">Waktu Logs</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($dataList as $value) { ?>
            <tr>
                <th scope="row"><?php echo $i++ ?></th>
                <td><?php echo $value['name'] ?></td>
                <td><?php echo $value['log'] ?></td>
                <td><?php echo  date("d / m / Y  H:i", $value['time']) ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>