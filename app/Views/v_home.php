<div class="section-header ">

  <style>
    .carousel-control-next-icon,
    .carousel-control-prev-icon {
      filter: invert(1);
    }
  </style>


  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">

      <div class="carousel-item active text-center">
        <img class="d-block mx-auto w-100" src="/assets/img/pantaikuta.gif" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h5>Kuta Beach</h5>
        </div>
      </div>

      <div class="carousel-item">
        <img class="d-block mx-auto w-100" src="/assets/img/pura-ulun-danu.gif" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
          <h5>Pura Ulun Danu</h5>
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
  <p class="section-lead">Please select a tourist location that you will visit.</p>

  <div class="row">

    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
      <article class="article">
        <div class="col-12 col-lg-8 offset-lg-2 pt-4">
          <div class="form-group">
            <select id="myselect" class="form-control" name="island">
              <option value="0" readonly select>- Please Select the Island -</option>
            </select>
          </div>
        </div>

        <div class="col-12 col-lg-8 offset-lg-2 ">
          <div class="row">
            <div class="form-group col-6 ">
              <input type="text" placeholder="pick-up date" class="form-control border border-primary">
            </div>
            <div class="form-group col-6 ">
              <input type="text" placeholder="pick-up time" class="form-control border border-primary">
            </div>
          </div>

        </div>

        <div class="col-12 col-lg-8 offset-lg-2 ">
          <div class="row">
            <div class="form-group col-6">
              <select id="myselect2" class="form-control" name="island">
                <option value="0" readonly select>- Please Select Vehicle -</option>
              </select>
            </div>
            <div class="form-group col-6">
              <select id="myselect3" class="form-control" name="island">
                <option value="0" readonly select>- Please Select Total Passenger -</option>
                <?php for ($i = 1; $i <= 4; $i++) : ?>
                  <option value=" " readonly select><?= $i ?></option>
                <?php endfor; ?>
              </select>
            </div>
          </div>

        </div>

        <div class="col-12 col-lg-8 offset-lg-2  ">
          <div class="pb-4 text-center">
            <button class="btn btn-primary border">Searching</button>
          </div>
        </div> 
      </article>
    </div>

  </div>
</div>