
           
        function validasi(e) {    
            var nilai = 0; 
            let penumpang = e;  


            $('.title1msg' ).html('`');    
            $('.fname1msg' ).html('`');    
            $('.email1msg' ).html('`');    
            $('.phonemsg' ).html('`');    

            let titles1 = $('.titles1').val(); 
            let fnames1 = $('.fnames1').val(); 
            let email1 = $('.email1').val(); 
            let phones1 = $('.phones1').val(); 

            if (titles1 == "") {
                $('.title1msg' ).append('<b class="text-danger">Choose your title</b>');   
            }else{ 
                $('.title1msg' ).html('`');   
                nilai += 1;  
            }

            if (fnames1 == "") {
                $('.fname1msg').append('<br>`<b class="text-danger">Full Name cannot be empty</b>');  
            }else{ 
                $('.fname1msg' ).html('`');   
                nilai += 1;  
            }


            if (email1 == "") {
                $('.email1msg' ).append('<b class="text-danger">Email cannot be empty</b>');   
            }else{ 
                $('.email1msg' ).html('`');   
                nilai += 1;  
            }
            
            if (phones1 == "") {
                $('.phonemsg' ).append('<b class="text-danger">Mobile Phone/WhatsApp cannot be empty</b>');   
            }else{ 
                $('.phonemsg' ).html('`');   
                nilai += 1;  
            }


            for (let index = 1; index <= penumpang; index++) {
              $('.nametmsg' + [index]).html('`');   
              $('.fnamemsg' + [index]).html('`');  
              $('.idmanmsg' + [index]).html('`');  
              $('.countrymsg' + [index]).html('`');  

              let namet = $('.title' + [index]).val();
              let fname = $('.fname' + [index]).val();
              let idman = $('.idman' + [index]).val();
              let country = $('.country' + [index]).val();


              if (namet == "") {
                  $('.nametmsg' + [index]).append('<b class="text-danger">Choose your title ['+ [index] + '] passenger</b>');   
              }else{
                  $('.nametmsg' + [index]).html('`');   
                  nilai += 1;
              }

              if (fname == "") {
                  $('.fnamemsg' + [index]).append('<br>`<b class="text-danger">Full Name cannot be empty ['+ [index] + '] passenger</b>');  
              }else{
                  $('.fnamemsg' + [index]).html('`');  
                  nilai += 1;
              }

              if (idman == "") {
                  $('.idmanmsg' + [index]).append('<b class="text-danger">KTP/Passport/SIM Number cannot be empty ['+ [index] + '] passenger</b>'); 
              }else{
                  $('.idmanmsg' + [index]).html('`');  
                  nilai += 1;
              }


              if (country == "") {
                  $('.countrymsg' + [index]).append('<b class="text-danger">Country cannot be empty ['+ [index] + '] passenger</b>');  
              }else{
                  $('.countrymsg' + [index]).html('`');  
                  nilai += 1;
              }


 
            }
             

            let totalnilai = (penumpang*4)+4;
            if (nilai != totalnilai) { 
                    Swal.fire({
                          title: 'Error!',
                          html: 'Sorry, the data you entered is incomplete.<br> <b> Code "ERROR:X2022Zf000' + nilai + '"</b>',
                          icon: 'error',                                               
                          confirmButtonText: 'close' 
                    }).then((result) => {
                          if (result.value) {
                                //location.reload();
                          }
                    });

                    return false;
            }
                              
 




        }
 
      /*  */

    $(".country_selector").countrySelect({ 
          responsiveDropdown:true, 
          defaultCountry:"id",  
    });


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
              preferredCountries: ["id"],  
              initialCountry: "auto",

              


              geoIpLookup: function(success, failure) {
                  $.get("https://ipinfo.io/?token=26507ea7ff400b", function() {}, "jsonp").always(function(resp) {
                      var countryCode = (resp && resp.country) ? resp.country : "id";
                      success(countryCode);
                  });
              }, 
              utilsScript: '/assets/intl-tel-input/js/utils.js'
          });

          $(".form-send").submit(function() {
              var full_number = iti.getNumber(intlTelInputUtils.numberFormat.E164 );
              $(".v_format_num").val(full_number); 
          }); 
        
          $(phoneInputID).inputFilter(function(value) {
              return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 999999999999); 
          }, "Must be Number or Max Number"); 
        
        /*  */

