<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\VehicleModel;
use App\Models\UserModel; 


class Vehicle extends Controller{

    public function VARs(){ return $request = service('request'); }


    public function index()
    { 
            $User = new UserModel();  
            
            $title = 'Vehicle &rsaquo; [SIPORT]';

            $sessionID = session()->get('ID');
            if (isset($sessionID)) {
            
                $getUser = $User->where(['id_user' => session()->get('ID'),])->first();
    
                $timesaatlog = strtotime($getUser->tgl_log_user);
                $timesaatini = strtotime(date("Y-m-d H:i:s")); 
            
            }

            $data = array(  
                'menu'          => 'vehicle',
                'title'         => $title,
                'user'          => session()->get('name'),
                'timesaatini'   => $timesaatini,
                'timesaatlog'   => $timesaatlog,
            );

            echo view('ext/LA/header', $data);
            echo view('ext/LA/navigasi', $data);
            echo view('ext/LA/menu', $data);
            echo view('v_vehicle_lvA', $data);
            echo view('ext/LA/footer', $data);


    }
 

    public function list()
    {
        $Vehicle = new VehicleModel();

        $listing = $Vehicle->get_datatables();
        $jumlah_semua = $Vehicle->jumlah_semua();
        $jumlah_filter = $Vehicle->jumlah_filter();


        $data = array();
        $no = $_POST['start'];
        foreach ($listing as $key) {
            $no++;
            $dataviewsweetalert = $key->nm_vehicle."(^)".$key->tgl_crt_dt_vehicle ;
            $row = array(
                'no' => $no,
                'name' => $key->nm_vehicle,
                'seat' => $key->seat,
                'tgl' => $key->tgl_crt_dt_vehicle,
                'action' => '<button id="editdata" class="btn btn-success mr-1 pr-2 "'. 
                            'data-data="' . $dataviewsweetalert . '"   ' .
                            'data-href="' . base_url() . '/vehicle/update/' . $key->id_vehicle  . '"   >' .
                            '<i class="far fa-edit"></i>'.
                            '</button>' .
                            '<button id="deldata"  class="btn btn-danger"'.
                            'data-data="'. $dataviewsweetalert.'"   ' .
                            'data-href="' . base_url() . '/vehicle/delete/' . $key->id_vehicle  . '"   >' .
                            '<i class="fas fa-trash"></i>' .
                            '</button>',
            ); 

            $data[] = $row;
        }

        $output = array(
            'draw'  => $_POST['draw'],
            'recordsTotal' => $jumlah_semua[0]->id_vehicle,
            'recordsFiltered' => $jumlah_filter[0]->id_vehicle,
            'data'  => $data
        );

        echo json_encode($output); 
    }

 

    public function insert()
    {
        $User = new UserModel();  

        $sessionID = session()->get('ID');
        if (isset($sessionID)) {
        
            $getUser = $User->where(['id_user' => session()->get('ID'),])->first();

            $timesaatlog = strtotime($getUser->tgl_log_user);
            $timesaatini = strtotime(date("Y-m-d H:i:s")); 
        
        }

        $data = array(  
            'menu'          => 'vehicle',
            'loadHttp'      => 'insert',
            'title'         => 'Vehicle &rsaquo; [SIPORT]',
            'user'          => session()->get('name'),
            'timesaatini'   => $timesaatini,
            'timesaatlog'   => $timesaatlog,
        );

        echo view('ext/LA/header', $data);
        echo view('ext/LA/navigasi', $data);
        echo view('ext/LA/menu', $data);
        echo view('v_vehicle_save_lvA.php', $data);
        echo view('ext/LA/footer', $data);
    }

    public function inp_progress()
    {

        $Vehicle = new VehicleModel();

        $nmVehicle = $this->VARs()->getVar('nameone');
        $checknametrue  = $Vehicle->where(['nm_vehicle' => $nmVehicle])->first();
        $seat = $this->VARs()->getVar('nametwo');

        $tglVehicle = $this->VARs()->getVar('tgldate');

        $text1 = "";
        $text2 = "";
        $text3 = "";

        if ($nmVehicle == "") {
            $text1 = "Name Vehicle Required.";
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        } elseif (strlen($nmVehicle) > 300) {
            $text1 = "Name Vehicle Max 300 Characters.";
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        }elseif($checknametrue){
            $text1 = "Name Vehicle Already Available.";
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        }  
        /*  */ 
        if ($seat == "0") {
            $text2 = "Total Seat Required.";
            $text2 = '<div class="" style="font-size:15px;">[ ' . $text2 . ' ]</div>';
        } elseif (strlen($seat) > 300) {
            $text2 = "Total Seat Max 10 Seat.";
            $text2 = '<div class="" style="font-size:15px;">[ ' . $text2 . ' ]</div>';
        }  
        /*  */
        if ($tglVehicle == "") {
            $text3 = "Date Create Data Required.";
            $text3 = '<div class="" style="font-size:15px;">[ ' . $text3 . ' ]</div>';
        }

        if (($text1) || ($text2) || ($text3)) {
            session()->setFlashdata('error', $text1 . $text2 . $text3);
            return redirect()->to(base_url('/vehicle/insert'));
        } else {

            $Vehicle->insert([
                'nm_vehicle'            => $nmVehicle, 
                'seat'                  => $seat, 
                'tgl_crt_dt_vehicle'    => $tglVehicle,
            ]);

            session()->setFlashdata('msg', '<div style="font-size:15px;">Insert Successfully.</div>');
            return redirect()->to(base_url('/vehicle'))->withInput(); 

        }

        

    }
 
