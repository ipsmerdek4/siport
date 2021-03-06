<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Destination</h1>

 
  <ul class="list-unstyled section-header-breadcrumb pt-3">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?=base_url()?>/destination">Data Destination</a></li>
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

                            <form action="<?= ($loadHttp == 'insert') ? base_url() . '/destination/insert/p' : base_url() . '/destination/update/p/'. $getDestination->id_destination ?> " method="POST" class="row" enctype="multipart/form-data">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-primary">Destination</label>
                                        <input type="text" class="form-control border border-primary" name="nmdestination" placeholder="Enter Destination" value="<?= (isset($getDestination->nm_destination)) ? $getDestination->nm_destination : '' ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary">Picture</label>
                                        <div class="d-flex justify-content-center">
                                            <div class="border border-primary p-1" style="width:200px">
                                                <img id="imgPreview" src="<?= (isset($getDestination->picture_destination)) ? base_url(). '/uploads/destination/' .$getDestination->picture_destination  :  base_url().'/stisla/assets/img/news/img01.jpg' ?> " alt="Picture" class="img w-100 mb-1" />
                                                <input id="photo" name="gambar1" type="file" class="border border-primary w-100 p-1">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-primary"><?= ($loadHttp == 'insert') ? 'Date Create Data' : ' Date Update Data' ?></label>
                                        <input type="text" class="form-control border border-primary" readonly value="<?= date("Y-m-d H:i:s") ?>" name="tgldestination">
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