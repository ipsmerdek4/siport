<div class="main-content p-0 pt-5 ">
  <section class="section pt-3 pt-sm-5">

        <div class="section-header d-sm-none mt-4 pb-0 mb-0 shadow-none bg-transparent">
          <h1 class="text-center text-danger w-100">Register</h1>
        </div>

        
        <div class="section-body bg-danger mx-2 mx-lg-0">
           
            <div class="row m-0 ">
            <div class="col-12 col-md-6 col-lg-6 pt-5 py-lg-0 ">
                  <div class="d-flex flex-column justify-content-center align-items-center h-100 w-100 text-white ">
                    <div class="text-center mb-2">
                        <span class="ion ion-android-hand float-left mr-1 mr-lg-3 font-sz-3 "></span>
                        <div class="float-left font-sz-2_3 " >Hello Traveler</div> 
                    </div> 
                    <p class="text-center ">
                      Don't forget to register, if you don't have an account.
                    </p>
                  </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 p-0">
                <div class="card rounded-0 m-1">
                  <div class="card-header mx-2 w-50 d-none d-sm-inline-block border-bottom border-danger pt-4 mb-5">
                    <h4 class="card-title text-danger text-center font-weight-bold text-uppercase ">Register</h4>
                  </div>
                  <div class="card-body pt-3 pt-lg-0 text-danger pb-0"> 
                    <form action="<?=base_url()?>/regto" method="POST" class="form-regist">
                      
                      <div class="row  ">  
                        <div class="col-12 col-sm-6 form-group my-1"> 
                            <label class="text-danger font-weight-bold ">Mobile Phone Number</label>
                            <input id="phone" type="text" class="form-control border border-danger v_g_HP" name="g_HP"> 
                        </div>   
                        
                        <div class="col-12 col-sm-6 form-group my-1"> 
                            <label class="text-danger font-weight-bold ">Email</label>
                            <input type="email" class="form-control border border-danger" placeholder="your@email.com" name="g_email"> 
                        </div>  
                      </div>
                      <div class="row  ">
                        <div class="col-12 col-sm-6 form-group my-1"> 
                          <label class="text-danger font-weight-bold ">Username</label>
                          <input type="text" class="form-control border border-danger " placeholder="Username" name="u_name">
                        </div>

                        <div class="col-12 col-sm-6 form-group my-1">
                          <label class="text-danger font-weight-bold ">Password</label>
                          <div class="input-group mb-3">
                            <input type="password" class="form-control border border-danger u-pass-d" name="u_pass" placeholder="Password ">
                            <div class="input-group-append">
                              <button class="btn btn-danger btn--pass hide pt-2 pb-0" type="button">
                                <span id="ico-pass" class="ion-ios-eye" style="font-size:25px;"></span>
                              </button>
                            </div>
                          </div>
                        </div>

 
                      </div>

                      <div class="row">
                        <div class="col-12 form-group text-center">    
                            <button class="btn btn-danger btn-block"  style="font-size:14px; ">  
                                <span class="ion ion-load-c" data-pack="ios" data-tags="security, padlock, safe" style="font-size:14px; " ></span>  
                                Register
                            </button>  
                        </div>
                      </div>
                    </form>
                  </div>  
                </div> 
                
                <div class="card rounded-0 m-1 ">
                  <div class="card-body" >
                    <div class=" mt-1 w-100 "> 
                      <div class="col-lg-10 mx-auto">   
                        <div class="w-100 mt-1 text-center">
                          Have an account? 
                          <a class="text-success font-weight-bold" href="<?=base_url()?>/login">Login</a>
                        </div>
                      </div> 
                    </div>  
                  </div> 
                </div>
              </div>
            </div>


        </div>



   <!--  -->       
  </section>
</div>


