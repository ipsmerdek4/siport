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

 




}