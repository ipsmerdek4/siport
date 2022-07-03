<!--  -->
</section>
</div>

<footer class="main-footer">
  <div class="footer-left">
    Copyright &copy; 2022 <div class="bullet"></div> Template By <a href="https://getstisla.com/">STISLA</a>
  </div>
  <div class="footer-right">
  </div>
</footer>
</div>
</div>
  


<!-- General JS Scripts -->
<script src="<?= base_url() ?>/stisla/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>/stisla/node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url() ?>/stisla/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/stisla/node_modules/nicescroll/dist/jquery.nicescroll.min.js"></script>
<script src="<?= base_url() ?>/stisla/node_modules/moment/min/moment.min.js"></script>
<script src="<?= base_url() ?>/stisla/assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="<?=base_url()?>/assets/sweetalert2/dist/sweetalert2.all.min.js"></script>

<script src="<?= base_url() ?>/assets/select2/dist/js/select2.min.js"></script>
<script src="<?=base_url()?>/assets/intl-tel-input/js/intlTelInput.js"></script> 

<script src="<?=base_url()?>/assets/Datetime/dayjs-f/dayjs/dayjs.min.js"></script> 
<script src="<?=base_url()?>/assets/Datetime/dayjs-f/datepicker-bs4.js"></script> 
 
<script src="<?=base_url()?>/assets/country-picker-flags/build/js/countrySelect.js"></script>

 
<!-- Page Specific JS File -->
<script src="<?= base_url() ?>/stisla/assets/js/page/modules-ion-icons.js"></script>

<!-- Template JS File -->
<script src="<?= base_url() ?>/stisla/assets/js/scripts.js"></script>
<script src="<?= base_url() ?>/stisla/assets/js/custom.js"></script>

