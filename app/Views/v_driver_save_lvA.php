<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Driver</h1>

 
  <ul class="list-unstyled section-header-breadcrumb pt-3">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?=base_url()?>/driver">Data Driver</a></li>
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

                            <form action="<?= ($loadHttp == 'insert') ? base_url() . '/driver/insert/p' : base_url() . '/driver/update/p/'. $getDriver->id_driver  ?> " method="POST" class="row" enctype="multipart/form-data">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-primary">NIK</label>
                                        <input type="text" class="form-control border border-primary" name="name1" placeholder="Enter NIK" value="<?= (isset($getDriver->NIK)) ? $getDriver->NIK : '' ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary">Name</label>
                                        <input type="text" class="form-control border border-primary" name="name2" placeholder="Enter Name" value="<?= (isset($getDriver->full_name)) ? $getDriver->full_name : '' ?>">
                                    </div> 
                                    <div class="form-group">
                                        <label class="text-primary">Number Hp/WhatsApp</label>
                                        <input id="phone" type="text" class="form-control border border-primary v_g_HP w-100" name="name3"  value="<?= (isset($getDriver->number_driver)) ? '+62'.$getDriver->number_driver : '' ?>"> 
                                    </div> 
                                    <div class="form-group">
                                        <label class="text-primary">Picture</label>
                                        <div class="d-flex justify-content-center">
                                            <div class="border border-primary p-1" style="width:200px">
                                                <img id="imgPreview" src="<?= (isset($getDriver->picture)) ? base_url(). '/uploads/driver/pic_driver/' .$getDriver->picture  :  base_url().'/stisla/assets/img/news/img01.jpg' ?> " alt="Picture" class="img w-100 mb-1" />
                                                <input id="photo" name="gambar1" type="file" class="border border-primary w-100 p-1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-primary">Picture KTP</label>
                                        <div class="d-flex justify-content-center">
                                            <div class="border border-primary p-1" style="width:200px">
                                                <img id="imgPreview2" src="<?= (isset($getDriver->picture_KTP)) ? base_url(). '/uploads/driver/pic_ktp/' .$getDriver->picture_KTP  :  base_url().'/stisla/assets/img/news/img02.jpg' ?> " alt="Picture KTP" class="img w-100 mb-1" />
                                                <input id="photo2" name="gambar2" type="file" class="border border-primary w-100 p-1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary">Picture SIM</label>
                                        <div class="d-flex justify-content-center">
                                            <div class="border border-primary p-1" style="width:200px">
                                                <img id="imgPreview3" src="<?= (isset($getDriver->picture_SIM)) ? base_url(). '/uploads/driver/pic_sim/' .$getDriver->picture_SIM  :  base_url().'/stisla/assets/img/news/img04.jpg' ?> " alt="Picture SIM" class="img w-100 mb-1" />
                                                <input id="photo3" name="gambar3" type="file" class="border border-primary w-100 p-1">
                                            </div>
                                        </div>
                                    </div>
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