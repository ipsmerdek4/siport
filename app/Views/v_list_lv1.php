 <div class="section-header row">
  
        <div class="col-12 col-lg-3 ">
            <img src="<?=base_url()?>/uploads/destination/<?=$getDestination->picture_destination?>" class="img w-100 my-3 border border-primary p-2 rounded" alt="<?=$getDestination->picture_destination?>">
        </div>
        <div class="col-12 col-lg-6 ">
          <div class="h6 text-primary row" style="font-size:18px">
            <img src="<?=base_url()?>/assets/img/ico/pelindo.png" alt="pelindo.png" class="img col-8 col-sm-3 col-lg-3 mx-auto" >
            <i class="ion-arrow-right-c text-primary col-12 col-lg-1 text-center text-lg-left"></i>
            <div class="col-12 col-lg-8 text-center text-lg-left"><?=$getDestination->nm_destination?></div>
          </div>
          <div class="h6 pt-4 pt-lg-1 clearfix text-primary ">
            <div class="d-flex justify-content-center justify-content-lg-start">
              <i class="ion-android-calendar float-left text-primary mr-1 " style="font-size:22px"></i> 
              <div class="float-left pt-1 ml-1 " ><?=$tgl?></div>
            </div>
          </div>
          <div class="h6 clearfix text-primary mb-5 mb-lg-0">
            <div class="d-flex justify-content-center justify-content-lg-start"> 
              <i class="ion-android-contacts float-left text-primary mr-1" style="font-size:22px"></i>
              <div class="float-left pt-1 ml-1" ><?=$penumpang?> Passenger </div> 
            </div>
          </div>
        </div> 
        <div class="lcol-12 col-lg-3 text-center">
            <a href="<?=base_url()?>" class="btn btn-primary">Change Search</a> 
        </div>
   

 </div>

 <div class="section-body">


    <!-- <h2 class="section-title mb-3">Filter</h2>
    <div class=" ml-5">
        <select name="" id="" class="form-control col-10 col-lg-3">
            <option value="">Lowest Price</option>
            <option value="">Earliest Departure</option>
            <option value="">Last Departure</option>
        </select>
    </div>  -->

    <div class="row mt-3"> 

    <?php foreach ($getDeparture as $value) : ?>
      <?php
        
          $datedata = strtotime($value->date_of_departure);
          $dateskrang = strtotime(date("Y-m-d h:i A"));
          if (($datedata <> $dateskrang)&&(!$value->book_seat > 0)) : ?>
             
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <article class="article">  
            <div class="row pb-5">
                <div class="col-12 col-lg-6">
                  <div class="mx-2 px-3 pt-4 h6"><?=$value->plat_number?></div>
                </div>
                <div class="col-12 col-lg-6">
                  <div class="mx-2 px-3 pt-4 h6"><b><?=$value->date_of_departure?></b></div>
                </div>
                <div class="col-12 col-lg-2">
                      <div class="py-2 mb-4 ml-2 text-center ">
                      <img src="<?=base_url()?>/uploads/driver/pic_driver/<?=$value->picture?>" class="img col-6 col-lg-12" alt="<?=$value->picture?>">
                        <!-- <img src="<?=base_url()?>/stisla/assets/img/avatar/avatar-3.png" class="img col-6 col-lg-12" alt=""> -->
                      </div>
                </div>
                <div class="col-12 col-lg-3 align-self-center text-center text-lg-left ">
                           <div class="h6 "><?=$value->full_name?></div> 
                          <div class="h6 ">Vehicle : <?=$value->nm_vehicle?></div>
                 </div>
                <div class="col-12 col-lg-2 align-self-center text-center ">
                <div class="">Seat</div>
                <div class="">Ready <?=$value->book_seat?>/<?=$value->seat?></div>
                </div>
                <div class="col-12 col-lg-2 align-self-center text-center ">
                <div class=" ">Price</div>
                <div class=" "> <?="Rp " . number_format($value->price,2,',','.');?> </div>
                </div>
                <div class="col-12 col-lg-3 align-self-center text-center ">
                  <form action="<?=base_url()?>/departure/k" method="post">
                    <input type="hidden" value="<?=$value->id_departure ?>*<?=$penumpang?>" readonly name="orderk">
                    <button class="btn btn-primary px-5 my-3">Order</button>
                  </form>
                </div>

            </div>  
        </article>
      </div>

          <?php endif; ?>
    <?php endforeach; ?>

    


    </div>

 

</div>


 