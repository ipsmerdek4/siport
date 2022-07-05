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
<script src="<?=base_url()?>/assets/sweetalert2/dist/sweetalert2.all.min.js"></script>

<script src="<?= base_url() ?>/assets/select2/dist/js/select2.min.js"></script>
<script src="<?=base_url()?>/assets/intl-tel-input/js/intlTelInput.js"></script> 

<script src="<?=base_url()?>/assets/Datetime/dayjs-f/dayjs/dayjs.min.js"></script> 
<script src="<?=base_url()?>/assets/Datetime/dayjs-f/datepicker-bs4.js"></script> 
 
<script src="<?=base_url()?>/assets/country-picker-flags/build/js/countrySelect.js"></script>

 
<!-- Page Specific JS File -->
<script src="<?= base_url() ?>/stisla/assets/js/page/modules-ion-icons.js"></script>

<!-- Template JS File -->
<script src="<?= base_url() ?>/stisla/assets/js/scripts.js"></script>
<script src="<?= base_url() ?>/stisla/assets/js/custom.js"></script>

<?php if (isset($menu)) : ?> 
    <?php if ($menu == "Home_view") : ?> 
 
        <script> 
              <?php if (!empty(session()->getFlashdata('error'))) : ?>    
              Swal.fire({
                            title: 'Warning',
                            html: '<?php echo session()->getFlashdata('error'); ?>',
                            icon: 'warning', 
                        });
              <?php endif; ?>
              <?php if (!empty(session()->getFlashdata('msg'))) : ?>    
              Swal.fire({
                            title: 'Success',
                            html: '<?php echo session()->getFlashdata('msg'); ?>',
                            icon: 'success', 
                        });
              <?php endif; ?> 
        </script>

    <?php elseif ($menu == "Home_visa") : ?> 

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/featherlight/1.7.12/featherlight.min.js"></script>
      <script id="midtrans-script" type="text/javascript" src="https://api.midtrans.com/v2/assets/js/midtrans-new-3ds.min.js" data-environment="sandbox" data-client-key="SB-Mid-client-tY7QOp5fnqXQfQHM"></script>
      <!-- <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-tY7QOp5fnqXQfQHM"></script> -->

      <script src="<?= base_url() ?>/assets/js/home_visa.js"></script>   

      <script> 
 
                    /* 
                      $("#pay-button").click(function(e){
                        e.preventDefault(); 
                        const price = $(this).data("price");
              
                        $.ajax({
                            type: "post",
                            url: "/trans/k",
                            data: {
                                prices: price,
                            },
                            dataType: "json",
                            success: function (response) {
                                if (response.error) { 
                                      Swal.fire('error', response.error, 'error');
                                }else{ 
                                    snap.pay(response.snapToken, {   
                                        onSuccess: function(result){  
                                              let dataResult = JSON.stringify(result, null, 2);
                                              let dataObj = JSON.parse(dataResult);

                                            alert(dataResult);
                                            // alert(dataObj.payment_type + " " + dataObj.status_message + " " + dataObj.bank + " " + dataObj.gross_amount + " " + dataObj.order_id  + " " + dataObj.transaction_id + " " + dataObj.transaction_time + " " + dataObj.masked_card);
                                            /*  $.ajax({
                                                type: "post",
                                                url: "/trans/kv",
                                                data: {
                                                  payment_type: dataObj.payment_type,
                                                  order_id: dataObj.order_id,
                                                  gross_amount: dataObj.gross_amount,
                                                  va_numbers: dataObj.va_numbers[0].va_number,
                                                  bank: dataObj.va_numbers[0].bank,
                                                },
                                                dataType: "json",
                                                success: function (response) {
                                                    $('.showdetail').html(response);
                                                }
                                              });   
                                        },
                                        // Optional
                                        onPending: function(result){
                                              let dataResult = JSON.stringify(result, null, 2);
                                              let dataObj = JSON.parse(dataResult);


                                              alert(dataObj.payment_type + " " + dataObj.status_message + " " + dataObj.va_numbers[0].bank + " " + dataObj.va_numbers[0].va_number + " " + dataObj.gross_amount + " " + dataObj.order_id  + " " + dataObj.transaction_id + " " + dataObj.transaction_time  + " " + dataObj.transaction_status);

                                            /*  
                                              $.ajax({
                                                type: "post",
                                                url: "/trans/kv",
                                                data: {
                                                  order_id: dataObj.order_id,
                                                  gross_amount: dataObj.gross_amount,
                                                  va_numbers: dataObj.va_numbers[0].va_number,
                                                  bank: dataObj.va_numbers[0].bank,
                                                },
                                                dataType: "json",
                                                success: function (response) {
                                                    $('.showdetail').html(response);
                                                }
                                              });   
                                        },
                                        // Optional
                                        onError: function(result){ 

                                              Swal.fire('error', response.error, 'error');
                                              /* 
                                              $.ajax({
                                                type: "post",
                                                url: "/trans/kv",
                                                data: {
                                                  order_id: dataObj.order_id,
                                                  gross_amount: dataObj.gross_amount,
                                                  va_numbers: dataObj.va_numbers[0].va_number,
                                                  bank: dataObj.va_numbers[0].bank,
                                                },
                                                dataType: "json",
                                                success: function (response) {
                                                    $('.showdetail').html(response);
                                                }
                                              });  
                                        }
                                    });



                                }
                            }
                          });


                      });
                    */
  

      </script>

    <?php elseif ($menu == "Home_order") : ?>  
          <script src="<?= base_url() ?>/assets/js/home_order.js"></script>   
    <?php elseif ($menu == "myorder") : ?>  
       
            <script src="<?= base_url() ?>/assets/datatables/datatables/jquery.dataTables.min.js"></script>
            <script src="<?= base_url() ?>/assets/datatables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
            <script src="<?= base_url() ?>/assets/datatables/datatables-responsive/js/dataTables.responsive.min.js"></script>
            <script src="<?= base_url() ?>/assets/datatables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
            <script src="<?= base_url() ?>/assets/datatables/datatables-buttons/js/dataTables.buttons.min.js"></script>
            <script src="<?= base_url() ?>/assets/datatables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
            <script src="<?= base_url() ?>/assets/datatables/datatables-buttons/js/buttons.html5.min.js"></script>
            <script src="<?= base_url() ?>/assets/datatables/datatables-buttons/js/buttons.print.min.js"></script>
            <script src="<?= base_url() ?>/assets/datatables/datatables-buttons/js/buttons.colVis.min.js"></script>

            
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
                          initComplete: function () {
                            this.api()
                              .buttons()
                              .container()
                              //.appendTo( $ ('#table_id_wrapper .col-md-6:eq(0)', this.api().table (). container ()));
                              //.appendTo( $('#table_id_wrapper .col-md-6:eq(0)' ) );
                              .appendTo($(".col-md-6:eq(0)", this.api().table().container()));
                          },
                          ajax: {
                            url: "/myorder/list",
                            type: "POST",
                          },
                          columns: [
                                    { data: "no", },
                                    { data: "id_transaksi", }, 
                                    { data: "nm_destination", }, 
                                    { data: "total_passenger", },
                                    { data: "status", },
                                    { data: "date_of_departure", },
                                    { data: "picture", },
                                    { data: "action", },  
                          ],
                          columnDefs: [
                                    {
                                      targets: [0],
                                      orderable: false,
                                      className: "text-center pt-3",
                                    },  
                                    { targets: [1], className: "text-center pt-3", },
                                    { targets: [2], className: "text-center pt-3", },
                                    { targets: [3], className: "text-center pt-3", },
                                    { targets: [4], className: "text-center pt-3", },
                                    { targets: [5], className: "text-center pt-3", },
                                    { targets: [6],  
                                      className: "text-center",
                                      orderable: false, },
                                    {
                                      targets: [7],
                                      className: "text-center",
                                      orderable: false,
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
 
            $("#example").on("click", "#qr", function (e) {
                e.preventDefault();  
                var datasX = $(this).data("data");

                
                $("#showmodaldetails").modal({
                  backdrop: "static",
                  keyboard: false,
                }); 

                $('.head').html(" ");
                $('.body').html(" ");
                $('.footer').html(" ");

                $('#detailsLongTitle').html('Detail QR Code'); 
                $('.head').html("<img class='w-100' src='/QRCODE/"+ datasX +".png'>");

            })



            $("#showmodaldetails").prependTo("body"); 
            $("#example").on("click", "#details", function (e) {
                e.preventDefault();  
 
                $("#showmodaldetails").modal({
                  backdrop: "static",
                  keyboard: false,
                }); 

                $('.head').html(" ");
                $('.body').html(" ");
                $('.footer').html(" ");
  
                
                $.ajax({
                  type: "POST",
                  url: "/myorder/details",
                  data: { 
                    datas : $(this).data("data"), 
                  },
                  dataType: "json",
                  success: function (response) {
                      if (response.getTransaksi.status_order == "capture") {
                        var statusnew = "<span class='text-success'>Paid";
                      }else{
                        var statusnew = "Unpaid";
                      }


                      $('#detailsLongTitle').html('Detail Transaction'); 
                      $('.head').append('<div class="col-lg-4"><b>Order-ID' );  
                      $('.head').append('<div class="col-lg-8">' + response.getTransaksi.id_transaksi );  
                      $('.head').append('<div class="col-lg-4 mt-2 mt-lg-0"><b>Name destination' );  
                      $('.head').append('<div class="col-lg-8">' + response.nm_destination );   
                      $('.head').append('<div class="col-lg-4 mt-2 mt-lg-0"><b>Date of Departure' );  
                      $('.head').append('<div class="col-lg-8">' + response.date_of_departure );
                      $('.head').append('<div class="col-lg-4 mt-2 mt-lg-0"><b>Status' );  
                      $('.head').append('<div class="col-lg-8 ">' + statusnew );
                      $('.head').append('<div class="col-lg-4 mt-2 mt-lg-0"><b>Email' );  
                      $('.head').append('<div class="col-lg-8 ">' + response.getTransaksi.email_order );
                      $('.head').append('<div class="col-lg-4 mt-2 mt-lg-0"><b>Phone/WhatsApp Number' );  
                      $('.head').append('<div class="col-lg-8 ">' + response.getTransaksi.phone_order );
                      $('.head').append('<hr class="border-top border-primary w-100">' );

                      $.each(response.getPassenger, function() {
                        $('.body').append('<div class="col-lg-4 mt-2 mt-lg-0"><b>Name Passenger' );  
                        $('.body').append('<div class="col-lg-8 ">' + this['title_passenger'] + "." + this['name_passenger'] );
                        $('.body').append('<div class="col-lg-4 mt-2 mt-lg-0"><b>ID Passenger' );  
                        $('.body').append('<div class="col-lg-8 ">' + this['KTP_passenger'] );
                        $('.body').append('<div class="col-lg-4 mt-2 mt-lg-0"><b>Country Passenger' );  
                        $('.body').append('<div class="col-lg-8 ">' + this['country_passenger'] );
                        $('.body').append('<br><br>' ); 
                      });  

                      $('.body').append('<hr class="border-top border-primary w-100">' ); 
                      $('.footer').append('<div class="col-4">Passenger' );  
                      $('.footer').append('<div class="col-8">' + response.getTransaksi.total_passenger + " Seat" );
                      $('.footer').append('<div class="col-4">Price ' );  
                      $('.footer').append('<div class="col-8">' + response.price );
                      $('.footer').append('<div class="col-4">' );  
                      $('.footer').append('<div class="col-8"><hr class="border-top border-danger w-100">');
                      $('.footer').append('<div class="col-4"><b>Total ' );  
                      $('.footer').append('<div class="col-8"><b>' + response.total );


                  }
                });




             
            });
            




      <?php if (!empty(session()->getFlashdata('error'))) : ?>    
        Swal.fire({
                      title: 'Warning',
                      html: '<?php echo session()->getFlashdata('error'); ?>',
                      icon: 'warning', 
                  });
        <?php endif; ?>
        <?php if (!empty(session()->getFlashdata('msg'))) : ?>    
        Swal.fire({
                      title: 'Success',
                      html: '<?php echo session()->getFlashdata('msg'); ?>',
                      icon: 'success', 
                  });
        <?php endif; ?>







      </script>


    <?php else: ?>
        <script src="<?= base_url() ?>/assets/js/home.js"></script>
    <?php endif; ?>  
<?php else: ?>
    <script src="<?= base_url() ?>/assets/js/home.js"></script> 
<?php endif; ?>
 
 

<script>

      
  

</script>


</body>

</html>


