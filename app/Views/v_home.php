<?php $dataX[] = "";
foreach ($getIsland as $key => $value) : ?>

  <div class="section-header ">
    <?php if ($key == 0) : ?>
      <form action="<?= base_url() ?>" method="post" class="d-sm-none w-100">
        <div class="input-group ">
          <input type="text" class="form-control border border-primary" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
      <hr class="w-100 border-top border-primary d-sm-none">
    <?php endif; ?>

    <h1 class="text-primary text-center text-lg-left w-100 mt-1 mt-sm-0 "><?= $value->name_island ?> </h1>
  </div>



  <div class="section-body">


    <h2 class="section-title">Select Location</h2>
    <p class="section-lead">Please select a tourist location that you will visit.</p>

    <div class="row">
      <?php foreach ($getLocation as $key => $value2) :
              if ($value2->id_island  == $value->id_island) : ?> 

          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <article class="article">
              <div class="article-header">
                <div class="article-image" 
                data-background="<?=($value2->picture == "")? base_url(). "/stisla/assets/img/news/img08.jpg" : base_url(). '/uploads/location/'. $value2->picture ?> ">
                </div>
                <div class="article-title">
                  <h2><a href="#"><?= $value2->name_location ?></a></h2>
                </div>
              </div>
              <div class="article-details">
                <p><?= $value2->ket_location?> </p>
                <div class="article-cta">
                  <a href="#" class="btn btn-primary">Visit </a>
                </div>
              </div>
            </article>
          </div>


      <?php   endif;
            endforeach; ?>
    </div>
  </div>


<?php endforeach; ?>

   