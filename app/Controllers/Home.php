<?php

namespace App\Controllers;

use App\Models\UserModel; 
use App\Models\DestinationModel; 

class Home extends BaseController
{
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
                    //'menu'          => 'Home',
                    'title'         => $title,    
                    'user'          => session()->get('name'), 
                    'timesaatini'   => $timesaatini,
                    'timesaatlog'   => $timesaatlog ,
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
                    //'menu'          => 'Home',
                    'title'         => $title, 
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


}
