<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url() ?>/stisla/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/stisla/node_modules/@fortawesome/fontawesome-free/css/all.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url() ?>/stisla/node_modules/ionicons201/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/select2/dist/css/select2.min.css">
  
  <link rel="stylesheet" href="<?=base_url()?>/assets/intl-tel-input/css/intlTelInput.css">

  <link rel="stylesheet" href="<?=base_url()?>/assets/country-picker-flags/build/css/countrySelect.css">
  <!-- block mitrans -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/featherlight/1.7.12/featherlight.min.css">
  <!-- datatables  --> 
  <link rel="stylesheet" href="<?= base_url() ?>/assets/datatables/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/datatables/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/datatables/datatables-buttons/css/buttons.bootstrap4.min.css">



  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/stisla/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>/stisla/assets/css/components.css">




  <style>

    .country-select.inside { width: 100% } 
    .selected-flag{background-color: #e3eaef; width: 100px;}
    .iti{ width: 100%;}

    /*  */
    .d-myorder{
      color: #343a40; 
    }
    .d-myorder:hover{
      color: #6777ef; 
    }
    .d-myorder-head{
      padding :23.5px 0;
      padding-right: 15px;
    } 
    .d-myorder-fot{ 
      border-bottom: 2px solid white;
      padding :23.5px 0;
    }
    .d-myorder-fot:hover{
      /* color: #343a40;  */
      border-bottom: 2px solid #6777ef; 
    }





    /* serching logo */
    .serchlocation .select2-container--default .select2-selection--single .select2-selection__arrow b {
      background-image: url("<?= base_url() ?>/assets/img/ico/3936854_creanimasi_pencarian_search_searching_icon.png");
      background-color: transparent;
      background-size: contain;
      border: none !important;
      height: 20px !important;
      width: 20px !important;
      margin-top: 10px;
      margin-left: 5px;
      top: auto !important;
      left: auto !important;

    }

    .serchcars .select2-container--default .select2-selection--single .select2-selection__arrow b {
      background-image: url("<?= base_url() ?>/assets/img/ico/753959_cars_automobile_car_vehicle_icon.png");
      background-color: transparent;
      background-size: contain;
      border: none !important;
      height: 20px !important;
      width: 20px !important;
      margin-top: 10px;
      margin-left: 5px;
      top: auto !important;
      left: auto !important;
    }


    .serchpassanger .select2-container--default .select2-selection--single .select2-selection__arrow b {
      background-image: url("<?= base_url() ?>/assets/img/ico/4781818_account_avatar_face_man_people_icon.png");
      background-color: transparent;
      background-size: contain;
      border: none !important;
      height: 20px !important;
      width: 20px !important;
      margin-top: 10px;
      margin-left: 5px;
      top: auto !important;
      left: auto !important;
    }

    /* carousel image slade */
    .carousel-control-next-icon,
    .carousel-control-prev-icon {
      filter: invert(1);
    }

    /* style select order home */
    
    .select-arrow {   
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background: url("/assets/img/ico/icons8-chevron-down-50.png") 93% / 10% no-repeat ;
    }
          

    @media only screen and (max-width: 769px) {
      .select-arrow {    
            background: url("/assets/img/ico/icons8-chevron-down-50.png") 98% / 2% no-repeat ;
          } 
    }
    @media only screen and (max-width: 426px) {
      .select-arrow {    
            background: url("/assets/img/ico/icons8-chevron-down-50.png") 97% / 4% no-repeat ;
          } 
    }
    @media only screen and (max-width: 321px) {
      .select-arrow {    
            background: url("/assets/img/ico/icons8-chevron-down-50.png") 96% / 6% no-repeat ;
          } 
    }
  </style>


</head>