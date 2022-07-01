<div class="row">
    <div class="col-lg-7"> 
        <div class="section-header row">
            <div class="col-12   ">
                <h2 class="section-title my-3 mx-0 ">Order Details</h2>  
            </div> 
            <div class="col-12   ">
                <hr class="border-bottom-0 border-right-0 border-left-0 border-primary" style="border-width: 2px;">
            </div>   
            <div class="col-12 col-lg-3  mt-lg-3">
                <div class="form-group ">
                <label class="text-primary d-none d-lg-inline-block">Titel</label>
                <label class="text-primary d-lg-none">Titel & Full Name</label>
                    <select name="" id="" class="form-control border border-primary select-arrow">
                      <option value="">None</option>
                      <option value="">Mr</option>
                      <option value="">Mrs</option>
                    </select>
                 </div>  
            </div>  
            <div class="col-12 col-lg-9 mt-lg-3">
                <div class="form-group ">  
                    <label class="text-primary d-none d-lg-inline-block">Full Name</label> 
                    <input type="text" class="form-control border border-primary" placeholder="Full Name based on (KTP/Passport/SIM)"> 
                </div>  
            </div>  
            <div class="col-12 col-lg-12 ">
                <div class="form-group">  
                    <label class="text-primary">Email</label>  
                    <input type="email" class="form-control border border-primary  " placeholder="email@email.com"> 
                </div>  
            </div>  
            <div class="col-12 col-lg-12 ">
                <div class="form-group">  
                    <label class="text-primary">Mobile Phone/WhatsApp</label>  
                    <input type="text" id="phone" class="form-control border border-primary v_g_HP w-100" placeholder="Number Mobile Phone/WhatsApp"> 
                </div>  
            </div>  
        </div> 

        <?php for ($i=1; $i <= $penumpang; $i++) :?>
        
        <div class="section-header row">
            <div class="col-12   ">
                <h2 class="section-title my-3 mx-0 ">Passenger Details [ <?=$i?> ]</h2>  
            </div> 
            <div class="col-12   ">
                <hr class="border-bottom-0 border-right-0 border-left-0 border-primary" style="border-width: 2px;">
            </div>   
            <div class="col-12 col-lg-3  mt-lg-3">
                <div class="form-group ">
                <label class="text-primary d-none d-lg-inline-block">Titel</label>
                <label class="text-primary d-lg-none">Titel & Full Name</label>
                    <select name="" id="" class="form-control border border-primary select-arrow">
                      <option value="">None</option>
                      <option value="">Mr</option>
                      <option value="">Mrs</option>
                    </select>
                 </div>  
            </div>  
            <div class="col-12 col-lg-9 mt-lg-3">
                <div class="form-group ">  
                    <label class="text-primary d-none d-lg-inline-block">Full Name</label> 
                    <input type="text" class="form-control border border-primary" placeholder="Full Name based on (KTP/Passport/SIM)"> 
                </div>  
            </div>  
            <div class="col-12 col-lg-12 ">
                <div class="form-group">  
                    <label class="text-primary">KTP/Passport/SIM Number</label>  
                    <input type="email" class="form-control border border-primary" placeholder="KTP/Passport/SIM Number"> 
                </div>  
            </div>   
            <div class="col-12 col-lg-12 ">
                <div class="form-group">  
                    <label class="text-primary">Country</label>  
                    <input class="form-control border border-primary w-100 country_selector" type="text">
                </div>  
            </div>  
        </div> 
    
        <?php endfor; ?>
        
    </div>
    <div class="col-lg-5">
        <div class="section-header"> 
            <div class="row w-100 m-0">
                <div class="col-12 ">
                    <h2 class="section-title my-3 mx-0 ">Departure</h2>  
                </div> 
                <div class="col-12">
                    <hr class="border-bottom-0 border-right-0 border-left-0 border-primary" style="border-width: 2px;">
                </div>  
                <div class="col-12 pt-3"> 
                    <div class="h6 row text-center " style="font-size:18px">
                        <img src="<?=base_url()?>/assets/img/ico/pelindo.png" alt="pelindo.png" class="img col-8 col-sm-3 col-lg-4 " >
                        <i class="ion-arrow-right-c text-primary col-12 col-lg-1 text-center text-lg-left "></i>
                        <div class="col-12 col-lg-7 text-primary text-lg-left "><?=$getDeparture->nm_destination?></div>
                    </div>
                </div>  
                <div class="col-12 pt-3">  
                    <div class="h6 pt-4 pt-lg-1 clearfix text-primary ">
                        <div class="d-flex justify-content-center justify-content-lg-start">
                        <i class="ion-android-calendar float-left text-primary mr-1 " style="font-size:22px"></i> 
                        <div class="float-left pt-1 ml-1 " ><?=$getDeparture->date_of_departure?></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 pt-3">  
                    <div class="h6 clearfix text-primary mb-5 mb-lg-0">
                        <div class="d-flex justify-content-center justify-content-lg-start"> 
                        <i class="ion-android-contacts float-left text-primary mr-1" style="font-size:22px"></i>
                        <div class="float-left pt-1 ml-1" ><b><?=$penumpang?></b> Passenger </div> 
                        </div>
                    </div>
                </div>  
                <div class="col-12">
                    <hr class="border-bottom-0 border-right-0 border-left-0 border-primary" style="border-width: 2px;">
                </div>  
                <div class="col-12"> 
                    <div class="clearfix">
                        <div class="float-left h6"><b>TOTAL</b></div> 
                        <div class="float-right h6"><b><?="Rp " . number_format($getDeparture->price*$penumpang,2,',','.')?></b></div>  
                    </div>
                </div> 
            </div> 
        </div> 
        

            <?php
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

                $encrypt = encrypt_descrip('encrypt', $getDeparture->price*$penumpang.'*'.$getDeparture->id_departure);
            ?>


        <div class="section-header"> 
            <div class="row w-100 m-0">
                <div class="col-12 "> 
                    <button class="btn btn-primary btn-block p-2" data-price="<?=$encrypt?>" id="pay-button" style="font-size:18px">Payment</button> 
                </div> 
                
                <div class="col-12 "> 
                    <p class="showdetail"></p>
                </div>

            </div> 
        </div> 

    </div>

       
</div>



<!-- <div class="section-body"> </div> -->


 