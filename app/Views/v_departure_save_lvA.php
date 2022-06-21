<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Departure</h1>

 
  <ul class="list-unstyled section-header-breadcrumb pt-3">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?=base_url()?>/departure">Data Departure</a></li>
    <li class="breadcrumb-item active" aria-current="page">insert</li>
  </ul> 
 
        </div>

        <div class="section-body">

            <?php if ($loadHttp == 'insert') : ?>
                <h2 class="section-title">Insert Data</h2>
                <!-- <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p> -->
            <?php elseif ($loadHttp == 'update') : ?>
                <h2 class="section-title">Update Data</h2>
                <!-- <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p> -->
            <?php endif; ?>

            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <!-- <div class="card-header">
                            <h4>Insert Data</h4>
                        </div> -->
                        <div class="card-body">

 

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

 
                            <form action="<?= ($loadHttp == 'insert') ? base_url() . '/departure/insert/p' : base_url() . '/departure/update/p/'. $getDeparture[0]->id_departure ?> " method="POST" class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-primary">Destination</label> 
                                        <div class="input-group mb-3">
                                            <input id="vw-Destination" readonly type="text" class="form-control border border-primary" placeholder="-" name="textone" value="<?=(isset($getDeparture[0]->id_destination)) ? $getDeparture[0]->nm_destination.' || '.date("shi").'.000'.$getDeparture[0]->id_destination.'.22'.date("s") : '' ?>">
                                            <div class="input-group-append">
                                            <button  data-sts="1" class="btn btn-primary pt-2 openserch" type="button">
                                                <i class="icon ion-search  " style="font-size: 20px;padding: 0 1px 0 1px;"></i>
                                            </button>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary">Name Vehicle</label> 
                                        <div class="input-group mb-3">
                                            <input id="vw-Vehicle" readonly type="text" class="form-control border border-primary" placeholder="-" name="texttwo" value="<?=(isset($getDeparture[0]->id_vehicle)) ? $getDeparture[0]->nm_vehicle.' || '.date("shi").'.000'.$getDeparture[0]->id_vehicle .'.22'.date("s") : '' ?>" >
                                            <div class="input-group-append">
                                            <button  data-sts="2" class="btn btn-primary pt-2 openserch" type="button">
                                                <i class="icon ion-search   " style="font-size: 20px;padding: 0 1px 0 1px;"></i>
                                            </button>
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="form-group">
                                        <label class="text-primary">Name Driver</label> 
                                        <div class="input-group mb-3">
                                            <input id="vw-driver" readonly type="text" class="form-control border border-primary" placeholder="-" name="texttree" value="<?=(isset($getDeparture[0]->id_driver)) ? $getDeparture[0]->full_name.' || '.date("shi").'.000'.$getDeparture[0]->id_driver .'.22'.date("s") : '' ?>">
                                            <div class="input-group-append">
                                            <button  data-sts="3" class="btn btn-primary pt-2 openserch" type="button">
                                                <i class="icon ion-search" style="font-size: 20px;padding: 0 1px 0 1px;" ></i>
                                            </button>
                                            </div>
                                        </div> 
                                    </div>

                                    <div class="form-group">
                                        <label class="text-primary">Plat Number</label>
                                        <input type="text" class="form-control border border-primary"  name="plat" placeholder="Enter Plat Number" value="<?=(isset($getDeparture[0]->plat_number)) ? $getDeparture[0]->plat_number  : '' ?>">
                                    </div>


                                </div> 

                                <div class="col-12 col-lg-6">
                                    <div class="form-group  ">
                                        <label class="text-primary">Date of Departure</label>
                                        <div class="row">
                                            <div class="col-12 col-lg-6 mb-2 mb-lg-0">
                                                <div class="input-group ">
                                                    <?php
                                                        if(isset($getDeparture[0]->plat_number)) {
                                                            $pecah1 = explode(' ', $getDeparture[0]->date_of_departure);
                                                            $pecah2 = explode('-', $pecah1[0]); 
                                                            $datetampil = $pecah2[1].'/'.$pecah2[2].'/'.$pecah2[0];
                                                            $newtime = $pecah1[1].' '.$pecah1[2];
                                                        } else{
                                                            $datetampil = date("m/d/Y");
                                                            $newtime    = date("h:i A");
                                                        } 
                                                    ?>
                                                    <input type="text" id="datedat" value="<?=$datetampil?>" class="form-control border border-primary" name="tglK" readonly/>
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-primary" data-toggle="datepicker">
                                                            <i class="far fa-calendar-alt" style="padding: 0 2px 0 2px;"></i>
                                                        </button>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="col-12 col-lg-6 ">
                                                <div class="input-group ">  
                                                    <input type="text" id="timevalue" value="<?=$newtime?>" class="form-control border border-primary " name="timeK"  readonly/> 
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-primary" id="timepicker">
                                                            <i class="far fa-clock"  style="padding: 0 1px 0 1px;"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary">Price</label>
                                        <input type="text" class="form-control border border-primary" id="rupiah" data-a-sign="Rp. " data-a-dec="," data-a-sep="."  name="price" value="<?=(isset($getDeparture[0]->price)) ? $getDeparture[0]->price  : 0 ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary"><?= ($loadHttp == 'insert') ? 'Date Create Data' : ' Date Update Data' ?></label>
                                        <input type="text" class="form-control border border-primary" readonly value="<?= date("Y-m-d H:i:s") ?>" name="tgldata">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-12">
                                    
                                    <hr class="border-bottom-0 border-primary mt-5">
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary px-5">Save</button>
                                    </div>
                                </div>
                            </form>

                        </div>


                    </div>
                </div>
            </div>
        </div>



</div>
</section>
</div>