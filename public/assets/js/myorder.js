
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
            


            $("#example").on("click", "#print", function (e) {
                e.preventDefault();  
                var goto = $(this).data("data");
 
                //document.location.href = '/receipt/' + goto , '_blank';
                window.open("/receipt/" + goto, "_blank");

                
            });


