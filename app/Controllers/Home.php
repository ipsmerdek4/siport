<?php

namespace App\Controllers;

use App\Models\UserModel; 
use App\Models\DestinationModel;   
use App\Models\DepartureModel;   
use Nullix\CryptoJsAes\CryptoJsAes;
 
require "../public/assets/scure/src/CryptoJsAes.php";

class Home extends BaseController
{
 

    public function VARs(){ return $request = service('request'); }

  


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
    /*  */
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
        $dates = $this->VARs()->getVar('dates');
        $passanger = $this->VARs()->getVar('passanger');

        $pack = $Destination.'*'.$dates.'*'.$passanger;  
        $encrypted_txt = $this->encrypt_descrip('encrypt', $pack); 
         
        return redirect()->to(base_url().'/views/z/'.$encrypted_txt);
         
   
    }



    public function departure_k()
    {
        $orderk = $this->VARs()->getVar('orderk');
        $pecahorder = explode("*", $orderk);
        $id_departure = $pecahorder[0];
        $penumpang = $pecahorder[1];

        /*  */
        $User = new UserModel();  

        $title = 'Home &rsaquo; [SIPORT]';

        $sessionID = session()->get('ID');
        if (isset($sessionID)) {
        
            $getUser = $User->where(['id_user' => session()->get('ID'),])->first();

            $timesaatlog = strtotime($getUser->tgl_log_user);
            $timesaatini = strtotime(date("Y-m-d H:i:s")); 
        
        }



        
        $data = array(
            'menu'                  => 'Home_order',
            'title'                 => $title,    
            'user'                  => session()->get('name'), 
            'timesaatini'           => $timesaatini,
            'timesaatlog'           => $timesaatlog ,  
            'penumpang'             => $penumpang ,  
        );

        echo view('ext/L1/header', $data);
        echo view('ext/L1/menu', $data); 
        echo view('v_order_lv1', $data);
        echo view('ext/L1/footer', $data);




    }



}
