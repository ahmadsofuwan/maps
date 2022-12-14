</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; 2022 Power Ahmad Sofuwan</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> × </span>
                </button>
            </div>
            <div class="modal-body">anda yakin mau log out</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('Auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->

<script src="<?= base_url('asset/sb_admin2/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('asset/sb_admin2/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('asset/sb_admin2/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('asset/sb_admin2/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('asset/sb_admin2/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('asset/sb_admin2/'); ?>js/demo/datatables-demo.js"></script>
<script src="<?= base_url('asset/sb_admin2/'); ?>js/base.js"></script>
<script src="<?= base_url('asset/admin/'); ?>js/base.js" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        var post = <?php echo json_encode($_POST); ?>;
        var obj = $('#content');
        $.each(post, function(index, value) {
            obj.find('[name=' + index + ']').val(value);
        });
    });
</script>
<script>
    $('#Report').click(function() {
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
                            action: 'export',
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