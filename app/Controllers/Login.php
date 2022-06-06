<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class Login extends Controller{


    public function index()
    { 
            $data = array(
                'menu'          => 'login',
                'title'         => 'Login &rsaquo; [SIPORT]',    
            );
            echo view('ext/L/header', $data);
            echo view('ext/L/menu', $data); 
            echo view('v_login', $data);
            echo view('ext/L/footer', $data);
 
    }

    public function progres_login()
    { 
        $username = $this->request->getVar('u_name');
        $password = $this->request->getVar('p_name');

    }







}