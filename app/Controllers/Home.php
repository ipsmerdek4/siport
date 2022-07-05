<?php

namespace App\Controllers;

use App\Models\CreditCardModel; 
use App\Models\UserModel; 
use App\Models\PassengerModel; 
use App\Models\TransaksiModel; 
use App\Models\VehicleModel; 
use App\Models\DestinationModel;   
use App\Models\DepartureModel;         
 
/* require "../public/assets/scure/src/CryptoJsAes.php";
 */

   
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;




class Home extends BaseController
{
  
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


    public function index()
    { 
            $User = new UserModel();  
            $Destination = new DestinationModel();
            
            $getDestination = $Destination->findAll();


            $title = 'Home &rsaquo; [SIPORT]';

            $sessionID = session()->get('ID');
            if (isset($sessionID)) {
            
                $getUser = $User->where(['id_user' => session()->get('ID'),])->first();
    
                $timesaatlog = strtotime($getUser->tgl_log_user);
                $timesaatini = strtotime(date("Y-m-d H:i:s")); 
            
            }

        
            if (session()->get('level') == 1) { 

                $data = array(
                    //'menu'                => 'Home',
                    'title'                 => $title,    
                    'user'                  => session()->get('name'), 
                    'timesaatini'           => $timesaatini,
                    'timesaatlog'           => $timesaatlog ,
                    'getDestination'        => $getDestination,
                );

                echo view('ext/L1/header', $data);
                echo view('ext/L1/menu', $data); 
                echo view('v_home_lv1', $data);
                echo view('ext/L1/footer', $data);

            }elseif (session()->get('level') == 5) { 
                $data = array(  
                    'menu'          => 'home',
                    'title'         => $title,
                    'user'          => session()->get('name'),
                    'timesaatini'   => $timesaatini,
                    'timesaatlog'   => $timesaatlog,
                );

                echo view('ext/LA/header', $data);
                echo view('ext/LA/navigasi', $data);
                echo view('ext/LA/menu', $data);
                echo view('v_home_lvA', $data);
                echo view('ext/LA/footer', $data);


            }else{ 

                $data = array(
                    //'menu'                => 'Home',
                    'title'                 => $title, 
                    'getDestination'        => $getDestination,
                );

                echo view('ext/header', $data);
                echo view('ext/menu', $data); 
                echo view('v_home', $data); 
                echo view('ext/footer', $data);
            }
    }


    public function views_a()
    {
        $Destination = new DestinationModel();   

        $id_destination = $this->request->getVar('gosdt'); 
        $dataDestination = $Destination->where(['id_destination' => $id_destination,])->first(); 
 
        echo json_encode(array("hasil" => $dataDestination));   
    }


    public function views_b()
    {
        $warningX = '<div style="font-size:15px;">To Get Started, Please Login First or if you don&#39;t Have an Account, Please Register First.</div>';
        session()->setFlashdata('error', $warningX);
        return redirect()->to(base_url('login'));
    }
 
    public function views_z($id = null)
    {
  
        $User = new UserModel();  
        $Destination = new DestinationModel();
        $Departure = new DepartureModel();

        $title = 'Home &rsaquo; [SIPORT]';

        $sessionID = session()->get('ID');
        if (isset($sessionID)) {
        
            $getUser = $User->where(['id_user' => session()->get('ID'),])->first();

            $timesaatlog = strtotime($getUser->tgl_log_user);
            $timesaatini = strtotime(date("Y-m-d H:i:s")); 
        
        }

   
        $decrypted_txt = $this->encrypt_descrip('decrypt', $id);
        $pecah = explode('*', $decrypted_txt); 
        $id_destination = $pecah[0];
        $tgl = $pecah[1];
        $tglpecah = explode('/',$tgl);
        $tgl = $tglpecah[1].'-'.$tglpecah[0].'-'.$tglpecah[2];
        $tglcari = $tglpecah[2].'-'.$tglpecah[0].'-'.$tglpecah[1];
        $penumpang = $pecah[2];

        /*  */
        $getDeparture = $Departure->whereandlike('tbl_departure.id_destination', $id_destination, 'date_of_departure', $tglcari);
   
        $getDestination = $Destination->where(['id_destination' => $id_destination,])->first();



        $data = array(
            'menu'                  => 'Home_view',
            'title'                 => $title,    
            'user'                  => session()->get('name'), 
            'timesaatini'           => $timesaatini,
            'timesaatlog'           => $timesaatlog , 
            'getDestination'        => $getDestination , 
            'tgl'                   => $tgl , 
            'penumpang'             => $penumpang , 
            'getDeparture'          => $getDeparture,
        );

        echo view('ext/L1/header', $data);
        echo view('ext/L1/menu', $data); 
        echo view('v_list_lv1', $data);
        echo view('ext/L1/footer', $data);
 

    }

