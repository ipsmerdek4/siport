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
  <link rel="stylesheet" href="<?= base_url() ?>/assets/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css" />

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/stisla/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>/stisla/assets/css/components.css">




  <style>
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
  </style>


</head>