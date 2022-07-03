<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel; 

class Order extends Controller{

    public function VARs(){ return $request = service('request'); }


    public function index()
    { 
            $User = new UserModel();    

            $title = 'Home &rsaquo; [SIPORT]';

            $sessionID = session()->get('ID');
            if (isset($sessionID)) {
            
                $getUser = $User->where(['id_user' => session()->get('ID'),])->first();
    
                $timesaatlog = strtotime($getUser->tgl_log_user);
                $timesaatini = strtotime(date("Y-m-d H:i:s")); 
            
            }
 
            $data = array(
                //'menu'                => 'Home',
                'title'                 => $title,    
                'user'                  => session()->get('name'), 
                'timesaatini'           => $timesaatini,
                'timesaatlog'           => $timesaatlog , 
            );

            echo view('ext/L1/header', $data);
            echo view('ext/L1/menu', $data); 
            echo view('v_myorder_lv1', $data);
            echo view('ext/L1/footer', $data);
 



    }


}