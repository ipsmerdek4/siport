<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\UserModel;
use App\Models\LocationModel;

class Visit extends Controller{

    public function index($data = null)
    {
        $User = new UserModel();
        $Location = new LocationModel();
        $getLocation = $Location->joinlocation($data);

        $title = 'Visit &rsaquo; [SIPORT]';

        $sessionID = session()->get('ID');
        if (isset($sessionID)) {

            $getUser = $User->where(['id_user' => session()->get('ID'),])->first();

            $timesaatlog = strtotime($getUser->tgl_log_user);
            $timesaatini = strtotime(date("Y-m-d H:i:s"));
        }


        if (session()->get('level') == 1) {
 
        } else {

            $data = array(
                //'menu'          => 'Home',
                'title'         => $title,
                'getLocation'   => $getLocation,
            );

            echo view('ext/header', $data);
            echo view('ext/menu', $data);
            echo view('v_visit', $data);
            echo view('ext/footer', $data);
        }
    }




}