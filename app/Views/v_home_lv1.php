 <div class="section-header ">

   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
     <ol class="carousel-indicators">
       <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
       <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
       <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
       <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
     </ol>
     <div class="carousel-inner">

       <div class="carousel-item active text-center">
         <img class="d-block mx-auto w-100" src="/assets/img/benoa/portofbenoa.gif" alt="First slide">
         <div class="carousel-caption d-none d-md-block">
           <h5>WELCOME</h5>
         </div>
       </div>

       <div class="carousel-item">
         <img class="d-block mx-auto w-100" src="/assets/img/pura-ulun-danu.gif" alt="Second slide">
         <div class="carousel-caption d-none d-md-block">
           <h5>Pura Ulun Danu</h5>
         </div>
       </div>

       <div class="carousel-item  text-center">
         <img class="d-block mx-auto w-100" src="/assets/img/pantaikuta.gif" alt="Second slide">
         <div class="carousel-caption d-none d-md-block">
           <h5>Kuta Beach</h5>
         </div>
       </div>


       <div class="carousel-item">
         <img class="d-block mx-auto w-100" src="/assets/img/sanur.gif" alt="Second slide">
         <div class="carousel-caption d-none d-md-block">
           <h5>Sanur Beach</h5>
         </div>
       </div>

     </div>

     <a class="carousel-control-prev " href="#carouselExampleIndicators" role="button" data-slide="prev">
       <span class="carousel-control-prev-icon " aria-hidden="true"></span>
       <span class="sr-only ">Previous</span>
     </a>

     <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
       <span class="carousel-control-next-icon" aria-hidden="true"></span>
       <span class="sr-only">Next</span>
     </a>

   </div>

 </div>

 <div class="section-body">


    <h2 class="section-title">Select Location</h2>
    <p class="section-lead">select a tourist location that you will visit.</p>

    <div class="row">

      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <article class="article"> 
          <form action="<?=base_url()?>/views/k" method="POST">
            <div class="col-12 col-lg-8 offset-lg-2 pt-4">
              <div class="row">
                <div class="form-group col-12 col-sm-12 col-lg-12 serchlocation "> 
                    <div class="row">
                      <div class="col-12 col-sm-10 col-lg-10 ">
                        <select id="myselect" class="form-control" name="Destination">
                              <option value="0" readonly>Find Destination</option>
                          <?php foreach ($getDestination as $value1) : ?>
                              <option value="<?=$value1->id_destination?>"><?=$value1->nm_destination?></option>
                          <?php endforeach; ?>
                        </select>
                      </div> 
                      <div class="col-12 col-sm-2 col-lg-2 "> 
                        <button type="button" id="viewpictue" class="btn btn-primary btn-block py-2">View</button> 
                      </div> 
                    </div>
                </div>
                <div class="form-group col-12 col-sm-6 col-lg-8 ">
                    <div class="input-group "> 
                        <input type="text" id="datedat" class="form-control border border-primary" placeholder="Select Date" name="dates"/>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary" data-toggle="datepicker">
                                <i class="far fa-calendar-alt" style="padding: 0 2px 0 2px;"></i>
                            </button>
                        </div>
                    </div>   
                </div> 
                <div class="form-group col-12 col-sm-6 col-lg-4 serchpassanger">
                  <select id="myselect3" class="form-control" name="passanger">
                    <option value="0" readonly>- Select Passenger -</option>
                    <?php for ($i = 1; $i <= 8; $i++) : ?>
                      <option value="<?=$i?>"><?= $i ?> Passenger</option>
                    <?php endfor; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-8 offset-lg-2  ">
              <div class="pb-4 text-center">
                <button type="submit" type="button" class="btn btn-primary border">Searching</button>
              </div>
            </div> 
          </form>
        </article>
      </div>

    </div>


    <div class="row">
      <div class="col-12 ">
          <div class="text-center h5 mb-4 " style="color:#191d21">Contact Us</div>
      </div> 
      <div class="col-12 col-sm-6 col-lg-4">
          <div class="card rounded-lg"> 
            <div class="card-body text-center"> 
            <a href = "mailto: Admin@siport.co.id">
                <div class="float-left w-25 my-2" >
                  <img src="<?=base_url()?>/assets/img/ico/mail-outline.png" alt="mail-outline" class="img w-100 ">
                </div>
                <div class="text-left pl-3 pt-2 float-left w-75 my-3 h6 " style="color:#6777ef;">
                  Email : <br>
                  Admin@siport.co.id
                </div>
            </a>
            </div>
          </div>
      </div>
      
      <div class="col-12 col-sm-6 col-lg-4">
          <div class="card rounded-lg"> 
            <div class="card-body text-center"> 
            <a href = "https://api.whatsapp.com/send?phone=62123456789">
                <div class="float-left w-25 my-2" >
                  <img src="<?=base_url()?>/assets/img/ico/logo-whatsapp.png" alt="logo-whatsapp" class="img w-100 ">
                </div>
                <div class="text-left pl-3 pt-2 float-left w-75 my-3 h6 " style="color:#25D366;">
                  WhatsApp : <br>
                  +681 234 567 89
                </div>
            </a>
            </div>
          </div>
      </div>

      
      <div class="col-12 col-sm-6 col-lg-4">
          <div class="card rounded-lg"> 
            <div class="card-body text-center"> 
            <a href = "#">
                <div class="float-left w-25 my-2" >
                  <img src="<?=base_url()?>/assets/img/ico/call-outline.png" alt="logo-whatsapp" class="img w-100">
                </div>
                <div class="text-left pl-3 pt-2 float-left w-75 my-3 h6 " style="color:#191d21;">
                  Phone : <br>
                  ( +621 )111 2222
                </div>
            </a>
            </div>
          </div>
      </div>



    </div>


</div>



    <!-- The Modal -->
    <div class="modal fade" id="VWshowSERCH">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" > 
                    <div id="serchdatabody"></div> 
                </div>


            </div>
        </div>
    </div>