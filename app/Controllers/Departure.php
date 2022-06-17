<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DepartureModel;
use App\Models\UserModel; 

class Departure extends Controller{


    
    public function index()
    { 
        $User = new UserModel();  
        
        $title = 'Departure &rsaquo; [SIPORT]';

        $sessionID = session()->get('ID');
        if (isset($sessionID)) {
        
            $getUser = $User->where(['id_user' => session()->get('ID'),])->first();

            $timesaatlog = strtotime($getUser->tgl_log_user);
            $timesaatini = strtotime(date("Y-m-d H:i:s")); 
        
        }


        $data = array(  
            'menu'          => 'Departure',
            'title'         => $title,
            'user'          => session()->get('name'),
            'timesaatini'   => $timesaatini,
            'timesaatlog'   => $timesaatlog,
        );
 

        echo view('ext/LA/header', $data);
        echo view('ext/LA/navigasi', $data);
        echo view('ext/LA/menu', $data);
        echo view('v_departure_lvA', $data);
        echo view('ext/LA/footer', $data);


    }

}