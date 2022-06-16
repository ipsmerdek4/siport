<?php 
namespace App\Controllers;

use CodeIgniter\Controller;  
use App\Models\UserModel;  

class Login extends Controller{

    public function VARs(){ return $request = service('request'); }


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
        $User = new UserModel(); 

        $username = $this->VARs()->getVar('u_name');
        $password = $this->VARs()->getVar('p_name');

            $text1 = "";
            $text2 = "";
            if ($username == "") {
                $text1 = "Username Required.";
                $text1 = '<div class="" style="font-size:15px;">[ '.$text1.' ]</div>';
            }elseif(strlen($username) < 8) {
                $text1 = "Username Minimum 8 Characters."; 
                $text1 = '<div class="" style="font-size:15px;">[ '.$text1.' ]</div>';
            } 
            /*  */
            if ($password == "") {
                $text2 = "Password Required.";
                $text2 = '<div class="" style="font-size:15px;">[ '.$text2.' ]</div>';
            }elseif(strlen($password) < 8) {
                $text2 = "Password Minimum 8 Characters."; 
                $text2 = '<div class="" style="font-size:15px;">[ '.$text2.' ]</div>';
            }elseif(strlen($password) > 15) {
                $text2 = "Password Maximum 15 Characters."; 
                $text2 = '<div class="" style="font-size:15px;">[ '.$text2.' ]</div>';
            }

            if (($text1)||($text2)) {
                session()->setFlashdata('error', $text1.$text2);
                return redirect()->to(base_url('/login')); 
            }else{
                
                $dataUser = $User->reqLogin($username);

                if ($dataUser[0]) {  
                    if (password_verify($password, $dataUser[0]->password)) { 
                        $log = 
                        $User->update($dataUser[0]->id_user, ['tgl_log_user' => date("Y-m-d H:i:s")]);
                        if ($log) {
                            session()->set([
                                'name'      => $username,
                                'ID'        => $dataUser[0]->id_user,
                                'level'     => $dataUser[0]->level,
                                'status'    => $dataUser[0]->status,
                                'logged_in' => true,
                            ]); 
                            return redirect()->to(base_url()); 
                        }else{
                            return redirect()->to(base_url('/login')); 
                        } 
                        
                    }else{
                        session()->setFlashdata('error', '<div class="" style="font-size:15px;">'. 
                                                        '[ Password Salah ]'.
                                                        '</div>');
                        return redirect()->to(base_url('/login')); 
                    } 
                } 
            }




    }


    function logout()
    {         
                     
        $itemget = ['name', 'ID', 'level', 'status', 'logged_in'];
        session()->remove($itemget);
        session()->setFlashdata('msg','You Have Successfully Logged Out.');   
        return redirect()->to(base_url('/login'));


    }




}