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
<script type="text/javascript" src="<?= base_url() ?>/assets/datatables/DataTables-1.12.1/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/datatables/DataTables-1.12.1/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/datatables/Buttons-2.2.3/js/dataTables.buttons.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/datatables/Buttons-2.2.3/js/buttons.bootstrap4.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/datatables/Responsive-2.3.0/js/dataTables.responsive.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/datatables/Responsive-2.3.0/js/responsive.bootstrap4.js"></script>


<!-- Page Specific JS File -->
<script src="<?= base_url() ?>/stisla/assets/js/page/modules-ion-icons.js"></script>

<!-- Template JS File -->
<script src="<?= base_url() ?>/stisla/assets/js/scripts.js"></script>
<script src="<?= base_url() ?>/stisla/assets/js/custom.js"></script>


<script>
  $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn';

  $(document).ready(function() {
    var table = $('#example').DataTable({

      order: [],
      processing: true,
      serverSide: true,

      ajax: {
        "url": "island/listisland",
        "type": "POST"
      },
      columnDefs: [{
        "targets": [0],
        "orderable": false,
      }, ],


      /*  buttons: [{
         text: '<i class="fa fa-plus"></i>  <b>| Tambah Data</b>',
         className: ' btn-primary',
         action: function(e, dt, node, config) {
           window.location.href = '/';
         }
       }],
       order: [
         [1, "asc"]
       ],
       responsive: true,
       lengthChange: false,
       autoWidth: false, */

    });
    /* 
        table.on('order.dt search.dt', function() {
          table.column(0, {
            search: 'applied',
            order: 'applied'
          }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
          });
        }).draw();
        table.buttons().container().appendTo("#example_wrapper .col-md-6:eq(0)");
     */

  });
</script>


</body>

</html>