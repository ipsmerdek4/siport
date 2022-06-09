
  $.fn.dataTable.ext.errMode = 'none';
  $(document).ready(function() {
    var table = $('#example').DataTable({

      order: [],

      /*       processing: true,
       */
      processing: true,
      language: {
        processing: 'Processing...',
      },

      serverSide: true,
      responsive: true,
      buttons: [{
        text: '<i class="fa fa-plus "></i>  <b>| Tambah Data</b>',
        className: 'btn btn-primary',
        action: function(e, dt, node, config) {
          window.location.href = '/island/insert';
        },
        init: function(api, node, config) {
          $(node).removeClass('btn-secondary')
        },
      }],
      initComplete: function() {
        this.api().buttons().container()
          //.appendTo( $ ('#table_id_wrapper .col-md-6:eq(0)', this.api().table (). container ()));
          //.appendTo( $('#table_id_wrapper .col-md-6:eq(0)' ) );
          .appendTo($('.col-md-6:eq(0)', this.api().table().container()));

      },
      ajax: {
        "url": "island/listisland",
        "type": "POST"
      },
      columns: [{
          data: 'no'
        },
        {
          data: 'name_island'
        },
        {
          data: 'tgl_pembuatan_island'
        },
        {
          data: 'action'
        }
      ],
      columnDefs: [{
          "targets": [0],
          "orderable": false,
          "className": "text-center"
        },
        {
          "targets": [3],
          "className": "text-center",
        },
      ],

    });
    table.on('order.dt search.dt', function() {
      table.column(0, {
        search: 'applied',
        order: 'applied'
      }).nodes().each(function(cell, i) {
        cell.innerHTML = i + 1;
      });
    }).draw();



  });



  $('#example').on('click', '#editdata', function() {
    var id = $(this).data('id');
    window.location = "/island/edit/" + id;
  });


  $('#example').on('click', '#deldata', function() {
    var id = $(this).data('id');
    window.location = "/island/del/" + id;
  });