    public function update($id = null)
    {
        $id_Vehicle   = $id;

        $User = new UserModel();  
        $Vehicle = new VehicleModel();

        $getVehicle = $Vehicle->where(['id_vehicle' => $id_Vehicle ,])->first();

        $sessionID = session()->get('ID');
        if (isset($sessionID)) {
        
            $getUser = $User->where(['id_user' => session()->get('ID'),])->first();

            $timesaatlog = strtotime($getUser->tgl_log_user);
            $timesaatini = strtotime(date("Y-m-d H:i:s")); 
        
        }

        $data = array(  
            'menu'              => 'vehicle',
            'loadHttp'          => 'update',
            'title'             => 'Vehicle &rsaquo; [SIPORT]',
            'user'              => session()->get('name'),
            'timesaatini'       => $timesaatini,
            'timesaatlog'       => $timesaatlog,
            'getVehicle'        => $getVehicle,
        );

        echo view('ext/LA/header', $data);
        echo view('ext/LA/navigasi', $data);
        echo view('ext/LA/menu', $data);
        echo view('v_vehicle_save_lvA', $data);
        echo view('ext/LA/footer', $data);
    }


    public function up_progress($id = null)
    {
        $id_Vehicle  = $id;
        $Vehicle = new VehicleModel();

        $nmVehicle = $this->VARs()->getVar('nameone');
        $seat = $this->VARs()->getVar('nametwo');

        $tglVehicle = $this->VARs()->getVar('tgldate');


        $text1 = "";
        $text2 = "";
        $text3 = "";

        if ($nmVehicle == "") {
            $text1 = "Name Vehicle Required.";
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        } elseif (strlen($nmVehicle) > 300) {
            $text1 = "Name Vehicle Max 300 Characters.";
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        } 
        /*  */ 
        if ($seat == "0") {
            $text2 = "Total Seat Required.";
            $text2 = '<div class="" style="font-size:15px;">[ ' . $text2 . ' ]</div>';
        } elseif (strlen($seat) > 300) {
            $text2 = "Total Seat Max 10 Seat.";
            $text2 = '<div class="" style="font-size:15px;">[ ' . $text2 . ' ]</div>';
        }  
        /*  */
        if ($tglVehicle == "") {
            $text3 = "Date Create Data Required.";
            $text3 = '<div class="" style="font-size:15px;">[ ' . $text3 . ' ]</div>';
        }

        if (($text1) || ($text2) || ($text3)) {
            session()->setFlashdata('error', $text1 . $text2);
            return redirect()->to(base_url('/vehicle/update/'.$id_Vehicle));
        } else {

            $data = [
                'nm_vehicle'            => $nmVehicle,
                'seat'                  => $seat,
                'tgl_crt_dt_vehicle'    => $tglVehicle,
            ];  
            $Vehicle->update($id_Vehicle, $data);  

            session()->setFlashdata('msg', '<div style="font-size:15px;">Update Successfully.</div>');
            return redirect()->to(base_url('/vehicle'));  
        }
 



    }

 
    public function delete( $id = null)
    {
        $id_Vehicle  = $id;
        $Vehicle = new VehicleModel();


        $getVehicle = $Vehicle->where(['id_vehicle' => $id_Vehicle,])->first();
 
        if ($Vehicle->find($id_Vehicle)) {
            $Vehicle->delete($id_Vehicle);

            session()->setFlashdata('msg', '<div style="font-size:15px;">Delete Successfully.<br><br>'. 
            '<b>[ Name Vehicle => ' . $getVehicle->nm_vehicle . ' ]</b><br>' .
            '<b>[ Date Data => '. $getVehicle->tgl_crt_dt_vehicle.' ]</b></div>');
            return redirect()->to(base_url('/vehicle')); 
        } else {
            session()->setFlashdata('error', '<div class="" style="font-size:15px;">An error occurred while deleting data.<br>Please repeat again.</div>');
            return redirect()->to(base_url('/vehicle'));
        } 
    }






}