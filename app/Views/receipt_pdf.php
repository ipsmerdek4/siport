<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>


    
    <style>
        @page{
            margin:30px;
        }
        .tabledetails{ 
            width:100%;
            border-collapse: collapse; 
            border: 1px solid #A0A0A0;
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
            margin-bottom: 10px;

        }
        .tabledetails tr{  
        }
        .tabledetails td, .tabledetails th {
            padding-left: 20px;
            padding-bottom: 3px;
        }
        .table{ 
            width:100%;
            border-collapse: collapse;
            text-align: center;
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
            margin-bottom: 60px;

        }
        .table td, .table th {
            border: 1px solid #A0A0A0;
            padding: 8px;
        }
        .table th {   
            font-size: 13px;


        }
        .table tr:nth-child(even){background-color: #f2f2f2;}
        .img-header{    
            width: 100px;
            float: left;
            padding : 0 0 0 90px;
        }
        
        .header-cetak-transaksi{  
            text-align: center;
            font-size: 18px;
            width:400px; 
            float: left;
            padding : 25px 0 0 0;
        }
        .hr-cetak-transaksi{
            margin-top:-5px;
            clear:both;
        }
        .h4-text-title{
            text-align: center;
            margin: 10px 0 10px 0;
            letter-spacing: 1px;
        }
        .row3{
            width:150px;
            margin:auto;
        }
        .row5{
            width:100px;
            margin:auto;
        }
        .row7{
            width:150px;
            margin:auto;
        }
        .rowt2{
            width:150px;  
            font-weight: bold;
        }
        


        .page_break { page-break-before: always; }
    </style>




</head>
<body>

           
        <div class="img-header">
            <img src="<?=base_url()?>/assets/img/ico/pelindoQR.png" alt="SI-FUTSAL LOGO" style="width:100%;" > 
        </div>
        <h1 class="header-cetak-transaksi">(SIPORT) SISTEM TRANSPORT ONLINE</h1>
        <hr class="hr-cetak-transaksi">
        <h4 class="h4-text-title"  >Payment Receipt</h4> 
        <br> 
        <table class="tabledetails">  
            <tr>
                <td  colspan="2" style="padding-top: 15px;padding-bottom: 10px">Order Details</td> 
                <td rowspan="6" style="width:10%;padding:0px; "><img src="<?=base_url()?>/QRCODE/<?=$getTransaksi->id_transaksi ?>.png" alt="" style="width:150px;"></td>
            </tr>
            <tr>
                <td style="width:30%">Order-ID</td>
                <td><?=$getTransaksi->id_transaksi ?></td>
            </tr>
            <tr>
                <td style="width:30%">Name</td>
                <td><?=$getTransaksi->name_order?></td>
            </tr>
            <tr>
                <td style="width:30%">Email</td>
                <td><?=$getTransaksi->email_order?></td>
            </tr>
            <tr>
                <td style="width:30%">Phone/WhatsApp Number</td>
                <td><?=$getTransaksi->phone_order?></td>
            </tr>
            <tr>
                <td style="width:30%;padding-bottom:15px;"> </td>
                <td> </td>
            </tr> 
        </table>

        <table class="tabledetails">  
            <tr>
                <td  colspan="2" style="padding-top: 15px;padding-bottom: 10px">Payment Details</td>
            </tr>
            <tr>
                <td style="width:30%"> Payment Date and Time </td>
                <td><?=$getCreditCard->transaction_time?> </td>
            </tr> 
            <tr>
                <td style="width:30%"> Payment Method </td>
                <td><?=$getCreditCard->payment_type?> </td>
            </tr> 
            <tr>
                <td style="width:30%"> Number Card </td>
                <td><?="**** - **** - **** - ".substr($getCreditCard->no_card, -4)?> </td>
            </tr> 
            <tr>
                <td style="width:30%;padding-bottom:15px;"> </td>
                <td> </td>
            </tr>
        </table>

        <table class="table">  
            <thead>
                <tr>
                    <th >No</th>  
                    <th >Destination</th> 
                    <th >Vehicle</th> 
                    <th >Passenger</th> 
                    <th >Price</th>  
                </tr> 
            </thead> 
                <tr>
                    <td>1</td>
                    <td><?=$getDestination->nm_destination?></td>
                    <td><?=$getVehicle->nm_vehicle."(".$getVehicle->seat.")"?></td>
                    <td>X <?=$getTransaksi->total_passenger?></td>
                    <td><?="Rp " . number_format($getDeparture->price,2,',','.')?></td> 
                </tr>
                <tr>
                    <td colspan="4"  style="text-align: right;padding-right:10px;background-color: #545454;color: white;letter-spacing:2px"><b>Total</b></td>
                    <td style='background-color: #545454;color: white;'><b><?="Rp " . number_format($getTransaksi->total_price,2,',','.')?></b></td>
                </tr>
            <tbody>   
            </tbody>
        </table>

            

        <div class="page_break">
                
        <table class="tabledetails">  
                <tr>
                    <td  colspan="3" style="padding-top: 15px;padding-bottom: 10px"><b>Driver Details</b></td>
                </tr>      
                <tr>
                    <td rowspan="3" style="width:5px;"> </td>
                    <td style="width:30%"> ID-Driver </td>
                    <td style="width:70%"><?=$getDriver->NIK?></td>
                </tr>   
                <tr> 
                    <td style="width:30%"> Name Driver</td>
                    <td style="width:70%"><?=$getDriver->full_name?></td>
                </tr>   

                <tr style=""> 
                    <td style="padding-bottom: 15px !important;width:30%"> Phone Number Driver </td>
                    <td style="padding-bottom: 15px !important;width:70%;"><?=$getDriver->number_driver?></td>
                </tr>   
                <tr>
                    <td style="width:30%;padding-bottom:15px;"> </td>
                    <td> </td>
                    <td> </td>
                </tr>
            </table>

            <table class="tabledetails">  
                <tr>
                    <td  colspan="3" style="padding-top: 15px;padding-bottom: 10px"><b>Passenger Details</b></td>
                </tr>
                <?php foreach ($getPassenger as $key => $value) : ?>
                        
                <tr>
                    <td rowspan="3" style="width:5px;"><?=$key+1?></td>
                    <td style="width:30%"> Name Passenger </td>
                    <td style="width:70%"><?=$value->title_passenger.". ".$value->name_passenger?> </td>
                </tr>   
                <tr> 
                    <td style="width:30%"> ID Passenger </td>
                    <td style="width:70%"><?=$value->KTP_passenger?> </td>
                </tr>  

                <tr style=""> 
                    <td style="padding-bottom: 15px !important;width:30%"> Country Passenger </td>
                    <td style="padding-bottom: 15px !important;width:70%;"><?=$value->country_passenger?> </td>
                </tr>  

                <?php endforeach; ?>


                <tr>
                    <td style="width:30%;padding-bottom:15px;"> </td>
                    <td> </td>
                    <td> </td>
                </tr>
            </table>
        </div>



        <script type="text/php">
                if ( isset($pdf) ) {
                    // OLD 
                    // $font = Font_Metrics::get_font("helvetica", "bold");
                    // $pdf->page_text(72, 18, "{PAGE_NUM} of {PAGE_COUNT}", $font, 8, array(255,0,0));
                    // v.0.7.0 and greater
                    $x = 250;
                    $y = 810;
                    $text = "SIPORT Page ({PAGE_NUM} of {PAGE_COUNT}) ";
                    $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "bold");
                    $size = 6;
                    $color = array(0,0,0);
                    $word_space = 0.0;  //  default
                    $char_space = 0.0;  //  default
                    $angle = 0.0;   //  default
                    $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
                }
            </script>


 

</body>
</html>