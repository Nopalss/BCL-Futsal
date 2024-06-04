<footer>
        <h1><i class="fas fa-futbol"></i> BCL Futsal</h1>
        <div class="logo-footer">
            <a href="mailto: holanakdo@email.com"><i class="far fa-envelope"></i></a>
            <a href="https://www.instagram.com/bclfutsal/" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.linkedin.com/in/muhammad-naufal-saputra-b6a8902a8/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://www.facebook.com/fifa?locale=id_ID" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://wa.me/6281381653386"><i class="fab fa-whatsapp"></i></a>
        </div>
        <div class="menu">
            <ul>
                <?php foreach($menu as $m): ?>
                <li><a href="<?= base_url(). $m['url']?>"><?= $m['title']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="copyright">
            <p>Copyright &copy;<?= date('Y'); ?> By Kelompok 2</p>
        </div>
</footer>

<div class="bg-focus"></div>


<script src="https://unpkg.com/scrollreveal"></script>
<script src="<?= base_url('assets/'); ?>js/script.js"></script>
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


</body>
</html>