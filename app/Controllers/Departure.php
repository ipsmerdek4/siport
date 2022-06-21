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
            $dataviewsweetalert = $key->nm_destination."(^)".$key->nm_vehicle."(^)".$key->plat_number."(^)".$key->full_name."(^)".$key->date_of_departure."(^)"."Rp " . number_format($key->price,2,',','.')."(^)".$key->tgl_crt_dt_destination ;
            $row = array(
                'no' => $no,
                'destination' => $key->nm_destination,
                'vehicle' => $key->nm_vehicle,
                'plat' => $key->plat_number, 
                'nm_driver' => $key->full_name,
                'date_departure' => $key->date_of_departure,
                'Price' => "Rp " . number_format($key->price,2,',','.'), 
                'tgldata' => $key->tgl_crt_dt_departure,
                'action' => '<div class="btn-group" role="group" aria-label="Basic example">'.
                            '<button id="editdata" class="btn btn-success mr-1 pr-2 "'. 
                            'data-data="' . $dataviewsweetalert . '"   ' .
                            'data-href="' . base_url() . '/departure/update/' . $key->id_departure . '"   >' .
                            '<i class="far fa-edit"></i>'.
                            '</button>' .
                            '<button id="deldata"  class="btn btn-danger"'.
                            'data-data="'. $dataviewsweetalert.'"   ' .
                            'data-href="' . base_url() . '/departure/delete/' . $key->id_departure . '"   >' .
                            '<i class="fas fa-trash"></i>' .
                            '</button>'.
                            '</div>',
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

        $Destination = $this->VARs()->getVar('textone');  
        $Vehicle = $this->VARs()->getVar('texttwo');  
        $Driver = $this->VARs()->getVar('texttree');
        $plat = $this->VARs()->getVar('plat'); 
        $tglK = $this->VARs()->getVar('tglK'); 
        $timeK = $this->VARs()->getVar('timeK');
        $price = $this->VARs()->getVar('price');
        $tgldata = $this->VARs()->getVar('tgldata');
 
        $text1 = "";
        $text2 = "";
        $text3 = "";
        $text4 = "";
        $text5 = "";
        $text6 = "";
        $text7 = "";
        $text8 = "";


        if ($Destination == "") {
            $text1 = "Destination Required.";
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        }   

        if ($Vehicle == "") {
            $text2 = "Vehicle Required.";
            $text2 = '<div class="" style="font-size:15px;">[ ' . $text2 . ' ]</div>';
        }   

        if ($Driver == "") {
            $text3 = "Driver Required.";
            $text3 = '<div class="" style="font-size:15px;">[ ' . $text3 . ' ]</div>';
        }   

        if ($plat == "") {
            $text4 = "Plat Number Required.";
            $text4 = '<div class="" style="font-size:15px;">[ ' . $text4 . ' ]</div>';
        } elseif (strlen($plat) > 15) {
            $text4 = "Plat Number Max 15 Characters.";
            $text4 = '<div class="" style="font-size:15px;">[ ' . $text4 . ' ]</div>';
        }

        if ($tglK == "") {
            $text5 = "Date of Departure Required.";
            $text5 = '<div class="" style="font-size:15px;">[ ' . $text5 . ' ]</div>';
        }   

        if ($timeK == "") {
            $text6 = "Time of Departure Required.";
            $text6 = '<div class="" style="font-size:15px;">[ ' . $text6 . ' ]</div>';
        }  

        if (($price == "")||($price == "Rp. 0,00")) {
            $text7 = "Price Required.";
            $text7 = '<div class="" style="font-size:15px;">[ ' . $text7 . ' ]</div>';
        }   

        if ($tgldata == "") {
            $text8 = "Date Data Required.";
            $text8 = '<div class="" style="font-size:15px;">[ ' . $text8 . ' ]</div>';
        }  


        if (($text1) || ($text2) || ($text3) || ($text4) || ($text5) || ($text6) || ($text7) || ($text8)) {
            session()->setFlashdata('error', $text1 . $text2 . $text3 . $text4 . $text5 . $text6 . $text7 . $text8);
            return redirect()->to(base_url('/departure/insert'));
        } else {

            /* tgl */
            $pchtglK = explode('/', $tglK);
            $retglK = $pchtglK[2].'-'.$pchtglK[0].'-'.$pchtglK[1];
            /* extra price */
            $pecahprice = explode(',', $price);
            $newprice = $result = preg_replace("/[^0-9]/", "", $pecahprice[0]);
            /* destination */
            $pecah1 = explode(' || ', $Destination);
            $nm_destination = $pecah1[0]; // nama destination
            $blackid = explode('.', $pecah1[1]);
            $getblackid = $blackid[1];
            $id = substr($getblackid,3); //id destination 
            /* Vehicle */ 
            $Vehiclepecah1 = explode(' || ', $Vehicle);
            $nm_Vehicle = $Vehiclepecah1[0]; // nama Vehicle
            $blackidVehicle = explode('.', $Vehiclepecah1[1]);
            $getblackidVehicle = $blackidVehicle[1];
            $idVehicle = substr($getblackidVehicle,3); //id Vehicle
            /* Driver */  
            $Driverpecah1 = explode(' || ', $Driver);
            $nm_Driver = $Driverpecah1[0]; // nama Driver
            $blackidDriver = explode('.', $Driverpecah1[1]);
            $getblackidDriver = $blackidDriver[1]; 
            $idDriver = substr($getblackidDriver,3); //id Driver


            
            $Departure = new DepartureModel();


            $Departure->insert([
                'id_destination'        => $id, 
                'id_vehicle'            => $idVehicle,
                'plat_number'           => $plat,
                'book_seat'             => 0,
                'id_driver'             => $idDriver,
                'date_of_departure'     => $retglK.' '.$timeK,
                'price'                 => $newprice,
                'tgl_crt_dt_departure'  => $tgldata, 
            ]);

            session()->setFlashdata('msg', '<div style="font-size:15px;">Insert Successfully.</div>');
            return redirect()->to(base_url('/departure'))->withInput(); 


        }
 
    }
 
    public function update($id = null)
    {
        $id_departure  = $id;

        $Departure = new DepartureModel();
        $User = new UserModel();   

        $getDeparture = $Departure->joinAll($id_departure );

        $sessionID = session()->get('ID');
        if (isset($sessionID)) {
        
            $getUser = $User->where(['id_user' => session()->get('ID'),])->first();

            $timesaatlog = strtotime($getUser->tgl_log_user);
            $timesaatini = strtotime(date("Y-m-d H:i:s")); 
        
        }

        $data = array(  
            'menu'              => 'departure',
            'loadHttp'          => 'update',
            'title'             => 'Departure &rsaquo; [SIPORT]',
            'user'              => session()->get('name'),
            'timesaatini'       => $timesaatini,
            'timesaatlog'       => $timesaatlog,
            'getDeparture'      => $getDeparture,
        );

        echo view('ext/LA/header', $data);
        echo view('ext/LA/navigasi', $data);
        echo view('ext/LA/menu', $data);
        echo view('v_departure_save_lvA', $data);
        echo view('ext/LA/footer', $data);
    }


    public function up_progress($id = null)
    {
        
        $id_departure  = $id; 

        $Destination = $this->VARs()->getVar('textone');  
        $Vehicle = $this->VARs()->getVar('texttwo');  
        $Driver = $this->VARs()->getVar('texttree');
        $plat = $this->VARs()->getVar('plat'); 
        $tglK = $this->VARs()->getVar('tglK'); 
        $timeK = $this->VARs()->getVar('timeK');
        $price = $this->VARs()->getVar('price');
        $tgldata = $this->VARs()->getVar('tgldata');
 
        $text1 = "";
        $text2 = "";
        $text3 = "";
        $text4 = "";
        $text5 = "";
        $text6 = "";
        $text7 = "";
        $text8 = "";


        if ($Destination == "") {
            $text1 = "Destination Required.";
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        }   

        if ($Vehicle == "") {
            $text2 = "Vehicle Required.";
            $text2 = '<div class="" style="font-size:15px;">[ ' . $text2 . ' ]</div>';
        }   

        if ($Driver == "") {
            $text3 = "Driver Required.";
            $text3 = '<div class="" style="font-size:15px;">[ ' . $text3 . ' ]</div>';
        }   

        if ($plat == "") {
            $text4 = "Plat Number Required.";
            $text4 = '<div class="" style="font-size:15px;">[ ' . $text4 . ' ]</div>';
        } elseif (strlen($plat) > 15) {
            $text4 = "Plat Number Max 15 Characters.";
            $text4 = '<div class="" style="font-size:15px;">[ ' . $text4 . ' ]</div>';
        }

        if ($tglK == "") {
            $text5 = "Date of Departure Required.";
            $text5 = '<div class="" style="font-size:15px;">[ ' . $text5 . ' ]</div>';
        }   

        if ($timeK == "") {
            $text6 = "Time of Departure Required.";
            $text6 = '<div class="" style="font-size:15px;">[ ' . $text6 . ' ]</div>';
        }  

        if (($price == "")||($price == "Rp. 0,00")) {
            $text7 = "Price Required.";
            $text7 = '<div class="" style="font-size:15px;">[ ' . $text7 . ' ]</div>';
        }   

        if ($tgldata == "") {
            $text8 = "Date Data Required.";
            $text8 = '<div class="" style="font-size:15px;">[ ' . $text8 . ' ]</div>';
        }  


        if (($text1) || ($text2) || ($text3) || ($text4) || ($text5) || ($text6) || ($text7) || ($text8)) {
            session()->setFlashdata('error', $text1 . $text2 . $text3 . $text4 . $text5 . $text6 . $text7 . $text8);
            return redirect()->to(base_url('/departure/insert'));
        } else {

            /* tgl */
            $pchtglK = explode('/', $tglK);
            $retglK = $pchtglK[2].'-'.$pchtglK[0].'-'.$pchtglK[1];
            /* extra price */
            $pecahprice = explode(',', $price);
            $newprice = $result = preg_replace("/[^0-9]/", "", $pecahprice[0]);
            /* destination */
            $pecah1 = explode(' || ', $Destination);
            $nm_destination = $pecah1[0]; // nama destination
            $blackid = explode('.', $pecah1[1]);
            $getblackid = $blackid[1];
            $id = substr($getblackid,3); //id destination 
            /* Vehicle */ 
            $Vehiclepecah1 = explode(' || ', $Vehicle);
            $nm_Vehicle = $Vehiclepecah1[0]; // nama Vehicle
            $blackidVehicle = explode('.', $Vehiclepecah1[1]);
            $getblackidVehicle = $blackidVehicle[1];
            $idVehicle = substr($getblackidVehicle,3); //id Vehicle
            /* Driver */  
            $Driverpecah1 = explode(' || ', $Driver);
            $nm_Driver = $Driverpecah1[0]; // nama Driver
            $blackidDriver = explode('.', $Driverpecah1[1]);
            $getblackidDriver = $blackidDriver[1]; 
            $idDriver = substr($getblackidDriver,3); //id Driver

            $Departure = new DepartureModel();

            $data = [ 
                'id_destination'        => $id, 
                'id_vehicle'            => $idVehicle,
                'plat_number'           => $plat,
                'id_driver'             => $idDriver,
                'date_of_departure'     => $retglK.' '.$timeK,
                'price'                 => $newprice,
                'tgl_crt_dt_departure'  => $tgldata, 
            ];  
            $Departure->update($id_departure, $data);  

            session()->setFlashdata('msg', '<div style="font-size:15px;">Update Successfully.</div>');
            return redirect()->to(base_url('/departure'));   
        }

 

    }

 
    public function delete( $id = null)
    {
        $id_departure  = $id;
        $Departure = new DepartureModel();
 
        $getdeparture = $Departure->joinAll($id_departure);
  
        if ($Departure->find($id_departure)) {
            $Departure->delete($id_departure);

            session()->setFlashdata('msg', '<div style="font-size:15px;">Delete Successfully.<br><br>'. 
            "<b>[ Destination => " . $getdeparture[0]->nm_destination  .  " ]</b><br>" . 
            "<b>[ Vehicle => ". $getdeparture[0]->nm_vehicle  . " ]</b><br>" .
            "<b>[ Plat Number => " . $getdeparture[0]->plat_number  . " ]</b><br>" . 
            "<b>[ Driver => " . $getdeparture[0]->full_name  . " ]</b><br>" . 
            "<b>[ Date of Departure => " . $getdeparture[0]->date_of_departure  . " ]</b><br>" . 
            "<b>[ Price => " . "Rp " . number_format($getdeparture[0]->price,2,',','.') . " ]</b><br>" . 
            "</div>"); 

            return redirect()->to(base_url('/departure')); 
        } else {
            session()->setFlashdata('error', '<div class="" style="font-size:15px;">An error occurred while deleting data.<br>Please repeat again.</div>');
            return redirect()->to(base_url('/departure'));
        } 
    }















}