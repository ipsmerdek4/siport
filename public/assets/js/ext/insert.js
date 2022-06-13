$(document).ready(function () { 
    $('#myselect').select2().data('select2').$container.addClass("border border-primary rounded");

    $("#photo").change(function() {
      const file = this.files[0];
      if (file) {
        var reader = new FileReader();
        reader.onload = function(event) {
          $("#imgPreview").attr("src", event.target.result);
        };
        reader.readAsDataURL(file);
      }
    });
});

