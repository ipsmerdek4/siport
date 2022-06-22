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

<?php
define("encryption_method", "AES-128-CBC");
define("key", "123GOFKS");

function encrypt($data) {
    $key = key;
    $plaintext = $data;
    $ivlen = openssl_cipher_iv_length($cipher = encryption_method);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
    $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);
    return $ciphertext;
} 


?>






<!-- General JS Scripts -->
<script src="<?= base_url() ?>/stisla/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>/stisla/node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url() ?>/stisla/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/stisla/node_modules/nicescroll/dist/jquery.nicescroll.min.js"></script>
<script src="<?= base_url() ?>/stisla/node_modules/moment/min/moment.min.js"></script>
<script src="<?= base_url() ?>/stisla/assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="<?= base_url() ?>/assets/select2/dist/js/select2.min.js"></script>

<script src="<?=base_url()?>/assets/Datetime/dayjs-f/dayjs/dayjs.min.js"></script> 
<script src="<?=base_url()?>/assets/Datetime/dayjs-f/datepicker-bs4.js"></script> 

<!-- Page Specific JS File -->
<script src="<?= base_url() ?>/stisla/assets/js/page/modules-ion-icons.js"></script>

<!-- Template JS File -->
<script src="<?= base_url() ?>/stisla/assets/js/scripts.js"></script>
<script src="<?= base_url() ?>/stisla/assets/js/custom.js"></script>

<script src="<?= base_url() ?>/assets/js/home.js"></script>
 


<script src="<?= base_url() ?>/assets/scure/dist/cryptojs-aes.min.js"></script>
<script src="<?= base_url() ?>/assets/scure/dist/cryptojs-aes-format.js"></script>

<script>

 
$('#submit').click(function() {
  var destination = $('#myselect').val();   
  var date = $('#datedat').val();   
  var passanger = $('#myselect3').val();    
  var link = "destination=" + destination + "&date=" + date + "&passanger=" + passanger; 
  /*  */ 
        let password = '123456'
        let encrypted = CryptoJSAesJson.encrypt(link, password) 
    
  /*  */  
  var newlink = "/views/s?dof=" + encrypted  ; 
 
  window.location.href = newlink;   
});


</script>


</body>

</html>