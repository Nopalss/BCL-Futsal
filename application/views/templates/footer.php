</div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website <?= date('Y'); ?></span>
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




<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<script>
    $('.custom-file-input').on('change', function(){
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
    
    $('#id_lapangan').change(function() {
        var idLapangan = $("#id_lapangan").val();
        console.log(idLapangan)
        $.ajax({
            url: '<?= base_url('booking/lapangan_list') ?>',
            data: 'id_lapangan=' + idLapangan,
            success: function(data) {
                console.log(data.harga);
                $('#harga').val(data.harga);
            }
        })
    });
</script>

</body>

</html>