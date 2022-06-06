<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    { 
            $data = array(
                'menu'          => 'Home0',
                'title'         => 'Home &rsaquo; [SIPORT]',    
            );

            echo view('ext/header', $data);
            echo view('ext/menu', $data);
            echo view('ext/navigasi', $data);
            echo view('v_home', $data);
            echo view('ext/footer', $data);
    }
}
