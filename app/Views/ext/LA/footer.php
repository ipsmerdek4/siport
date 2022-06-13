<footer class="main-footer">
  <div class="footer-left">
    Copyright &copy; 2022 <div class="bullet"></div> Template By <a href="https://getstisla.com/">STISLA</a>
  </div>
  <div class="footer-right">
  </div>
</footer>
</div>
</div>



<!-- General JS Scripts -->
<script src="<?= base_url() ?>/stisla/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>/stisla/node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url() ?>/stisla/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/stisla/node_modules/nicescroll/dist/jquery.nicescroll.min.js"></script>
<script src="<?= base_url() ?>/stisla/node_modules/moment/min/moment.min.js"></script>
<script src="<?= base_url() ?>/stisla/assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="<?= base_url() ?>/assets/sweetalert2/dist/sweetalert2.all.min.js"></script>

<script src="<?= base_url() ?>/assets/datatables/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/datatables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/datatables/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/datatables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/datatables/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/assets/datatables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/datatables/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/assets/datatables/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/assets/datatables/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="<?= base_url() ?>/assets/select2/dist/js/select2.min.js"></script>


<!-- Page Specific JS File -->
<script src="<?= base_url() ?>/stisla/assets/js/page/modules-ion-icons.js"></script>

<!-- Template JS File -->
<script src="<?= base_url() ?>/stisla/assets/js/scripts.js"></script>
<script src="<?= base_url() ?>/stisla/assets/js/custom.js"></script>


<?php if ($menu == "dataisland") : ?>
  <script src="<?= base_url() ?>/assets/js/island.js"></script>
<?php elseif ($menu == "datalocation") : ?>
  <?php if (isset($loadHttp)) {
    if ($loadHttp == "insert") { ?>
      <script src="<?= base_url() ?>/assets/js/ext/insert.js"></script>
      <script src="<?= base_url() ?>/assets/js/location.js"></script>
    <?php } elseif ($loadHttp == "update") { ?>
      <script src="<?= base_url() ?>/assets/js/ext/update.js"></script>
      <script src="<?= base_url() ?>/assets/js/location.js"></script>
    <?php } else { ?>
      <script src="<?= base_url() ?>/assets/js/location.js"></script>
    <?php   }
  } else { ?>
    <script src="<?= base_url() ?>/assets/js/location.js"></script>
  <?php } ?>
<?php endif ?>


<script> 

  <?php if (!empty(session()->getFlashdata('error'))) : ?> Swal.fire({
      title: 'Warning',
      html: '<?php echo session()->getFlashdata('error'); ?>',
      icon: 'warning',
    });
  <?php endif; ?>


  <?php if (!empty(session()->getFlashdata('msg'))) : ?> Swal.fire({
      title: 'Success',
      html: '<?php echo session()->getFlashdata('msg'); ?>',
      icon: 'success',
    });
  <?php endif; ?>
</script>





</body>


</html>