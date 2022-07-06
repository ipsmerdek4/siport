
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
  
   /*  */
      var phoneInputID = "#phone";
      var input = document.querySelector(phoneInputID);
      var iti = window.intlTelInput(input, {
          //formatOnDisplay: false, 
          hiddenInput: "full",
          separateDialCode: true,
          // placeholderNumberType: "MOBILE",
          preferredCountries: ["id",],  
          initialCountry: "auto",
          geoIpLookup: function(success, failure) {
              $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                  var countryCode = (resp && resp.country) ? resp.country : "id";
                  success(countryCode);
              });
          }, 
          utilsScript: '/assets/intl-tel-input/js/utils.js'
      });
  
      $(".form-").submit(function() {
          var full_number = iti.getNumber(intlTelInputUtils.numberFormat.E164 );
          $(".v_g_HP").val(full_number); 
      }); 
  
      $(phoneInputID).inputFilter(function(value) {
          return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 999999999999); 
      }, "Must be Number or Max Number"); 
    
    /*  */
  
  