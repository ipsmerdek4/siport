<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;  

class Register extends Controller{

    public function VARs(){ return $request = service('request'); }

    public function index()
    { 
            $data = array(
                'menu'          => 'register',
                'title'         => 'Register &rsaquo; [SIPORT]',    
            );
            echo view('ext/L/header', $data);
            echo view('ext/L/menu', $data); 
            echo view('v_register', $data);
            echo view('ext/L/footer', $data);
    }


    
    public function progres_regis()
    {  
        
            $User = new UserModel(); 

            $HP = $this->VARs()->getVar('g_HP');
            $email = $this->VARs()->getVar('g_email');
            $username = $this->VARs()->getVar('u_name');
            $password = $this->VARs()->getVar('u_pass'); 

            $text1 = "";
            $text2 = "";
            $text3 = "";
            $text4 = "";

            if ($HP == "") {
                $text1 = "Number Mobile Phone/WhatsApp Required."; 
                $text1 = '<div class="" style="font-size:15px;">[ '.$text1.' ]</div>';
            }elseif(strlen($HP) > 15) {
                $text1 = "Number Mobile Phone/WhatsApp Maximum 15 Characters."; 
                $text1 = '<div class="" style="font-size:15px;">[ '.$text1.' ]</div>';
            } 
            /*  */
            if ($email == "") {
                $text2 = "Email Required.";
                $text2 = '<div class="" style="font-size:15px;">[ '.$text2.' ]</div>';
            }elseif(strlen($email) < 7) {
                $text2 = "Email Minimum 7 Characters."; 
                $text2 = '<div class="" style="font-size:15px;">[ '.$text2.' ]</div>';
            }
            /*  */
            if ($username == "") {
                $text3 = "Username Required.";
                $text3 = '<div class="" style="font-size:15px;">[ '.$text3.' ]</div>';
            }elseif(strlen($username) < 8) {
                $text3 = "Username Minimum 8 Characters."; 
                $text3 = '<div class="" style="font-size:15px;">[ '.$text3.' ]</div>';
            }elseif(strlen($username) > 15) {
                $text3 = "Username Maximum 15 Characters."; 
                $text3 = '<div class="" style="font-size:15px;">[ '.$text3.' ]</div>';
            }
            /*  */
            if ($password == "") {
                $text4 = "Password Required.";
                $text4 = '<div class="" style="font-size:15px;">[ '.$text4.' ]</div>';
            }elseif(strlen($password) < 8) {
                $text4 = "Password Minimum 8 Characters."; 
                $text4 = '<div class="" style="font-size:15px;">[ '.$text4.' ]</div>';
            }elseif(strlen($password) > 15) {
                $text4 = "Password Maximum 15 Characters."; 
                $text4 = '<div class="" style="font-size:15px;">[ '.$text4.' ]</div>';
            }
             
            if (($text1)||($text2)||($text3)||($text4)) {
                session()->setFlashdata('error', $text1.$text2.$text3.$text4 );
                return redirect()->to(base_url('/register'))->withInput(); 
            }else{
                
                $User->insert([  
                    'username' => $username,
                    'password' => password_hash($password, PASSWORD_BCRYPT), 
                    'hp' => $HP,
                    'email' => $email,
                    'level' => 1, //level user
                    'status' => 1, //status belum menambahkan profil lengkap
                    'tgl_pembuatan_user' => date('Y-m-d H:i:s'),
                ]); 
                session()->setFlashdata('msg', '<div style="font-size:15px;">Registered Successfully, Please Login.</div>');
                return redirect()->to(base_url('/login'))->withInput(); 
            }
           

            
    

    }







}