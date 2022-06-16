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
            'menu'          => 'destination',
            'loadHttp'      => 'insert',
            'title'         => 'Destination &rsaquo; [SIPORT]',
            'user'          => session()->get('name'),
            'timesaatini'   => $timesaatini,
            'timesaatlog'   => $timesaatlog,
        );

        echo view('ext/LA/header', $data);
        echo view('ext/LA/navigasi', $data);
        echo view('ext/LA/menu', $data);
        echo view('v_destination_save_lvA.php', $data);
        echo view('ext/LA/footer', $data);
    }

    public function inp_progress()
    {

        $Tujuan = new TujuanModel();

        $nmdestination = $this->VARs()->getVar('nmdestination');
        $checknametrue  = $Tujuan->where(['nm_tujuan' => $nmdestination])->first();

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
        /*  */
        if ($tgldestination == "") {
            $text2 = "Date Create Data Required.";
            $text2 = '<div class="" style="font-size:15px;">[ ' . $text2 . ' ]</div>';
        }

        if (($text1) || ($text2)) {
            session()->setFlashdata('error', $text1 . $text2);
            return redirect()->to(base_url('/destination/insert'));
        } else {

            $Tujuan->insert([
                'nm_tujuan'             => $nmdestination, 
                'tgl_crt_dt_tujuan'     => $tgldestination,
            ]);

            session()->setFlashdata('msg', '<div style="font-size:15px;">Insert Successfully.</div>');
            return redirect()->to(base_url('/destination'))->withInput(); 

        }

        

    }
 
    public function update($id = null)
    {
        $id_tujuan  = $id;

        $User = new UserModel();  
        $Tujuan = new TujuanModel();

        $gettujuan = $Tujuan->where(['id_tujuan' => $id_tujuan,])->first();

        $sessionID = session()->get('ID');
        if (isset($sessionID)) {
        
            $getUser = $User->where(['id_user' => session()->get('ID'),])->first();

            $timesaatlog = strtotime($getUser->tgl_log_user);
            $timesaatini = strtotime(date("Y-m-d H:i:s")); 
        
        }

        $data = array(  
            'menu'          => 'destination',
            'loadHttp'      => 'update',
            'title'         => 'Destination &rsaquo; [SIPORT]',
            'user'          => session()->get('name'),
            'timesaatini'   => $timesaatini,
            'timesaatlog'   => $timesaatlog,
            'gettujuan'     => $gettujuan,
        );

        echo view('ext/LA/header', $data);
        echo view('ext/LA/navigasi', $data);
        echo view('ext/LA/menu', $data);
        echo view('v_destination_save_lvA', $data);
        echo view('ext/LA/footer', $data);
    }


    public function up_progress($id = null)
    {
        $id_tujuan  = $id;
        $Tujuan = new TujuanModel();

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
            return redirect()->to(base_url('/destination/update/'.$id_tujuan));
        } else {

            $data = [
                'nm_tujuan'         => $nmdestination,
                'tgl_crt_dt_tujuan' => $tgldestination,
            ];  
            $Tujuan->update($id_tujuan, $data);  

            session()->setFlashdata('msg', '<div style="font-size:15px;">Update Successfully.</div>');
            return redirect()->to(base_url('/destination'));  
        }
 



    }

 
    public function delete( $id = null)
    {
        $id_tujuan  = $id;
        $Tujuan = new TujuanModel();

        $getTujuan = $Tujuan->where(['id_tujuan' => $id_tujuan,])->first();
 
        if ($Tujuan->find($id_tujuan)) {
            $Tujuan->delete($id_tujuan);

            session()->setFlashdata('msg', '<div style="font-size:15px;">Delete Successfully.<br><br>'.
            '<b>[ ID => ' . $getTujuan->id_tujuan  . ' ]</b><br>' .
            '<b>[ Destination => ' . $getTujuan->nm_tujuan . ' ]</b><br>' .
            '<b>[ Date Data => '. $getTujuan->tgl_crt_dt_tujuan.' ]</b></div>');
            return redirect()->to(base_url('/destination')); 
        } else {
            session()->setFlashdata('error', '<div class="" style="font-size:15px;">An error occurred while deleting data.<br>Please repeat again.</div>');
            return redirect()->to(base_url('/destination'));
        } 
    }




}