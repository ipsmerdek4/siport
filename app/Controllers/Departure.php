<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DepartureModel;
use App\Models\UserModel; 
use App\Models\DestinationModel; 
use App\Models\VehicleModel; 
use App\Models\DriverModel; 

class Departure extends Controller{

    public function VARs(){ return $request = service('request'); }

    
    public function index()
    { 
        $User = new UserModel();  
        
        $title = 'Departure &rsaquo; [SIPORT]';

        $sessionID = session()->get('ID');
        if (isset($sessionID)) {
        
            $getUser = $User->where(['id_user' => session()->get('ID'),])->first();

            $timesaatlog = strtotime($getUser->tgl_log_user);
            $timesaatini = strtotime(date("Y-m-d H:i:s")); 
        
        }


        $data = array(  
            'menu'          => 'departure',
            'title'         => $title,
            'user'          => session()->get('name'),
            'timesaatini'   => $timesaatini,
            'timesaatlog'   => $timesaatlog,
        );
 

        echo view('ext/LA/header', $data);
        echo view('ext/LA/navigasi', $data);
        echo view('ext/LA/menu', $data);
        echo view('v_departure_lvA', $data);
        echo view('ext/LA/footer', $data);


    }


    

    public function list()
    {
        $Departure = new DepartureModel();

        $listing = $Departure->get_datatables();
        $jumlah_semua = $Departure->jumlah_semua();
        $jumlah_filter = $Departure->jumlah_filter();


        $data = array();
        $no = $_POST['start'];
        foreach ($listing as $key) {
            $no++;
            $dataviewsweetalert = $key->nm_destination."(^)".$key->nm_vehicle."(^)".$key->plat_number."(^)".$key->full_name."(^)".$key->date_of_departure."(^)".$key->price."(^)".$key->tgl_crt_dt_destination ;
            $row = array(
                'no' => $no,
                'destination' => $key->nm_destination,
                'vehicle' => $key->nm_vehicle,
                'plat' => $key->plat_number,
                'nm_driver' => $key->full_name,
                'date_departure' => $key->date_of_departure,
                'Price' => $key->price, 
                'tgldata' => $key->tgl_crt_dt_departure,
                'action' => '<button id="editdata" class="btn btn-success mr-1 pr-2 "'. 
                            'data-data="' . $dataviewsweetalert . '"   ' .
                            'data-href="' . base_url() . '/departure/update/' . $key->id_departure . '"   >' .
                            '<i class="far fa-edit"></i>'.
                            '</button>' .
                            '<button id="deldata"  class="btn btn-danger"'.
                            'data-data="'. $dataviewsweetalert.'"   ' .
                            'data-href="' . base_url() . '/departure/delete/' . $key->id_departure . '"   >' .
                            '<i class="fas fa-trash"></i>' .
                            '</button>',
            ); 

            $data[] = $row;
        }

        $output = array(
            'draw'  => $_POST['draw'],
            'recordsTotal' => $jumlah_semua[0]->id_departure,
            'recordsFiltered' => $jumlah_filter[0]->id_departure,
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
            'menu'          => 'departure',
            'loadHttp'      => 'insert',
            'title'         => 'Departure &rsaquo; [SIPORT]',
            'user'          => session()->get('name'),
            'timesaatini'   => $timesaatini,
            'timesaatlog'   => $timesaatlog,
        );

        echo view('ext/LA/header', $data);
        echo view('ext/LA/navigasi', $data);
        echo view('ext/LA/menu', $data);
        echo view('v_departure_save_lvA', $data);
        echo view('ext/LA/footer', $data);
    }

    public function serchone()
    {
        $Destination = new DestinationModel();   
        $dataDestination = $Destination->findAll(); 
        echo json_encode(array("tampil" => $dataDestination));   
    }

    public function serchtwo()
    {
        $Vehicle = new VehicleModel();   
        $dataVehicle = $Vehicle->findAll(); 
        echo json_encode(array("tampil" => $dataVehicle));   
    }

    public function serchtree()
    {
        $Driver = new DriverModel();   
        $dataDriver = $Driver->findAll(); 
        echo json_encode(array("tampil" => $dataDriver));   
    }




