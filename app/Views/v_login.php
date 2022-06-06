<div class="main-content p-0 pt-5 ">
  <section class="section pt-3 pt-sm-5">

        <div class="section-header d-sm-none mt-2 pb-0 mb-0 shadow-none bg-transparent">
          <h1 class="text-center text-success w-100" style="letter-Spacing:2px;">Login</h1>
        </div>

        
        <div class="section-body bg-success mx-2 mx-lg-0">
           
            <div class="row m-0 ">
            <div class="col-12 col-md-6 col-lg-6 pt-5 py-lg-0 ">
                  <div class="d-flex flex-column justify-content-center align-items-center h-100 w-100 text-white ">
                    <div class="text-center mb-2">
                        <span class="ion ion-android-hand float-left mr-1 mr-lg-3 font-sz-3 "></span>
                        <div class="float-left font-sz-2_3 " >Hello Traveler</div> 
                    </div> 
                    <p class="text-center ">
                      Please login first to order and make transactions.
                    </p>
                  </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 p-0">
                <div class="card rounded-0 m-1 ">
                  
                  <div class="card-header ml-2 mr-2 w-50 d-none d-sm-inline-block border-bottom border-success pt-4 mb-5">
                    <h4 class="card-title text-success text-center font-weight-bold text-uppercase ">login</h4>
                  </div> 
                  <div class="card-body pt-3 pt-lg-0 pb-0 text-success"> 
                    <form action="<?=base_url()?>/slog" method="POST">
                      <div class="form-group ">
                        <label class="text-success font-weight-bold ">Username</label>
                        <input type="text" class="form-control border border-success" name="u_name" placeholder="Username/Mobile Phone/Email">
                      </div>
                      <div class="form-group ">
                        <label class="text-success font-weight-bold ">Password</label>
                        <input type="text" class="form-control border border-success" name="p_name" placeholder="Password">
                      </div>
                      <div class="form-group text-center">   
                          <button class="btn btn-success btn-block " style="font-size:14px; ">  
                              <span class="ion ion-log-in" data-pack="ios" data-tags="security, padlock, safe" style="font-size:14px; " ></span>  
                              Login
                          </button>
                      </div>
                    </form> 
                  </div>
                </div> 

                <div class="card rounded-0 m-1 ">
                  <div class="card-body" >
                    <div class=" mt-1 w-100 "> 
                      <div class="col-lg-10 mx-auto">   
                        <div class="w-100 mt-1 text-center">
                          Don't have an account? 
                          <a class="text-danger font-weight-bold" href="<?=base_url()?>/register">Register</a>
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


