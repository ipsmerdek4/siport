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
      <script>



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