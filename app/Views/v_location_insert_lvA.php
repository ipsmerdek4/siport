<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Location</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url() ?>/">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url() ?>/location">Data Location</a></div>
                <div class="breadcrumb-item"><?= ($loadHttp == 'insert') ? 'Insert Data' : 'Update Data' ?></div>
            </div>
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

                            <form action="<?= ($loadHttp == 'insert') ? base_url() . '/location/insert/p' : base_url() . '/location/edit/p/' . $DataLocation->id_location ?>" method="POST" class="row" enctype="multipart/form-data">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-primary">Select Island</label>
                                        <select id="myselect" class="form-control" name="island">
                                            <option value="0" readonly select>- Please Select the Island -</option> 
                                            <?php foreach ($DataIsland as $value) : ?>
                                                <option value="<?= $value->id_island ?>" <?= (isset($DataLocation->name_location)) ? ($DataLocation->id_island == $value->id_island) ? 'selected' :  '' : '' ?>><?= $value->name_island ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary">Name Location</label>
                                        <input type="text" class="form-control border border-primary" name="namelocation" placeholder="Name Location" value="<?= (isset($DataLocation->name_location)) ? $DataLocation->name_location : '' ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary">Description Location</label>
                                        <textarea name="ketlocation" class="form-control border border-primary" style="height:145px"><?= (isset($DataLocation->ket_location)) ? $DataLocation->ket_location : '' ?></textarea>
                                    </div>

                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-primary">Picture</label>
                                        <div class="d-flex justify-content-center">
                                            <div class="border border-primary p-1" style="width:200px">
                                                <img id="imgPreview" src="<?= (isset($DataLocation->picture)) ? base_url(). '/uploads/location/'.$DataLocation->picture : base_url().'/stisla/assets/img/products/product-5-50.png' ?>" alt="pic" class="img w-100 mb-1" />
                                                <input id="photo" name="gambarnya" type="file" class="border border-primary w-100 p-1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary"><?= ($loadHttp == 'insert') ? 'Date Create Data' : ' Date Update Data' ?></label>
                                        <input type="text" class="form-control border border-primary" readonly value="<?= date("Y-m-d H:i:s") ?>" name="tgllocation">
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