    public function Vw()
    { 
 
        $Destination = $this->VARs()->getVar('Destination'); 
        if (isset($Destination)) {
            $dates = $this->VARs()->getVar('dates');
            $passanger = $this->VARs()->getVar('passanger');
    
            $pack = $Destination.'*'.$dates.'*'.$passanger;  
            $encrypted_txt = $this->encrypt_descrip('encrypt', $pack); 
             
            return redirect()->to(base_url().'/views/z/'.$encrypted_txt);
        }
       
        $encryptt = $this->VARs()->getVar('encrypt');  
        if (isset($encryptt)) {
            $title1 = $this->VARs()->getVar('titles1');   
            $fname1 = $this->VARs()->getVar('fname1');   
            $email1 = $this->VARs()->getVar('email1');   
            $phone1 = $this->VARs()->getVar('phone1');   


            $title = $this->VARs()->getVar('title');   
            $fname = $this->VARs()->getVar('fname');   
            $idman = $this->VARs()->getVar('idman');   
            $country = $this->VARs()->getVar('country');   

            $metode = $this->VARs()->getVar('metode');   


            $decryptd_txt = $this->encrypt_descrip('decrypt', $encryptt); 
            $pecahkan = explode("*", $decryptd_txt);
            $total_harga = $pecahkan[0];
            $id_departure = $pecahkan[1];
            $penumpang = $pecahkan[2];


              $Departure = new DepartureModel();
              $Transaksi = new TransaksiModel();  
              $Passenger = new PassengerModel();  

              $LasrID = $Transaksi->countAll()+1; 
              $order_id = rand(999,9999).$LasrID;

              $getDeparture = $Departure->where(['id_departure' => $id_departure,])->first(); 

                $data = [
                    'id_transaksi'          => $order_id,
                    'id_departure'          => $id_departure,
                    'id_destination'        => $getDeparture->id_destination,
                    'id_user'               => session()->get('ID'),
                    'total_passenger'       => $penumpang,
                    'total_price'           => $total_harga,
                    'title_order'           => $title1,
                    'name_order'            => $fname1,
                    'email_order'           => $email1,
                    'phone_order'           => $phone1,
                    'metode_order'          => $metode,
                    'status_order'          => "Order",
                    'tgl_crt_dt_transaksi'  => date('Y-m-d H:i:s'),
                ];

                $Transaksi->insert($data); 

                foreach ($title as $key => $value) {  
                    $senddata[] = [
                        'id_transaksi'          => $order_id,
                        'title_passenger'       => $value,
                        'name_passenger'        => $fname[$key],
                        'KTP_passenger'         => $idman[$key],
                        'country_passenger'     => $country[$key],
                        'tgl_crt_dt_passenger'  => date('Y-m-d H:i:s'),
                    ];
                }

                $Passenger->insertBatch($senddata);
                
                $pack = $order_id."^".$metode;
                $encrypted_txt = $this->encrypt_descrip('encrypt', $pack); 
                return redirect()->to(base_url().'/paymen/p/'.$encrypted_txt);   


        }
         
   
    }



