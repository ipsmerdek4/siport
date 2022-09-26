<div class="row">
    <div class="col-12 offset-lg-2 col-lg-8"> 
        
    <div class="section-header row">
            <div class="col-8   ">
                <h2 class="section-title my-3 mx-0 ">Details Order</h2>   
            </div> 
            <div class="col-12   ">
                <hr class="border-bottom-0 border-right-0 border-left-0 border-primary" style="border-width: 2px;">
            </div>    
            <div class="col-12 col-lg-7"> 
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <label for="">Name</label>
                        <div class="h6"><?=$Transaksi->title_order?>. <?=$Transaksi->name_order?></div> 
                    </div>  
                    <div class="col-12 col-lg-12 mt-2 mt-lg-2">
                        <label for="">Email</label> 
                        <div class="h6"><?=$Transaksi->email_order?></div> 
                    </div> 
                    <div class="col-12 col-lg-12 mt-2 mt-lg-3"> 
                        <label for="">Mobile Phone/WhatsApp</label>  
                        <div class="h6"><?=$Transaksi->phone_order?></div> 
                    </div>
                    <div class="col-12 col-lg-12 mt-2 mt-lg-2">
                        <label for="">Passenger</label> 
                        <div class="h6"><?=$Transaksi->total_passenger?> Seat</div> 
                    </div> 
                </div>
            </div>   
            <div class="col-12 col-lg-5"> 
                <div class="row">
                    <div class="col-12 mt-0 pt-0 d-lg-none d-inline-block">
                        <hr class="border-bottom-0 border-right-0 border-left-0 border-primary" style="border-width: 2px;">
                    </div>  
                    <div class="col-12 col-lg-12 ">
                        <label for="">Destination</label>
                        <div class="h6"><?=$Destination->nm_destination?></div> 
                    </div>  
                    <div class="col-12 col-lg-12 mt-2 mt-lg-3 "> 
                        <label for="">Price</label>  
                        <div class="h6 "> 
                                <b><?=$Transaksi->total_passenger?>&nbsp;&nbsp;</b>
                                <i class="ion-close ">&nbsp;&nbsp;</i>
                                 <?="Rp " . number_format($Departure->price,2,',','.')?> 
                        </div> 
                    </div>
                    <div class="col-12 mt-0 pt-0">
                        <hr class="border-bottom-0 border-right-0 border-left-0 border-primary" style="border-width: 2px;">
                    </div>  
                    <div class="col-12 col-lg-12 "> 
                        <label for="">Total</label>  
                        <div class="h6"> 
                                 <?="Rp " . number_format($Transaksi->total_price,2,',','.')?> 
                        </div> 
                    </div>  
                </div>
            </div>   
 
        </div> 
 



        <div class="section-header row">
            <div class="col-8   ">
                <h2 class="section-title my-3 mx-0 ">Checkout</h2>   
            </div> 
            <div class="col-12   ">
                <hr class="border-bottom-0 border-right-0 border-left-0 border-primary" style="border-width: 2px;">
            </div>     
            <div class="col-12  "> 
                <img src="<?=base_url()?>/assets/img/ico/visa.png" alt="" class="img  " style="width:50px;">
                <img src="<?=base_url()?>/assets/img/ico/master.png" alt="" class="img  " style="width:60px;">
                <img src="<?=base_url()?>/assets/img/ico/amex.png" alt="" class="img   "  style="width:50px;">
            </div>     
            <div class="col-12 mt-3">
                <div class="form-group ">
                    <label class="text-primary ">Card Number</label> 
                    <input type="text" class="form-control border border-primary card-number" placeholder="-" style="letter-spacing:5px" value="4916994064252017"  > 
                    <small class="cardnumbermsg"></small>
                </div> 
            </div>  
            <div class="col-12">
                <div class="form-group ">
                    <label class="text-primary ">Cardholder Name</label> 
                    <input type="text" class="form-control border border-primary name-numbers" placeholder="-" style="letter-spacing:2px" value="Azriel"> 
                    <small class="cardholdermsg"></small>
                </div> 
            </div>  
            <div class="col-12">
                <div class="form-group row ">
                    <label class="col-12 text-primary">Expiration Date (MM/YYYY)</label>  
                    <div class="col-5 col-sm-2">
                        <input type="text" class="form-control border border-primary card-expiry-month"  placeholder="MM" value="01" > 
                    </div>
                    <h3 class="col-2 col-sm-1 text-primary text-center mt-2 mb-0">/</h3>  
                    <div class="col-5 col-sm-2">
                        <input type="text" class="form-control border border-primary card-expiry-year"  placeholder="YYYY" value="2025" > 
                    </div>  
                    <div class="col-12">
                        <small class="expirationmsg1"></small>
                        <small class="expirationmsg2"></small>
                    </div>  
                </div>  
            </div>  
            <div class="col-12">
                <div class="form-group row">
                    <label class="col-12 text-primary ">CVV</label> 
                    <div class="col-5 col-sm-2">
                        <input class="form-control border border-primary card-cvv" type="password"  placeholder="***" value="123"> 
                    </div> 
                    <div class="col-12">
                        <small class="cvvmsg"></small> 
                    </div>  
                </div> 
            </div>  
            <div class="col-12   ">
                <hr class="border-bottom-0 border-right-0 border-left-0 border-primary" style="border-width: 2px;">
            </div>   
            <?php
                /* function excrip and descript */
                function encrypt_descrip($action, $string) {
                    $output = false;
                    $encrypt_method = "AES-256-CBC";
                    $secret_key = 'asdadoaudo8asudoaud8o';
                    $secret_iv = '555555334342423';
                    // hash
                    $key = hash('sha256', $secret_key);
                
                    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
                    $iv = substr(hash('sha256', $secret_iv), 0, 16);
                    if ( $action == 'encrypt' ) {
                        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
                        $output = base64_encode($output);
                    } else if( $action == 'decrypt' ) {
                        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
                    }
                    return $output;
                }

                $id_encrypt = encrypt_descrip('encrypt', $Transaksi->id_transaksi );

            ?> 
            <input class="id_encrypt" type="hidden" value="<?=$id_encrypt?>" readonly>
            <div class="col-12 text-center  "> 
                <button class="btn btn-primary submit-button-visa">Submit Payment</button>
            </div>   
 
        </div> 
 
    </div> 
       
</div>



<!-- <div class="section-body"> </div> -->


 