<div class="row mb-3">
    <div class="col-sm-2">
        <button class="btn btn-block btn-success" id="exportClose">Export</button>
    </div>
    <div class="col-sm text-right ">
        <h4 class="font-weight-bold"><?php echo $title ?></h4>
    </div>
</div>
<table class="table table-responsive-sm" id="dataTable">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Kondisi Barang</th>
            <th scope="col">Stock Trakhir</th>
            <th scope="col">Waktu Closing</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($dataList as $value) { ?>
            <tr>
                <th scope="row"><?php echo $i++ ?></th>
                <td><?php echo $value['itemname'] ?></td>
                <td><?php echo $value['typename'] ?></td>
                <td><?php echo number_format($value['laststock']) ?></td>
                <td><?php echo  date("d / m / Y", $value['time']) ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('tbody').find('[name=delete]').click(function() {
        var pkey = $(this).val();
        var obj = $(this);
        var tbl = obj.attr('data');
        Swal.fire({
            title: 'yakin?',
            text: "Data Akan Di Hapus Secara Permanen",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                        url: '<?= base_url('Admin/ajax') ?>',
                        type: 'POST',
                        data: {
                            action: 'delete',
                            pkey: pkey,
                            tbl: tbl,
                        },
                    })
                    .done(function(a) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Berhasil Di Deleted',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        obj.closest('tr').remove();
                        $.each($('tbody').find('tr > th'), function(index, elemt) {
                            $(elemt).html(index + 1)
                        });
                    })
                    .fail(function(a) {
                        console.log("error");
                        console.log(a);
                    })



            }
        })
    })
</script>
<script>
    $('#exportClose').click(function() {
        var elemnt = '<div class="mb-0 mt-3">Mulai</div><div><input type="date" id="startDate" class="swal2-input" placeholder="Mulai"></div>';
        elemnt += '<div class="mb-0 mt-3">Sampai</div><div><input type="date" id="endDate" class="swal2-input" placeholder="Sampai"></div>';
        Swal.fire({
            title: '<div>Pilih Retang Waktu<div>',
            html: elemnt,
            showCancelButton: true,
            confirmButtonText: 'Export',
            showLoaderOnConfirm: true,
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                var startDate = $('#startDate').val();
                var endDate = $('#endDate').val();

                $.ajax({
                        url: '<?php echo base_url('Admin/ajax') ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            action: 'exportClose',
                            start: startDate,
                            end: endDate,
                        },
                    })
                    .done(function(a) {
                        switch (a.status) {
                            case 'success':
                                window.location.replace(a.url);
                                break;
                            default:
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: a.status,
                                })
                                break;
                        }
                    })
                    .fail(function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    })


            }

        })
    })
</script>