    public function inp_progress()
    {

        echo 'tes '.$this->VARs()->getVar('dod');


/* 


        $Destination = new DestinationModel();

        $nmdestination = $this->VARs()->getVar('nmdestination');
        $checknametrue  = $Destination->where(['nm_destination' => $nmdestination])->first();

        $tgldestination = $this->VARs()->getVar('tgldestination');

        $text1 = "";
        $text2 = "";
        if ($nmdestination == "") {
            $text1 = "Destination Required.";
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        } elseif (strlen($nmdestination) > 300) {
            $text1 = "Destination Max 300 Characters.";
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        }elseif($checknametrue){
            $text1 = "Destination Already Available.";
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        }   
        if ($tgldestination == "") {
            $text2 = "Date Create Data Required.";
            $text2 = '<div class="" style="font-size:15px;">[ ' . $text2 . ' ]</div>';
        }

        if (($text1) || ($text2)) {
            session()->setFlashdata('error', $text1 . $text2);
            return redirect()->to(base_url('/destination/insert'));
        } else {

            $Destination->insert([
                'nm_destination'             => $nmdestination, 
                'tgl_crt_dt_destination'     => $tgldestination,
            ]);

            session()->setFlashdata('msg', '<div style="font-size:15px;">Insert Successfully.</div>');
            return redirect()->to(base_url('/destination'))->withInput(); 

        }

        
 */
    }
 
    public function update($id = null)
    {
        $id_destination   = $id;

        $User = new UserModel();  
        $Destination = new DestinationModel();

        $getDestination = $Destination->where(['id_destination ' => $id_destination ,])->first();

        $sessionID = session()->get('ID');
        if (isset($sessionID)) {
        
            $getUser = $User->where(['id_user' => session()->get('ID'),])->first();

            $timesaatlog = strtotime($getUser->tgl_log_user);
            $timesaatini = strtotime(date("Y-m-d H:i:s")); 
        
        }

        $data = array(  
            'menu'              => 'destination',
            'loadHttp'          => 'update',
            'title'             => 'Destination &rsaquo; [SIPORT]',
            'user'              => session()->get('name'),
            'timesaatini'       => $timesaatini,
            'timesaatlog'       => $timesaatlog,
            'getDestination'    => $getDestination,
        );

        echo view('ext/LA/header', $data);
        echo view('ext/LA/navigasi', $data);
        echo view('ext/LA/menu', $data);
        echo view('v_destination_save_lvA', $data);
        echo view('ext/LA/footer', $data);
    }


    public function up_progress($id = null)
    {
        $id_destination  = $id;
        $Destination = new DestinationModel();

        $nmdestination = $this->VARs()->getVar('nmdestination');  
        $tgldestination = $this->VARs()->getVar('tgldestination');


        $text1 = "";
        $text2 = "";
        
        if ($nmdestination == "") {
            $text1 = "Destination Required.";
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        } elseif (strlen($nmdestination) > 300) {
            $text1 = "Destination Max 300 Characters.";
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        }  
    
        if ($tgldestination == "") {
            $text2 = "Date Create Data Required.";
            $text2 = '<div class="" style="font-size:15px;">[ ' . $text2 . ' ]</div>';
        }

        if (($text1) || ($text2)) {
            session()->setFlashdata('error', $text1 . $text2);
            return redirect()->to(base_url('/destination/update/'.$id_destination));
        } else {

            $data = [
                'nm_destination'         => $nmdestination,
                'tgl_crt_dt_destination' => $tgldestination,
            ];  
            $Destination->update($id_destination, $data);  

            session()->setFlashdata('msg', '<div style="font-size:15px;">Update Successfully.</div>');
            return redirect()->to(base_url('/destination'));  
        }
 



    }

 
    public function delete( $id = null)
    {
        $id_destination  = $id;
        $Destination = new DestinationModel();


        $getDestination = $Destination->where(['id_destination' => $id_destination,])->first();
 
        if ($Destination->find($id_destination)) {
            $Destination->delete($id_destination);

            session()->setFlashdata('msg', '<div style="font-size:15px;">Delete Successfully.<br><br>'.
            '<b>[ ID => ' . $getDestination->id_destination  . ' ]</b><br>' .
            '<b>[ Destination => ' . $getDestination->nm_destination . ' ]</b><br>' .
            '<b>[ Date Data => '. $getDestination->tgl_crt_dt_destination.' ]</b></div>');
            return redirect()->to(base_url('/destination')); 
        } else {
            session()->setFlashdata('error', '<div class="" style="font-size:15px;">An error occurred while deleting data.<br>Please repeat again.</div>');
            return redirect()->to(base_url('/destination'));
        } 
    }















}