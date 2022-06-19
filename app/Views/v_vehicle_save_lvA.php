<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Vehicle</h1>

 
  <ul class="list-unstyled section-header-breadcrumb pt-3">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?=base_url()?>/vehicle">Data Vehicle</a></li>
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

                            <form action="<?= ($loadHttp == 'insert') ? base_url() . '/vehicle/insert/p' : base_url() . '/vehicle/update/p/'. $getVehicle->id_vehicle  ?> " method="POST" class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-primary">Name Vehicle</label>
                                        <input type="text" class="form-control border border-primary" name="nameone" placeholder="Enter Name Vehicle" value="<?= (isset($getVehicle->nm_vehicle)) ? $getVehicle->nm_vehicle : '' ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary">Total Seat</label>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append ">
                                                <button id="minus" class="btn btn-warning rounded-left px-5" type="button">-</button>
                                            </div>
                                            <input type="text" class="numbertype form-control" value="<?= (isset($getVehicle->seat)) ? $getVehicle->seat : '0' ?>" name="nametwo">
                                            <div class="input-group-append">
                                                <button id="plus" class="btn btn-warning rounded-right px-5" type="button">+</button>
                                            </div> 
                                        </div>
  
                                      </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-primary"><?= ($loadHttp == 'insert') ? 'Date Create Data' : ' Date Update Data' ?></label>
                                        <input type="text" class="form-control border border-primary" readonly value="<?= date("Y-m-d H:i:s") ?>" name="tgldate">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-12">
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