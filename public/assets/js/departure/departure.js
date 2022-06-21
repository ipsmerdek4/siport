
/*  */
$.fn.dataTable.ext.errMode = "none";
$(document).ready(function () {
  /*  */
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
                { targets: [1],  className: "text-center" },
                { targets: [2],  className: "text-center" },
                { targets: [3],  className: "text-center" },
                { targets: [4],  className: "text-center" },
                { targets: [5],  className: "text-center" },
                { targets: [6],  className: "text-center" },
                { targets: [7],  className: "text-center" }, 
                {
                  targets: [8],  
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
            "<b>[ Vehicle => " +  extrak[1] + " ]</b><br>" + 
            "<b>[ Plat Number => " +  extrak[2] + " ]</b><br>" + 
            "<b>[ Driver => " +  extrak[3] + " ]</b><br>" + 
            "<b>[ Date of Departure => " +  extrak[4] + " ]</b><br>" + 
            "<b>[ Price => " +  extrak[5] + " ]</b><br>" + 
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
        "<b>[ Vehicle => " +  extrak[1] + " ]</b><br>" + 
        "<b>[ Plat Number => " +  extrak[2] + " ]</b><br>" + 
        "<b>[ Driver => " +  extrak[3] + " ]</b><br>" + 
        "<b>[ Date of Departure => " +  extrak[4] + " ]</b><br>" + 
        "<b>[ Price => " +  extrak[5] + " ]</b><br>" + 
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


