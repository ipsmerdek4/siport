<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel; 
use App\Models\TransaksiModel; 
use App\Models\PassengerModel; 
use App\Models\DestinationModel; 
use App\Models\DepartureModel; 
use App\Models\CreditCardModel; 
use App\Models\VehicleModel; 
use App\Models\DriverModel; 



use Dompdf\Dompdf;
use Dompdf\Options;

class Receipt extends Controller{

    public function VARs(){ return $request = service('request'); }
    /* function excrip and descript */
    public function encrypt_descrip($action, $string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'asdadoaudo8asudoaud8o';
        $secret_iv = '555555334342423';
        // hash
        $key = hash('sha256', $secret_key);
    
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if( $action == 'decrypt' ) {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }




    public function goto($id = null)
    {

        $datas = $id;  

        $rubah = $this->encrypt_descrip('decrypt', $datas);
        $pecahkan = explode('^', $rubah);

       
        $Transaksi = new TransaksiModel();
        $Passenger = new PassengerModel();
        $Destination = new DestinationModel();
        $Departure = new DepartureModel();
        $CreditCard = new CreditCardModel();
        $Vehicle = new VehicleModel();
        $Driver = new DriverModel();

        $getTransaksi = $Transaksi->where(['id_transaksi' => $pecahkan[0],])->first();
        $getCreditCard = $CreditCard->where(['id_transaksi' => $pecahkan[0],])->first();
        $getPassenger = $Passenger->where(['id_transaksi' => $pecahkan[0],])->get()->getResult();
        $getDestination = $Destination->where(['id_destination ' => $getTransaksi->id_destination ,])->first();
        $getDeparture = $Departure->where(['id_departure' => $getTransaksi->id_departure ,])->first();
        $getVehicle = $Vehicle->where(['id_vehicle' => $getDeparture->id_vehicle ,])->first();
        $getDriver  = $Driver->where(['id_driver' => $getDeparture->id_driver ,])->first();

        
        $data = [
            'title'             => "Receipt~SIPORT [".$getTransaksi->tgl_crt_dt_transaksi.']',
            'getTransaksi'      => $getTransaksi,
            'getCreditCard'     => $getCreditCard,
            'getDestination'    => $getDestination,
            'getVehicle'        => $getVehicle,
            'getDeparture'      => $getDeparture,
            'getPassenger'      => $getPassenger,
            'getDriver'         => $getDriver,
        ];
        
        $views = view('receipt_pdf', $data);

        $dompdfs = new Dompdf; 
        $html = $views; 
        $dompdfs->set_option('isRemoteEnabled', TRUE);
        $dompdfs->set_option("isPhpEnabled", true); 
        $dompdfs->setPaper('A4', 'Portrait'); 
        $dompdfs->loadHtml($html); 
        $dompdfs->render();
        $dompdfs->stream('Laporan'.date('Ymdhis').'.pdf', array(
                "Attachment" => false

        ));  
 
     }

     public function save()
     { 
      
     }



     public function email()
     {  
        
       


     }




}