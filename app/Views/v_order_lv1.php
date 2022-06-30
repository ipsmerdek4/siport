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
        <div class="section-header ">
              asdas
        </div> 
    </div>
</div>



<!-- <div class="section-body"> </div> -->


 