</div>
<!-- Footer -->
<footer class="sticky-footer bg-white shadow-lg">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; BCL Futsal <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- hapus booking ml\odal -->





<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>


<!-- Page level custom scripts -->


<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
<script type="text/javascript">
    //  $(document).ready(function() {
    //             $('#id_lapangan').change(function() {
    //                 const id_lapangan = $(this).val();
    //                 console.log(id_lapangan);
    //                 $.ajax({
    //                     url: "<?= base_url('booking/lapangan_list'); ?>",
    //                     type: "POST",
    //                     data: {
    //                         idLapangan: id_lapangan
    //                     },
    //                     async: true,
    //                     dataType: 'json',
    //                     success: function(data) {
    //                         $('#harga').val(data.harga);
    //                         console.log(data.harga)
    //                     }
    //                 });
    //             });
    //         });
    function pilih_lapangan() {
        var id_lapangan = $("#id_lapangan").val();
        console.log(id_lapangan);
        $.ajax({
            url: "<?= base_url('booking/lapangan_list') ?>",
            data: "id_lapangan=" + id_lapangan,
            method: 'post',
            async: true,
            dataType: 'json',
            success: function(data) {
                $("#harga").val(data.harga);
            }
        })
    }

    function pilih_booking() {
        var id_booking = $("#id_booking").val();
        // console.log(id_lapangan);
        $.ajax({
            url: "<?= base_url('booking/get_booking') ?>",
            data: "id_booking=" + id_booking,
            method: 'post',
            async: true,
            dataType: 'json',
            success: function(data) {
                $("#total").val(data.harga);
                $("#tanggal").val(data.tanggal);
            }
        })
    }

    function pilih_laporan() {
        var tanggal = $("#tanggal").val();
        // console.log(id_lapangan);
        $.ajax({
            url: "<?= base_url('laporan/get_laporan') ?>",
            data: "tanggal=" + tanggal,
            method: 'post',
            async: true,
            dataType: 'json',
            success: function(data) {
                $("#pendapatan").val(data.pendapatan);
            }
        })
    }
    // function pilih_jam(){
    //     var id_jam = $("#id_jam").val();
    //     console.log(id_jam);
    //     $.ajax({
    //         url: "<?= base_url('admin/jam_list') ?>",
    //         data:"id_jam="+ id_jam,
    //         method: 'post',
    //         dataType: 'json',
    //         success: function(data){
    //             $("#jam_mulai").val(data.jam);
    //         }
    //     })
    // }
</script>


</body>

</html>