    public function departure_k()
    {
        $orderk = $this->VARs()->getVar('orderk');
        $pecahorder = explode("*", $orderk);
        $id_departure = $pecahorder[0];
        $penumpang = $pecahorder[1];
        
        
        /*  */
        $Departure = new DepartureModel();
        $Destination = new DestinationModel();
        $Vehicle = new VehicleModel();



        $getDeparture = $Departure->where(['id_departure' => $id_departure,])->first();
        $getDestination  = $Destination->where(['id_destination' => $getDeparture->id_destination,])->first();
        $getVehicle   = $Vehicle->where(['id_vehicle' => $getDeparture->id_vehicle,])->first();
 
        $ceakseat = ($penumpang+$getDeparture->book_seat);         
        if($ceakseat > $getVehicle->seat){ 
            return redirect()->back()->withInput()->with('error', '<div class="" style="font-size:15px;">'. 
                                                            '[ Seats Are Full. ]'.
                                                            '</div>'
                                                        );
 
        }else{
  
                /*  */
                $User = new UserModel();  

                $title = 'Home &rsaquo; [SIPORT]';

                $sessionID = session()->get('ID');
                if (isset($sessionID)) {
                
                    $getUser = $User->where(['id_user' => session()->get('ID'),])->first();

                    $timesaatlog = strtotime($getUser->tgl_log_user);
                    $timesaatini = strtotime(date("Y-m-d H:i:s")); 
                
                }
        
                $getDeparture2 = $Departure->joinAll($id_departure);

                $data = array(
                    'menu'                  => 'Home_order',
                    'title'                 => $title,    
                    'user'                  => session()->get('name'), 
                    'timesaatini'           => $timesaatini,
                    'timesaatlog'           => $timesaatlog ,  
                    'penumpang'             => $penumpang ,  
                    'getDeparture'          => $getDeparture2[0],
                );

                echo view('ext/L1/header', $data);
                echo view('ext/L1/menu', $data); 
                echo view('v_order_lv1', $data);
                echo view('ext/L1/footer', $data);

        } 
       


    }

    /* 
    public function pembayaran_k()
    {
        $tampilkan = [];
        $decrypt_prices = $this->VARs()->getVar('prices'); 
        if (isset($decrypt_prices)) {
            $prices = $this->encrypt_descrip('decrypt', $decrypt_prices); 
            $pecah = explode("*", $prices); 
            
            $harga = $pecah[0];
            $id_departure = $pecah[1];
            if (($harga != "")&&($id_departure != "")) {
                 
                    
                    // Set your Merchant Server Key
                    \Midtrans\Config::$serverKey = 'SB-Mid-server-IlCtlNOSQ5UtaBlirOgmEE30';
                    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                    \Midtrans\Config::$isProduction = false;
                    // Set sanitization on (default)
                    \Midtrans\Config::$isSanitized = true;
                    // Set 3DS transaction for credit card to true
                    \Midtrans\Config::$is3ds = true;

                    // Populate items
                    $items = array(
                        array(
                            'id'       => 'item1',
                            'price'    => 100000,
                            'quantity' => 1,
                            'name'     => 'Adidas f50'
                        ),
                        array(
                            'id'       => 'item2',
                            'price'    => 50000,
                            'quantity' => 2,
                            'name'     => 'Nike N90'
                        )
                    );

                    // Populate customer's billing address
                    $billing_address = array(
                        'first_name'   => "Andri",
                        'last_name'    => "Setiawan",
                        'address'      => "Karet Belakang 15A, Setiabudi.",
                        'city'         => "Jakarta",
                        'postal_code'  => "51161",
                        'phone'        => "081322311801",
                        'country_code' => 'IDN'
                    );

                    // Populate customer's shipping address
                    $shipping_address = array(
                        'first_name'   => "John",
                        'last_name'    => "Watson",
                        'address'      => "Bakerstreet 221B.",
                        'city'         => "Jakarta",
                        'postal_code'  => "51162",
                        'phone'        => "081322311801",
                        'country_code' => 'IDN'
                    );

                    // Populate customer's info
                    $customer_details = array(
                        'first_name'       => "Andri",
                        'last_name'        => "Setiawan",
                        'email'            => "test@test.com",
                        'phone'            => "081322311801",
                        'billing_address'  => $billing_address,
                        'shipping_address' => $shipping_address
                    );

                     

                    //$token_id = "123123";
  
                    $order_id = rand(); 


                    $params = array( 
                        'transaction_details' => array(
                            'order_id' =>  $order_id,
                            'gross_amount' => 10000,
                        ),
                        'item_details'        => $items,
                        'customer_details'    => $customer_details
                    );
 

                    $tampilkan = [
                        'snapToken' => \Midtrans\Snap::getSnapToken($params), 
                    ];
            




            }else{
                $tampilkan = [
                    'error'     => 'Sorry, Data Not Available..',
                ];
            } 
        }else{
            $tampilkan = [
                'error'     => 'Sorry, an error occurred 1, please try again.',
            ];
        }


        echo json_encode($tampilkan);

 

    } */


