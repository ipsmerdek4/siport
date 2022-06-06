<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?=$title?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?=base_url()?>/stisla/node_modules/bootstrap/dist/css/bootstrap.min.css" >
  <link rel="stylesheet" href="<?=base_url()?>/stisla/node_modules/@fortawesome/fontawesome-free/css/all.css" >

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?=base_url()?>/stisla/node_modules/ionicons201/css/ionicons.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url()?>/stisla/assets/css/style.css">
  <link rel="stylesheet" href="<?=base_url()?>/stisla/assets/css/components.css">

  <link rel="stylesheet" href="<?=base_url()?>/assets/intl-tel-input/css/intlTelInput.css">


  <style>
    .font-sz-2_3{
        font-size: 2.3rem;
    }
    .font-sz-3{
        font-size: 3rem
    }
    
    .iti__flag {background-image: url("<?=base_url()?>/assets/intl-tel-input/img/flags.png");}





    @media only screen and (max-width: 426px) {

        .font-sz-2_3{
            font-size: 1.6rem;
        }
        .font-sz-3{
            font-size: 2rem;
        } 

    }
    
    @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
        .iti__flag {background-image: url("<?=base_url()?>/assets/intl-tel-input/img/flags@2x.png");}
    } 

  </style>


</head>