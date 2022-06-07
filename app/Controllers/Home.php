<?php

namespace App\Controllers;
use App\Models\UserModel;  

class Home extends BaseController
{
    public function index()
    { 
            $User = new UserModel();   
            $title = 'Home &rsaquo; [SIPORT]';


        
            if (session()->get('level') == 1) { 

                $getUser = $User->where([ 'id_user' => session()->get('ID'), ])->first(); 
 
                $timesaatlog = strtotime($getUser->tgl_log_user);  
                $timesaatini = strtotime(date("Y-m-d H:i:s")); 

                $data = array(
                    //'menu'          => 'Home',
                    'title'         => $title,    
                    'user'          => session()->get('name'), 
                    'timesaatini'   => $timesaatini,
                    'timesaatlog'   => $timesaatlog ,
                );

                echo view('ext/L1/header', $data);
                echo view('ext/L1/menu', $data);
                echo view('ext/L1/navigasi', $data);
                echo view('v_home_lv1', $data);
                echo view('ext/L1/footer', $data);
            }else{ 

                 $data = array(
                    //'menu'          => 'Home',
                    'title'         => $title,    
                );

                echo view('ext/header', $data);
                echo view('ext/menu', $data);
                echo view('ext/navigasi', $data);
                echo view('v_home', $data);
                echo view('ext/footer', $data);
            }
    }
}
