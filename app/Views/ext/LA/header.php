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


  <link rel="stylesheet" href="<?= base_url() ?>/assets/datatables/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/datatables/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/datatables/datatables-buttons/css/buttons.bootstrap4.min.css">



  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/stisla/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>/stisla/assets/css/components.css">


  <style>
    #example_filter>label {
      margin: 10px 0 0 0 !important;
      font-weight: bold;
    }

    #example_filter>label>input {
      padding: 0 10px 0 10px;
      margin: 0 0 0 10px;
    } 

    #example_length>label>select{ 
      width: 70px;
    } 
    
    


    
    @media only screen and (max-width: 395px) {
      #example_filter>label>input {
        float: left;
        width: 100%;
        margin: 0 0 0 0;
      }
    }
  </style>

</head>