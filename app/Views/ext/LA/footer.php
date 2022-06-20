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
<script src="<?=base_url()?>/assets/intl-tel-input/js/intlTelInput.js"></script> 

<script src="<?=base_url()?>/assets/Datetime/dayjs-f/dayjs/dayjs.min.js"></script> 
<script src="<?=base_url()?>/assets/Datetime/dayjs-f/datepicker-bs4.js"></script> 
<script src="<?=base_url()?>/assets/Datetime/Material-Time-Picker-Plugin-jQuery-MDTimePicker/mdtimepicker.js"></script>

 

<!-- Page Specific JS File -->
<script src="<?= base_url() ?>/stisla/assets/js/page/modules-ion-icons.js"></script>

<!-- Template JS File -->
<script src="<?= base_url() ?>/stisla/assets/js/scripts.js"></script>
<script src="<?= base_url() ?>/stisla/assets/js/custom.js"></script>

    <?php if ($menu == "destination") : ?> 
              <script src="<?= base_url() ?>/assets/js/destination/destination.js"></script> 
    <?php elseif ($menu == "vehicle") :?>
              <script src="<?= base_url() ?>/assets/js/vehicle/vehicle.js"></script> 
    <?php elseif ($menu == "driver") :?>
        <?php if(isset($loadHttp)) : ?>
          <?php if (($loadHttp == "insert") || ($loadHttp == "update")) : ?>
            <script src="<?= base_url() ?>/assets/js/driver/insert.js"></script>   
            <script src="<?= base_url() ?>/assets/js/driver/driver.js"></script>    
          <?php endif; ?>
        <?php else : ?>
          <script src="<?= base_url() ?>/assets/js/driver/driver.js"></script>  
        <?php endif;  ?>




    <?php endif; ?>  

 

<script>
 


 /*  */
  $(document).ready(function(){ 
    $('#datedat').datepicker({  });  
  });

  $('#timepicker').mdtimepicker().on('timechanged',function(e){ 
    $('#timevalue').val(e.value); 
  });



/*  */
$("#VWshowSERCH").prependTo("body");