    public function paymen_p($id = null)
    {
        
        $CreditCard = new CreditCardModel();


        $decrypted_txt1 = $this->encrypt_descrip('decrypt', $id);
        $pecah = explode("^", $decrypted_txt1);

        $method = $pecah[1]; 
        $id_transaksi = $pecah[0]; 
 
        $CreditCard = $CreditCard->where(['id_transaksi ' => $id_transaksi,])->first(); 

        if (($method == 1)&&(!isset($CreditCard))) {

            $User = new UserModel();  
            $Transaksi = new TransaksiModel();  
            $Departure = new DepartureModel();
            $Destination = new DestinationModel();

            $Transaksi = $Transaksi->where(['id_transaksi ' => $id_transaksi,])->first();  
            $Departure = $Departure->where(['id_departure ' => $Transaksi->id_departure,])->first();
            $Destination = $Destination->where(['id_destination ' => $Departure->id_destination,])->first();

             $title = 'Home &rsaquo; [SIPORT]';
    
            $sessionID = session()->get('ID');
            if (isset($sessionID)) {
            
                $getUser = $User->where(['id_user' => session()->get('ID'),])->first();
    
                $timesaatlog = strtotime($getUser->tgl_log_user);
                $timesaatini = strtotime(date("Y-m-d H:i:s")); 
            
            }
            $data = array(
                'menu'                  => 'Home_visa',
                'title'                 => $title,    
                'user'                  => session()->get('name'), 
                'timesaatini'           => $timesaatini,
                'timesaatlog'           => $timesaatlog ,  
                'Transaksi'             => $Transaksi,
                'Destination'           => $Destination,
                'Departure'             => $Departure,
            );
    
            echo view('ext/L1/header', $data);
            echo view('ext/L1/menu', $data); 
            echo view('v_creditcard', $data);
            echo view('ext/L1/footer', $data); 
 
             
        }else{
            session()->setFlashdata('error', '<div class="" style="font-size:15px;">'. 
                                                    '[ Your Payment is Complete. ]'.
                                                    '</div>');
            return redirect()->to(base_url('myorder'));   
        }

     
    }

