<div class="row">
    <div class="col-sm-2">
        <i class="fa fa-plus fa-2x text-primary" id="add"></i>
    </div>
    <div class="col-sm text-right ">
        <h4 class="font-weight-bold"><?php echo $title ?></h4>
    </div>
</div>
<table class="table table-responsive-sm" id="dataTable">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Dibuat Oleh</th>
            <th scope="col">Waktu</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($dataList as $value) { ?>
            <tr>
                <th scope="row"><?php echo $i++ ?></th>
                <td><?php echo $value['pkey'] ?></td>
                <td><?php echo  $value['createname'] . ' | ' . $value['rolename'] ?></td>
                <td><?php echo  date("d / m / Y  H:i", $value['returntime']) ?></td>
                <td style="width: 180px;">
                    <a href="#" class="btn btn-primary" name="edit" pkey="<?php echo $value['pkey'] ?>">Edit</a>
                    <button class="btn btn-danger" name="delete" value="<?php echo $value['pkey'] ?>" data="itemout">Delete</button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLongTitle">Surat Jalan Kembali</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="modal-body">
                <!-- data -->
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <span class="btn btn-secondary" data-dismiss="modal">Close</span>
                <button type="summit" class="btn btn-primary" id="submit">Submit</button>
            </div>
        </div>
    </div>
</div>


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
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    })



            }
        })
    })
    $('body').find('[name=edit]').click(function() {
        var pkey = $(this).attr('pkey')
        $.ajax({
                url: '<?php echo base_url('Admin/ajax') ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'addReturn',
                    id: pkey,
                    param: 'edit',
                },
            })
            .done(function(data) {
                var res = data;
                switch (data.status) {
                    case 'success':
                        Swal.fire({
                            title: 'Loading!',
                            timer: 1,
                            timerProgressBar: true,
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading()

                            },
                        })
                        data = data.data
                        var html = '<input type="hidden" name="pkey" value="' + data.pkey + '"><input type="hidden" name="subaction" value="edit">';
                        html += '<table>';

                        html += '<tr>';
                        html += '<th>ID</th>';
                        html += '<th>: ' + data.pkey + '</th>';
                        html += '</tr>';
                        html += '<tr>';

                        html += '<tr>';
                        html += '<th>Team</th>';
                        html += '<th>: ' + data.teamname + '</th>';
                        html += '</tr>';

                        html += '<tr>';
                        html += '<th>Catatan</th>';
                        html += '<th>: ' + data.note + '</th>';
                        html += '</tr>';

                        html += '<tr>';
                        html += '<th>Nama Teknisi</th>';
                        html += '</tr>';
                        $.each(res.worker, function(i, val) {
                            html += '<tr>';
                            html += '<th>' + val.name + '</th>';
                            html += '</tr>';
                        });
                        html += '</table>';
                        html += '<hr>';
                        html += '<table class="table table-bordered">';

                        html += '<thead>';
                        html += '<tr>';
                        html += '<td class="text-center">Nama Barang</td>';
                        html += '<td class="text-center">Brang Dibawa</td>';
                        html += '<td class="text-center">Brang Terpakai</td>';
                        html += '<td class="text-center">Brang Kembali</td>';
                        html += '<td class="text-center">Catatan</td>';
                        html += '</tr>';
                        html += '</thead>'

                        html += '<tbody>';

                        $.each(res.detail, function(i, val) {
                            html += '<tr>';
                            html += '<td>' + val.itemname + '_' + val.itemtype + '</td>';
                            html += '<td>' + val.count + ' ' + val.unitname + '</td>';
                            html += '<td class="text-center">' + val.use + '</td>';
                            html += '<td><input pkey="' + val.pkey + '" type="number" class="form-control text-center" name="return" placeholder="Barang Kembali" value="' + val.countreturn + '"><span class="btn btn-link max" maxval="' + val.count + '">Max</span></td>';
                            html += '<td><textarea class="form-control" name="note" rows="3"></textarea></td>';
                            html += '</tr>';
                        });
                        html += '</tbody>'
                        html += '</table>';
                        $('#modal-body').html(html)
                        $('#dataModal').modal()
                        maxBtn()
                        break;
                    default:
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.status,
                        })
                        break;
                }
            })
            .fail(function(a) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
            })

    })
    $('#add').click(function() {
        var elemnt = '<div><input type="number" id="id" class="swal2-input" placeholder="ID surat jalan"></div>';
        Swal.fire({
            title: '<div>Masukan ID Surat Jalan<div>',
            html: elemnt,
            showCancelButton: true,
            confirmButtonText: 'Submit',
            showLoaderOnConfirm: true,
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $('#id').val()
                Swal.fire({
                    title: 'Loading!',
                    timer: 30000,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading()

                    },
                })
                $.ajax({
                        url: '<?php echo base_url('Admin/ajax') ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            action: 'addReturn',
                            id: id,
                        },
                    })
                    .done(function(data) {
                        var res = data;
                        switch (data.status) {
                            case 'success':
                                Swal.fire({
                                    title: 'Loading!',
                                    timer: 1,
                                    timerProgressBar: true,
                                    allowOutsideClick: false,
                                    didOpen: () => {
                                        Swal.showLoading()

                                    },
                                })
                                data = data.data
                                var html = '<input type="hidden" name="pkey" value="' + data.pkey + '"><input type="hidden" name="subaction" value="add">';
                                html += '<table>';

                                html += '<tr>';
                                html += '<th>ID</th>';
                                html += '<th>: ' + data.pkey + '</th>';
                                html += '</tr>';
                                html += '<tr>';

                                html += '<tr>';
                                html += '<th>Team</th>';
                                html += '<th>: ' + data.teamname + '</th>';
                                html += '</tr>';

                                html += '<tr>';
                                html += '<th>Catatan</th>';
                                html += '<th>: ' + data.note + '</th>';
                                html += '</tr>';

                                html += '<tr>';
                                html += '<th>Nama Teknisi</th>';
                                html += '</tr>';
                                $.each(res.worker, function(i, val) {
                                    html += '<tr>';
                                    html += '<th>' + val.name + '</th>';
                                    html += '</tr>';
                                });
                                html += '</table>';
                                html += '<hr>';
                                html += '<table class="table table-bordered">';

                                html += '<thead>';
                                html += '<tr>';
                                html += '<td class="text-center">Nama Barang</td>';
                                html += '<td class="text-center">Brang Dibawa</td>';
                                html += '<td class="text-center">Brang Terpakai</td>';
                                html += '<td class="text-center">Brang Kembali</td>';
                                html += '<td class="text-center">Catatan</td>';
                                html += '</tr>';
                                html += '</thead>'

                                html += '<tbody>';

                                $.each(res.detail, function(i, val) {
                                    html += '<tr>';
                                    html += '<td>' + val.itemname + '_' + val.itemtype + '</td>';
                                    html += '<td>' + val.count + ' ' + val.unitname + '</td>';
                                    html += '<td class="text-center">' + val.use + '</td>';
                                    html += '<td><input pkey="' + val.pkey + '" type="number" class="form-control text-center" name="return" placeholder="Barang Kembali" value="' + val.countreturn + '"><span class="btn btn-link max" maxval="' + val.count + '">Max</span></td>';
                                    html += '<td><textarea class="form-control" name="note" rows="3"></textarea></td>';
                                    html += '</tr>';
                                });
                                html += '</tbody>'
                                html += '</table>';
                                $('#modal-body').html(html)
                                $('#dataModal').modal()
                                maxBtn()
                                break;
                            default:
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: data.status,
                                })
                                break;
                        }
                    })
                    .fail(function(a) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    })
            }
        })
    })
    $('#submit').click(function() {
        $('#dataModal').modal('toggle');
        var obj = $('#modal-body');
        var returnVal = $(obj).find('[name=return]')
        var note = $(obj).find('[name=note]')
        var pkey = $(obj).find('[name=pkey]').val()
        var subaction = $(obj).find('[name=subaction]').val()
        var dataPkey = [];
        var dataReturn = [];
        var dataNote = [];
        $.each(returnVal, function(i, val) {
            dataPkey.push($(returnVal[i]).attr('pkey'));
            dataReturn.push($(returnVal[i]).val());
        });
        $.each(note, function(i, val) {
            dataNote.push($(note[i]).val());
        });

        $.ajax({
                url: '<?php echo base_url('Admin/ajax') ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'submitReturn',
                    subaction: subaction,
                    detailkey: dataPkey,
                    return: dataReturn,
                    note: dataNote,
                    pkey: pkey,
                },
            })
            .done(function(a) {
                switch (a.status) {
                    case 'success':
                        Swal.fire({
                            position: 'mid',
                            icon: 'success',
                            title: 'Success Update',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(function() {
                            location.reload()
                        }, 1700);
                        break;
                    default:
                        Swal.fire({
                            icon: 'error',
                            title: a.status,
                        })
                        break;
                }

            })
            .fail(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            })
    })

    function maxBtn() {
        $('.max').click(function() {
            var value = $(this).attr('maxval');
            $(this).closest('td').find('input').val(value);
        })
    }
</script>