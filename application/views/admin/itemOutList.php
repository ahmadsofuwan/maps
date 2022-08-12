<div class="row">
    <div class="col-sm-2">
        <a href="<?php echo base_url($form) ?>"><i class="fa fa-plus fa-2x"></i></a>
    </div>
    <div class="col-sm text-right ">
        <h4 class="font-weight-bold"><?php echo $title ?></h4>
    </div>
</div>
<table class="table table-responsive-sm" id="dataTable">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID Surat Jalan</th>
            <th scope="col">Dibuat Oleh</th>
            <th scope="col">Waktu</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($dataList as $value) { ?>
            <?php
            $disable = '';
            if ($value['status'] == 1)
                $disable = 'disabled';
            ?>

            <tr>
                <th scope="row"><?php echo $i++ ?></th>
                <td><?php echo  $value['pkey'] ?></td>
                <td><?php echo  $value['createname'] . ' | ' . $value['rolename'] ?></td>
                <td><?php echo  date("d / m / Y  H:i", $value['time']) ?></td>
                <td style="width: 250px;">
                    <button class="btn btn-success print" data="<?php echo $value['pkey'] ?>">Print</button>
                    <a href="<?php echo $disable == 'disabled' ? '#' : base_url($form . '/' . $value['pkey']) ?>" class="btn btn-primary">Edit</a>
                    <button class="btn btn-danger" name="delete" data='<?php echo $disable == 'disabled' ? '' : $tableName ?>' value="<?php echo $disable == 'disabled' ? '' : $value['pkey'] ?>" <?php echo $disable ?>>Delete</button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
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
        $('.print').click(function() {
            var data = $(this).attr('data')
            const windowFeatures = "left=100,top=100,width=1000,height=1000";
            const handle = window.open("<?php echo base_url('Admin/print/') ?>" + data, "Print", windowFeatures);

        })


    });
</script>