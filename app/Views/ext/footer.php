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

    </section>
    </div>
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
    <script src="<?= base_url() ?>/assets/bootstrap4-datetime-picker-rails-master/javascripts/tempusdominus-bootstrap-4.min.js"></script>


    <!-- Page Specific JS File -->
    <script src="<?= base_url() ?>/stisla/assets/js/page/modules-ion-icons.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url() ?>/stisla/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>/stisla/assets/js/custom.js"></script>


    <script>
      $(function() {
        $('#datetimepicker4').datetimepicker({
          format: 'L',
          viewMode: 'years',
          format: 'DD/MM/YYYY'
        });
      });


      $('.carousel').carousel({
        interval: 3000,
      })

      $(document).ready(function() {
        $('#myselect').select2().data('select2').$container.addClass("border border-primary rounded");

        $('#myselect2').select2({
          minimumResultsForSearch: -1,
        }).data('select2').$container.addClass("border border-primary rounded");

        $('#myselect3').select2({
          minimumResultsForSearch: -1,
        }).data('select2').$container.addClass("border border-primary rounded");



      });


      $('#regsub').click(function() {
        window.location = "<?= base_url() ?>/register";
      });
    </script>


    </body>

    </html>