    public function paymen_checkout()
    {

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-IlCtlNOSQ5UtaBlirOgmEE30';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $Transaksi = new TransaksiModel();  

        
        $token_id = $this->VARs()->getVar('token_id');

        $id_encrypt = $this->VARs()->getVar('id_encrypt');
        $decrypted_txt1 = $this->encrypt_descrip('decrypt', $id_encrypt);
        $id_transaksi = $decrypted_txt1;

        $Transaksi = $Transaksi->where(['id_transaksi ' => $id_transaksi,])->first();

 

        $params = array(
            'transaction_details' => array(
                'order_id' => $Transaksi->id_transaksi,
                'gross_amount' => $Transaksi->total_price,
            ),
            'payment_type' => 'credit_card',
            'credit_card'  => array(
                'token_id'      => $token_id,
                'authentication' => true,
                // 'bank'        => 'bni', // optional acquiring bank
                'save_token_id'  => false,
            ),
            'customer_details' => array(
                'first_name' => $Transaksi->title_order,
                'last_name' => $Transaksi->name_order,
                'email' => $Transaksi->email_order,
                'phone' => $Transaksi->phone_order,
            ),
        );
         
        $response = \Midtrans\CoreApi::charge($params);


        echo json_encode($response);  


    }

    public function paymen_checkout_req()
    {
        $id_encrypt = $this->VARs()->getVar('id_encrypt');
        $decrypted_txt1 = $this->encrypt_descrip('decrypt', $id_encrypt);
        $id_transaksi = $decrypted_txt1; 
        $order_id = $this->VARs()->getVar('order_id');
        $bank = $this->VARs()->getVar('bank');
        $payment_type = $this->VARs()->getVar('payment_type');
        $currency = $this->VARs()->getVar('currency');
        $gross_amount = $this->VARs()->getVar('gross_amount');
        $no_card = $this->VARs()->getVar('no_card');
        $name_card = $this->VARs()->getVar('name_card');
        $transaction_status = $this->VARs()->getVar('transaction_status');
        $status_message = $this->VARs()->getVar('status_message');
        $transaction_time = $this->VARs()->getVar('transaction_time'); 

        $CreditCard = new CreditCardModel();
        $Transaksi = new TransaksiModel();  
        $Departure = new DepartureModel();
        $Destination = new DestinationModel();

        $getTransaksi = $Transaksi->where(['id_transaksi' => $id_transaksi,])->first();
        $getDeparture = $Departure->where(['id_departure' => $getTransaksi->id_departure,])->first();
        $getDestination = $Destination->where(['id_destination' => $getDeparture->id_destination,])->first();

        $CreditCard->insert([  
            'id_transaksi' => $order_id, 
            'bank' => $bank,
            'currency' => $currency,
            'payment_type' => $payment_type,
            'gross_amount' => $gross_amount,
            'no_card' => $no_card,
            'name_card' => $name_card,
            'transaction_status' => $transaction_status,
            'status_message' => $status_message,
            'transaction_time' => $transaction_time, 
            'tgl_crt_dt_creditcar' => date('Y-m-d H:i:s'),
        ]); 
 
 
        if ($transaction_status == "capture") {  
            $Departure->update($getDeparture->id_departure, [ 'book_seat' => $getTransaksi->total_passenger+$getDeparture->book_seat, ]);      
            $Transaksi->update($id_transaksi, [  'status_order' => $transaction_status, ]);   
        }

 
        
        $writer = new PngWriter();

        // Create QR code
        $qrCode = QrCode::create($order_id."#".$name_card."#".$getDestination->nm_destination."#".$getTransaksi->total_passenger."Pessenger#".$getDeparture->date_of_departure)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        // Create generic logo
        $logo = Logo::create(__DIR__.'/../../public/assets/img/ico/pelindoQR.png')
            ->setResizeToWidth(70);

        // Create generic label
        $label = Label::create($getDestination->nm_destination)
            ->setTextColor(new Color(67, 72, 217));

        $result = $writer->write($qrCode, $logo, $label);

        
        // Directly output the QR code
        header('Content-Type: '.$result->getMimeType());
        $result->getString();

        // Save it to a file
        $result->saveToFile(__DIR__.'/../../public/QRCODE/'.$order_id.'.png');

        // Generate a data URI to include image data inline (i.e. inside an <img> tag)
        $dataUri = $result->getDataUri();

 

        $data = [
            'sts' => '200'
        ];

        echo json_encode($data);

    }


}
