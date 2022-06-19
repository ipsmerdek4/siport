
(function($) {
    $.fn.inputFilter = function(callback, errMsg) {
        return this.on("input keydown keyup mousedown mouseup select contextmenu drop focusout", function(e) {
          if (callback(this.value)) {
            // Accepted value
            if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
              $(this).removeClass("input-error");
              this.setCustomValidity("");
            }
            this.oldValue = this.value;
            this.oldSelectionStart = this.selectionStart;
            this.oldSelectionEnd = this.selectionEnd;
          } else if (this.hasOwnProperty("oldValue")) {
            // Rejected value - restore the previous one
            $(this).addClass("input-error");
            this.setCustomValidity(errMsg);
            this.reportValidity();
            this.value = this.oldValue;
            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
          } else {
            // Rejected value - nothing to restore
            this.value = "";
          }
        });
      };
    }(jQuery));
    
     
    $(".numbertype").inputFilter(function(value) {
      return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 10); }, "Only Numbers and max 10 seats");
    
    $("#minus").click(function(){
      var inputnum = $(".numbertype").val(); 
      var totalnum = parseInt(inputnum)-1; 
      (totalnum < 0)? $(".numbertype").val(0) : $(".numbertype").val(totalnum) ;  
    }); 
    
    $("#plus").click(function(){
      var inputnum2 = $(".numbertype").val(); 
      var totalnum2 =  parseInt(inputnum2)+1; 
      (totalnum2 > 10)? $(".numbertype").val(10) : $(".numbertype").val(totalnum2) ;  
    }); 
    
     
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
    
    
    