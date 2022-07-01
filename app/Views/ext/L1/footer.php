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


    <?php elseif ($menu == "Home_order") : ?> 


    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-tY7QOp5fnqXQfQHM"></script>
 
      <script>

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


                                alert(dataObj.payment_type + " " + dataObj.status_message + " " + dataObj.bank + " " + dataObj.gross_amount + " " + dataObj.order_id  + " " + dataObj.transaction_id + " " + dataObj.transaction_time + " " + dataObj.masked_card);
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
                                });  */
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
                                });  */
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
                                });   */
                          }
                      });



                  }
              }
            });


        });

 


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
                    $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                        var countryCode = (resp && resp.country) ? resp.country : "id";
                        success(countryCode);
                    });
                }, 
                utilsScript: '/assets/intl-tel-input/js/utils.js'
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