<?php if (isset($menu)) : ?> 
    <?php if ($menu == "Home_view") : ?> 


        <!-- kosong -->

    <?php elseif ($menu == "Home_visa") : ?> 

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/featherlight/1.7.12/featherlight.min.js"></script>
      <script id="midtrans-script" type="text/javascript" src="https://api.midtrans.com/v2/assets/js/midtrans-new-3ds.min.js" data-environment="sandbox" data-client-key="SB-Mid-client-tY7QOp5fnqXQfQHM"></script>

      <script>


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

          $(document).ready(function() {

                  $('.card-number').inputFilter(function(value) {
                      return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 9999999999999999); 
                  }, "Max 16 Digit Number"); 

                  $('.card-expiry-month').inputFilter(function(value) {
                      return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 99); 
                  }, "Max 2 Digit Number"); 

                  $('.card-expiry-year').inputFilter(function(value) {
                      return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 9999); 
                  }, "Max 4 Digit Number"); 

                  var options = {
                      performAuthentication: function(redirect_url){
                          openDialog(redirect_url);
                      },
                      onSuccess: function(response){ 
                          $.ajax({
                              type: "post",
                              url: "/checkout/request",
                              data: {
                                id_encrypt: $('.id_encrypt').val(), 
                                order_id: response.order_id,
                                bank: response.bank, 
                                payment_type: response.payment_type,
                                currency: response.currency,
                                gross_amount: response.gross_amount,
                                no_card: $('.card-number').val(),
                                name_card: $('.name-numbers').val(),
                                transaction_status: response.transaction_status,
                                status_message: response.status_message,
                                transaction_time: response.transaction_time
                              },
                              dataType: "json",
                              success: function (response) {
                                  console.log(response); 
                                  if (response.sts == 200) { 
                                    closeDialog(); 
                                    Swal.fire({
                                              title: 'Success',
                                              text: 'Your Payment is Successful',
                                              icon: 'success',
                                              confirmButtonText: 'close'
                                            }) 
                                  }
                              }
                          });


                      },
                      onFailure: function(response){ 
                        $.ajax({
                              type: "post",
                              url: "/checkout/request",
                              data: {
                                id_encrypt: $('.id_encrypt').val(), 
                                order_id: response.order_id,
                                bank: response.bank, 
                                payment_type: response.payment_type,
                                currency: response.currency,
                                gross_amount: response.gross_amount,
                                no_card: $('.card-number').val(),
                                name_card: $('.name-number').val(),
                                transaction_status: response.transaction_status,
                                status_message: response.status_message,
                                transaction_time: response.transaction_time
                              },
                              dataType: "json",
                              success: function (responseX) { 
                                    closeDialog(); 
                                    Swal.fire({
                                          title: 'Error',
                                          text: response.status_message,
                                          icon: 'error',                                               
                                          confirmButtonText: 'close' 
                                    }).then((result) => {
                                          if (result.value) {
                                                location.reload();
                                          }
                                    });

                              }
                          }); 
                      },
                      onPending: function(response){
                          $.ajax({
                              type: "post",
                              url: "/checkout/request",
                              data: {
                                id_encrypt: $('.id_encrypt').val(), 
                                order_id: response.order_id,
                                bank: response.bank, 
                                payment_type: response.payment_type,
                                currency: response.currency,
                                gross_amount: response.gross_amount,
                                no_card: $('.card-number').val(),
                                name_card: $('.name-number').val(),
                                transaction_status: response.transaction_status,
                                status_message: response.status_message,
                                transaction_time: response.transaction_time
                              },
                              dataType: "json",
                              success: function (responseX) { 
                                    closeDialog(); 
                                    Swal.fire({
                                          title: 'Error',
                                          text: response.status_message,
                                          icon: 'error',                                               
                                          confirmButtonText: 'close' 
                                    }).then((result) => {
                                          if (result.value) {
                                                location.reload();
                                          }
                                    });

                              }
                          }); 
                      }
                  };

                  function openDialog(url) {
                      $.featherlight({
                          iframe: url, 
                          iframeMaxWidth: '100%', 
                          iframeWidth: 450, 
                          iframeHeight: 500,
                          closeOnClick: false,
                          closeOnEsc: false,
                          closeIcon: 'X'
                      });
                  }

                  function closeDialog() {
                      $.featherlight.close();
                  }
 
                  $(".submit-button-visa").click(function (event) { 
                      $('.cardnumbermsg').html(' ');
                      $('.cardholdermsg').html(' ');
                      $('.expirationmsg1').html(' ');
                      $('.expirationmsg2').html(' ');
                      $('.cvvmsg').html(' '); 
                      
                      var nilaix = 0;
                      let name = $('.name-numbers').val();
                      var card = {
                          "card_number": $(".card-number").val(),
                          "card_exp_month": $(".card-expiry-month").val(),
                          "card_exp_year": $(".card-expiry-year").val(),
                          "card_cvv": $(".card-cvv").val()
                      }; 
 
                      event.preventDefault(); 

                      if (card.card_number == "") {  
                          $('.cardnumbermsg').append('<b class="text-danger">Card Number cannot be empty</b>');
                      }else{  
                          $('.cardnumbermsg').html(' ');
                          nilaix += 1;  
                      }
                       
                      if (name == "") {  
                          $('.cardholdermsg').append('<b class="text-danger">Cardholder Name cannot be empty</b>');
                      }else{  
                          $('.cardholdermsg').html(' ');
                          nilaix += 1;  
                      }
                       
                      if (card.card_exp_month == "") {  
                          $('.expirationmsg1').append('<b class="text-danger">Expiration Date Month cannot be empty</b>');
                      }else{  
                          $('.expirationmsg1').html(' ');
                          nilaix += 1;  
                      }
                      
                      if (card.card_exp_year == "") {  
                          $('.expirationmsg2').append('<b class="text-danger"><br>Expiration Date Year cannot be empty</b>');
                      }else{  
                          $('.expirationmsg2').html(' ');
                          nilaix += 1;  
                      }
                      
                      if (card.card_cvv == "") {  
                          $('.cvvmsg').append('<b class="text-danger">Card CVV cannot be empty</b>');
                      }else{  
                          $('.cvvmsg').html(' ');
                          nilaix += 1;  
                      }
                        
                       
                      if (nilaix == 5) {
                            MidtransNew3ds.getCardToken(card, getCardTokenCallback);  
                            return false;  
                      }else{ 
                        return false;  
                      }
                       

                  });


                  // callback functions
                  var getCardTokenCallback = {
                      onSuccess: function(response) { 
                          var token_id = response.token_id;  
                          var id_encrypt = $('.id_encrypt').val();  
                          $.ajax({
                              type: 'POST',
                              url: '/checkout', 
                              data: {
                                token_id: token_id,
                                id_encrypt: id_encrypt,
                              },
                              dataType: "json",
                              success: function(responseX){  
                                  let dataResult = JSON.stringify(responseX, null, 2);
                                  let dataObj = JSON.parse(dataResult); 
                                  if (dataObj.redirect_url){ 
                                      MidtransNew3ds.authenticate(dataObj.redirect_url, options); 
                                  }  
                              },
                              error: function(xhr, status, error){
                                  console.error(xhr);
                              }
                          });
                             
                      },
                      onFailure: function(response) { 
                          console.log('Fail to get card token_id, response:', response);
                          closeDialog(); 
                      }
                  };
 


                    /* 
                      $("#pay-button").click(function(e){
                        e.preventDefault(); 
                        const price = $(this).data("price");
              
                        $.ajax({
                            type: "post",
                            url: "/trans/k",
                            data: {
                                prices: price,
                            },
                            dataType: "json",
                            success: function (response) {
                                if (response.error) { 
                                      Swal.fire('error', response.error, 'error');
                                }else{ 
                                    snap.pay(response.snapToken, {   
                                        onSuccess: function(result){  
                                              let dataResult = JSON.stringify(result, null, 2);
                                              let dataObj = JSON.parse(dataResult);

                                            alert(dataResult);
                                            // alert(dataObj.payment_type + " " + dataObj.status_message + " " + dataObj.bank + " " + dataObj.gross_amount + " " + dataObj.order_id  + " " + dataObj.transaction_id + " " + dataObj.transaction_time + " " + dataObj.masked_card);
                                            /*  $.ajax({
                                                type: "post",
                                                url: "/trans/kv",
                                                data: {
                                                  payment_type: dataObj.payment_type,
                                                  order_id: dataObj.order_id,
                                                  gross_amount: dataObj.gross_amount,
                                                  va_numbers: dataObj.va_numbers[0].va_number,
                                                  bank: dataObj.va_numbers[0].bank,
                                                },
                                                dataType: "json",
                                                success: function (response) {
                                                    $('.showdetail').html(response);
                                                }
                                              });   
                                        },
                                        // Optional
                                        onPending: function(result){
                                              let dataResult = JSON.stringify(result, null, 2);
                                              let dataObj = JSON.parse(dataResult);


                                              alert(dataObj.payment_type + " " + dataObj.status_message + " " + dataObj.va_numbers[0].bank + " " + dataObj.va_numbers[0].va_number + " " + dataObj.gross_amount + " " + dataObj.order_id  + " " + dataObj.transaction_id + " " + dataObj.transaction_time  + " " + dataObj.transaction_status);

                                            /*  
                                              $.ajax({
                                                type: "post",
                                                url: "/trans/kv",
                                                data: {
                                                  order_id: dataObj.order_id,
                                                  gross_amount: dataObj.gross_amount,
                                                  va_numbers: dataObj.va_numbers[0].va_number,
                                                  bank: dataObj.va_numbers[0].bank,
                                                },
                                                dataType: "json",
                                                success: function (response) {
                                                    $('.showdetail').html(response);
                                                }
                                              });   
                                        },
                                        // Optional
                                        onError: function(result){ 

                                              Swal.fire('error', response.error, 'error');
                                              /* 
                                              $.ajax({
                                                type: "post",
                                                url: "/trans/kv",
                                                data: {
                                                  order_id: dataObj.order_id,
                                                  gross_amount: dataObj.gross_amount,
                                                  va_numbers: dataObj.va_numbers[0].va_number,
                                                  bank: dataObj.va_numbers[0].bank,
                                                },
                                                dataType: "json",
                                                success: function (response) {
                                                    $('.showdetail').html(response);
                                                }
                                              });  
                                        }
                                    });



                                }
                            }
                          });


                      });
                    */
  

          });



      </script>

    <?php elseif ($menu == "Home_order") : ?> 
 
 <!--    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-tY7QOp5fnqXQfQHM"></script>
  -->
      <script>
           
           function validasi( ) {    
              var nilai = 0;
              let penumpang = <?=$penumpang?>;  

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


                //alert(namet + ", " + fname + ", " + idman + ", " + country);

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


      </script>

    <?php else: ?>
        <script src="<?= base_url() ?>/assets/js/home.js"></script>
    <?php endif; ?>
<?php else: ?>
    <script src="<?= base_url() ?>/assets/js/home.js"></script> 
<?php endif; ?>
 
 

<script>

  

</script>


</body>

</html>