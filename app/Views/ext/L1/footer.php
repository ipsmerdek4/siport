<!--  -->
</section>
</div>

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
<script src="<?= base_url() ?>/assets/select2/dist/js/select2.min.js"></script>

<script src="<?=base_url()?>/assets/Datetime/dayjs-f/dayjs/dayjs.min.js"></script> 
<script src="<?=base_url()?>/assets/Datetime/dayjs-f/datepicker-bs4.js"></script> 

<!-- Page Specific JS File -->
<script src="<?= base_url() ?>/stisla/assets/js/page/modules-ion-icons.js"></script>

<!-- Template JS File -->
<script src="<?= base_url() ?>/stisla/assets/js/scripts.js"></script>
<script src="<?= base_url() ?>/stisla/assets/js/custom.js"></script>

<?php if (isset($menu)) : ?> 
    <?php if ($menu == "Home_view") : ?> 

    <?php else: ?>
        <script src="<?= base_url() ?>/assets/js/home.js"></script>
    <?php endif; ?>
<?php else: ?>
    <script src="<?= base_url() ?>/assets/js/home.js"></script> 
<?php endif; ?>
 


<script src="<?= base_url() ?>/assets/scure/dist/cryptojs-aes.min.js"></script>
<script src="<?= base_url() ?>/assets/scure/dist/cryptojs-aes-format.js"></script>

<script>
 
</script>


</body>

</html>