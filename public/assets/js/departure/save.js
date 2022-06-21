
/*  */ 
jQuery('#datedat').datepicker();   
  

$('#timepicker').mdtimepicker().on('timechanged',function(e){  
  var times = e.value;
  var pecahtime = times.split(':');
  if (pecahtime[0] < 10) {
    $jamnew = 0 + pecahtime[0];
  }else{
    $jamnew = pecahtime[0];
  } 
  $('#timevalue').val($jamnew + ':' + pecahtime[1]); 
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

$(document).ready(function () {  
$('#rupiah').autoNumeric('init');

});