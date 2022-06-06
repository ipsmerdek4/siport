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

        $(".form-regist").submit(function() {
            var full_number = iti.getNumber(intlTelInputUtils.numberFormat.E164 );
            $(".v_g_HP").val(full_number); 
        });

        $(phoneInputID).inputFilter(function(value) {
            return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 999999999999); 
        }, "Must be Number or Max Number"); 
  
   
 
        /*  */

        $('.btn--pass').click(function(e){ 
          var target = e.currentTarget; 
          $(target).hasClass('hide')? showPassword() : hidePassword() ; 
        });

        function showPassword(){
            $('.btn--pass').removeClass('hide').addClass('show');
            $('.u-pass-d').attr('type','text');
            $('#ico-pass').removeClass('ion-ios-eye').addClass('ion-eye-disabled'); 
            $("#ico-pass").css("font-size", "21px");

        } 
        
        function hidePassword(){
            $('.btn--pass').removeClass('show').addClass('hide');
            $('.u-pass-d').attr('type','password');
            $('#ico-pass').removeClass('ion-eye-disabled').addClass('ion-ios-eye'); 
            $("#ico-pass").css("font-size", "25px");
        } 
     