$(".openserch").click(function(e){
  e.preventDefault();
    const sts = $(this).data("sts");
    
    
  $("#VWshowSERCH").modal({
    backdrop: "static",
    keyboard: false,
  });
 
  if (sts == 1) {
    $('#title').html('Search Destination');
    $.getJSON("/departure/insert/a", function (result) {     
 
            let text = "";      
            var dt = new Date();
            var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
            $.each(result.tampil, function() {  
              text += '<tr>' +
                      '<td></td>' +
                      '<td>' + this['nm_destination'] + '</td>' +
                      '<td>' + this['tgl_crt_dt_destination'] + '</td>' +
                      '<td><button id="slctserch" class="btn btn-primary btn-sm" data-slct="'+ 
                      this['nm_destination'] + ' || ' +
                      dt.getSeconds() + dt.getHours() +  dt.getMinutes() + '.000' +
                      this['id_destination'] + '.22' + dt.getSeconds() + '" >' +
                      '<i class="icon ion-android-checkmark-circle"></i> Select' +
                      '</button></td>' +
                      '</tr>' ;
                
            });  
            
            $('#serchdatabody').html( '<div style="overflow-x:auto;">' +
                                        '<table id="view1" class="table table-hover table-bordered table-condensed" style="width:100%">' +
                                          '<thead>' +
                                              '<tr>' +
                                                  '<th>No</th>' +
                                                  '<th>Destination</th>' + 
                                                  '<th>Date Data</th>' + 
                                                  '<th>Opsi</th>' +
                                              '</tr>' +
                                          '</thead>' +
                                          '<tbody>' + 
                                                text +  
                                          '</tbody>' +
                                        '</table>' +
                                      '</div>'); 
                


            var table = $("#view1").DataTable({       
                columnDefs: [     
                              {  
                                  targets: 0,
                                  className: ' text-center',
                                  orderable: false,
                                  searchable: false,
                                  render: function (data, type, row, meta) {
                                      return meta.row + meta.settings._iDisplayStart + 1;
                                  }  
                              },  
                              {
                                targets: [2],
                                className: "text-center",
                              },
                              { 
                                orderable: false,
                                targets: [3],
                                className: "text-center",
                              },
                ],
            }) ;
            
            $("#view1").on("click", "#slctserch", function (e) { 
              e.preventDefault();
                const slct = $(this).data("slct");

                $('#vw-Destination').val(slct);
                $('#VWshowSERCH').modal('hide')
            }); 

            

    }); 
 

  }else if(sts == 2){ 
    $('#title').html('Search Name Vehicle'); 
    $.getJSON("/departure/insert/b", function (result) {     
 
            let text = "";      
            var dt = new Date();
            var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
            $.each(result.tampil, function() {  
              text += '<tr>' +
                      '<td></td>' +
                      '<td>' + this['nm_vehicle'] + '</td>' +
                      '<td>' + this['seat'] + '</td>' +
                      '<td>' + this['tgl_crt_dt_vehicle'] + '</td>' +
                      '<td><button id="slctserch" class="btn btn-primary btn-sm" data-slct="'+ 
                      this['nm_vehicle'] + ' || ' +
                      dt.getSeconds() + dt.getHours() +  dt.getMinutes() + '.000' +
                      this['id_vehicle'] + '.22' + dt.getSeconds() + '" >' +
                      '<i class="icon ion-android-checkmark-circle"></i> Select' +
                      '</button></td>' +
                      '</tr>' ;
                
            });  
            
            $('#serchdatabody').html( '<div style="overflow-x:auto;">' +
                                        '<table id="view2" class="table table-hover table-bordered table-condensed" style="width:100%">' +
                                          '<thead>' +
                                              '<tr>' +
                                                  '<th>No</th>' +
                                                  '<th>Name Vehicle</th>' +
                                                  '<th>Seat</th>' +
                                                  '<th>Date Data </th>' +
                                                  '<th>Opsi </th>' +
                                              '</tr>' +
                                          '</thead>' +
                                          '<tbody>' + 
                                                text +  
                                          '</tbody>' +
                                        '</table>' +
                                      '</div>'); 
                


            var table = $("#view2").DataTable({       
                columnDefs: [     
                              {  
                                  targets: 0,
                                  className: ' text-center',
                                  orderable: false,
                                  searchable: false,
                                  render: function (data, type, row, meta) {
                                      return meta.row + meta.settings._iDisplayStart + 1;
                                  }  
                              },  
                              {
                                targets: [3],
                                className: "text-center",
                              },
                              { 
                                orderable: false,
                                targets: [4],
                                className: "text-center",
                              },
                ],
            }) ;
            
            $("#view2").on("click", "#slctserch", function (e) { 
              e.preventDefault();
                const slct = $(this).data("slct");

                $('#vw-Vehicle').val(slct);
                $('#VWshowSERCH').modal('hide')
            }); 
 
    });   
  }else if(sts == 3){ 
    $('#title').html('Search Name Driver'); 
    $.getJSON("/departure/insert/c", function (result) {     
 
            let text = "";      
            var dt = new Date();
            var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
            $.each(result.tampil, function() {  
              text += '<tr>' +
                      '<td></td>' +
                      '<td>' + this['NIK'] + '</td>' +
                      '<td>' + this['full_name'] + '</td>' +
                      '<td>' +'+62' + this['number_driver'] + '</td>' +
                      '<td>' + this['tgl_crt_dt_driver'] + '</td>' +
                      '<td><button id="slctserch" class="btn btn-primary btn-sm" data-slct="'+ 
                      this['full_name'] + ' || ' +
                      dt.getSeconds() + dt.getHours() +  dt.getMinutes() + '.000' +
                      this['id_driver'] + '.22' + dt.getSeconds() + '" >' +
                      '<i class="icon ion-android-checkmark-circle"></i> Select' +
                      '</button></td>' +
                      '</tr>' ;
                
            });  
            
            $('#serchdatabody').html( '<div style="overflow-x:auto;">' +
                                        '<table id="view3" class="table table-hover table-bordered table-condensed" style="width:100%">' +
                                          '<thead>' +
                                              '<tr>' +
                                                  '<th>No</th>' +
                                                  '<th>NIK</th>' +
                                                  '<th>Name</th>' +
                                                  '<th>Number Hp/WhatsApp</th>' +
                                                  '<th>Date Data </th>' +
                                                  '<th>Opsi </th>' +
                                              '</tr>' +
                                          '</thead>' +
                                          '<tbody>' + 
                                                text +  
                                          '</tbody>' +
                                        '</table>' +
                                      '</div>'); 
                


            var table = $("#view3").DataTable({       
                columnDefs: [     
                              {  
                                  targets: 0,
                                  className: ' text-center',
                                  orderable: false,
                                  searchable: false,
                                  render: function (data, type, row, meta) {
                                      return meta.row + meta.settings._iDisplayStart + 1;
                                  }  
                              },  
                              {
                                targets: [3],
                                className: "text-center",
                              },
                              {
                                targets: [4],
                                className: "text-center",
                              },
                              { 
                                orderable: false,
                                targets: [5],
                                className: "text-center",
                              },
                ],
            }) ;
            
            $("#view3").on("click", "#slctserch", function (e) { 
              e.preventDefault();
                const slct = $(this).data("slct");

                $('#vw-driver').val(slct);
                $('#VWshowSERCH').modal('hide')
            }); 

    });   


  }
   

});

$("#VWshowSERCH").on("hidden.bs.modal", function(){
    $("#serchdatabody").html("");
});



/*  */
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
            window.location.href = "/departure/insert";
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
        url: "/departure/list",
        type: "POST",
      },
      columns: [
                {
                  data: "no",
                },
                {
                  data: "destination",
                },
                {
                  data: "vehicle",
                },
                {
                  data: "plat",
                },
                {
                  data: "nm_driver",
                },
                {
                  data: "date_departure",
                },
                {
                  data: "Price",
                },
                {
                  data: "tgldata",
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
            "<b>[ Destination => " +  extrak[0] + " ]</b><br>" +
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
        "<b>[ Destination => " +  extrak[0] + " ]</b><br>" +
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