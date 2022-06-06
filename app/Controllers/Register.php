<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;  

class Register extends Controller{

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


         /*    if (!$this->validate([
                'g_email' => [
                    'rules' => 'required|min_length[7]',
                    'errors' => [
                        'required'   => 'Email Required.',
                        'min_length' => 'Email Minimum 7 Characters.',   
                    ]
                ], 
                'g_HP' => [
                    'rules' => 'required|max_length[15] ',
                    'errors' => [
                        'required'   => 'Number Mobile Phone/WhatsApp Required.',
                        'max_length' => 'Number Mobile Phone/WhatsApp Maximum 15 Characters.',   
                    ]
                ],   
                'u_name' => [
                    'rules' => 'required|min_length[8]|max_length[15] ',
                    'errors' => [
                        'required'   => 'Username Required.',
                        'min_length' => 'Username Minimum 8 Characters.',
                        'max_length' => 'Username Maximum 15 Characters.',   
                    ]
                ], 
                'u_pass' => [
                    'rules' => 'required|min_length[8]|max_length[15] ',
                    'errors' => [
                        'required'   => 'Password Required.',
                        'min_length' => 'Password Minimum 8 Characters.',
                        'max_length' => 'Password Maximum 15 Characters.',     
                    ]
                ],  
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->to(base_url('/register'))->withInput(); 
            } 
 */
           

            
            $User = new UserModel(); 

            $HP = $this->request->getVar('g_HP');
            $email = $this->request->getVar('g_email');
            $username = $this->request->getVar('u_name');
            $password = $this->request->getVar('u_pass'); 

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