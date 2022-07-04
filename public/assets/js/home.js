      jQuery('#datedat').datepicker();   
   
      $("#VWshowSERCH").prependTo("body");
      $('#viewpictue').click(function() {
        var selct = $('#myselect').val();  

        if (selct != 0) { 
          $("#VWshowSERCH").modal({
            backdrop: "static",
            keyboard: false,
          }); 
          var data = { gosdt : selct, };  
          $.getJSON("/views/a", data, function (result) {     
            $.each(result.hasil, function() {
              $('#title').html( result.hasil.nm_destination );
              $('#serchdatabody').html( '<img class="img w-100" src="uploads/destination/' + result.hasil.picture_destination + '" alt=" ' + result.hasil.picture_destination + ' ">'  );
            });  
          });  
        } 
      });
 

      $('.carousel').carousel({
        interval: 3000,
      })

      $(document).ready(function() {
        $('#myselect').select2({
         }).data('select2').$container.addClass("border border-primary rounded");
 
        $('#myselect3').select2({
          minimumResultsForSearch: -1,
        }).data('select2').$container.addClass("border border-primary rounded");



      });

