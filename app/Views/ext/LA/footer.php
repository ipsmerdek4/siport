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

    <?php if ($menu == "destination") : ?> 
              <script src="<?= base_url() ?>/assets/js/destination/destination.js"></script> 
    <?php elseif ($menu == "vehicle") :?>
        <!--  -->
    <?php endif; ?>  

<script> 

$.fn.dataTable.ext.errMode = "none";
$(document).ready(function () {
  var table = $("#example").DataTable({
      order: [],
      processing: true,
      language: {
        processing: "Processing...",
      },
      /* search: {
        search: extrakcolect[1],
      }, */
      serverSide: true,
      responsive: true,
      buttons: [
        {
          text: '<i class="fa fa-plus "></i>  <b>| Insert Data</b>',
          className: "btn btn-primary",
          action: function (e, dt, node, config) {
            window.location.href = "/vehicle/insert";
          },
          init: function (api, node, config) {
            $(node).removeClass("btn-secondary");
          },
        },
      ],
      initComplete: function () {
        this.api()
          .buttons()
          .container()
          //.appendTo( $ ('#table_id_wrapper .col-md-6:eq(0)', this.api().table (). container ()));
          //.appendTo( $('#table_id_wrapper .col-md-6:eq(0)' ) );
          .appendTo($(".col-md-6:eq(0)", this.api().table().container()));
      },
      ajax: {
        url: "/vehicle/list",
        type: "POST",
      },
      columns: [
                {
                  data: "no",
                },
                {
                  data: "name",
                },
                {
                  data: "seat",
                },
                {
                  data: "tgl",
                },
                {
                  data: "action",
                },
      ],
      columnDefs: [
                {
                  targets: [0],
                  orderable: false,
                  className: "text-center",
                },
                {
                  targets: [3],
                  className: "text-center",
                },
      ],
  });

  table.on("order.dt search.dt", function () {
    table.column(0, {
        search: "applied",
        order: "applied",
      }).nodes().each(function (cell, i) {
        cell.innerHTML = i + 1;
      });
  }).draw();


});



$("#example").on("click", "#editdata", function (e) {
    e.preventDefault();
    const href = $(this).data("href");
    const datas = $(this).data("data");
    const extrak = datas.split("(^)");

    Swal.fire({
      title: "Info",
      html:
            "<div class='' style='font-size:15px;'>" +
            "Are you sure, <b>Edit</b> this data?<br><br>" +
            "<b>[ Name Vehicle => " +  extrak[0] + " ]</b><br>" +
            "<b>[ Date Data => " + extrak[1] + " ]</b><br>" +
            "</div>",
      icon: "info",
      focusCancel: true,
      showCancelButton: true,
      cancelButtonText: "<i class='fa fa-times '></i> No",
      confirmButtonText: "<i class='fa fa-check'></i> Yes",
      buttonsStyling: false,
      customClass: {
        cancelButton: "btn btn-danger px-3",
        confirmButton: "btn btn-primary mr-1 px-3",
      },
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    });
});

$("#example").on("click", "#deldata", function (e) {
    e.preventDefault();
    const href = $(this).data("href");
    const datas = $(this).data("data");
    const extrak = datas.split("(^)");

    Swal.fire({
      title: "Info",
      html:
        "<div class='' style='font-size:15px;'>" +
        "Are you sure, <b>delete</b> this data?<br><br>" +
        "<b>[ Name Vehicle => " +  extrak[0] + " ]</b><br>" +
        "<b>[ Date Data => " + extrak[1] + " ]</b><br>" +
        "</div>",
      icon: "info",
      focusCancel: true,
      showCancelButton: true,
      cancelButtonText: "<i class='fa fa-times '></i> No",
      confirmButtonText: "<i class='fa fa-check'></i> Yes",
      buttonsStyling: false,
      customClass: {
        cancelButton: "btn btn-danger px-3",
        confirmButton: "btn btn-primary mr-1 px-3",
      },
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    });
});






















/*  */
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