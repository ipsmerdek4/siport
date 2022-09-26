<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel; 
use App\Models\DestinationModel; 

class Destination extends Controller{

    public function VARs(){ return $request = service('request'); }

    public function index()
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
            'title'         => 'Destination &rsaquo; [SIPORT]',
            'user'          => session()->get('name'),
            'timesaatini'   => $timesaatini,
            'timesaatlog'   => $timesaatlog,
        );

        echo view('ext/LA/header', $data);
        echo view('ext/LA/navigasi', $data);
        echo view('ext/LA/menu', $data);
        echo view('v_destination_lvA', $data);
        echo view('ext/LA/footer', $data);
 
    }

    public function list()
    {
        $Destination = new DestinationModel();

        $listing = $Destination->get_datatables();
        $jumlah_semua = $Destination->jumlah_semua();
        $jumlah_filter = $Destination->jumlah_filter();


        $data = array();
        $no = $_POST['start'];
        foreach ($listing as $key) {
            $no++;
            $dataviewsweetalert = $key->nm_destination."(^)".$key->tgl_crt_dt_destination ;
            $row = array(
                'no' => $no,
                'nm_tujuan' => $key->nm_destination,
                'picture'           =>  '<div>'. 
                                            '<img src="'.base_url(). '/uploads/destination/'. 
                                            $key->picture_destination.'" alt="'. $key->picture_destination.'"'. 'class="img " id="pictureview" style="width:50px;cursor: pointer;" '. 
                                            'data-picture="' . $key->picture_destination . '"   ' .
                                            'data-name="' . $key->picture_destination . '"   ' . 
                                            ' />'. 
                                        '</div>', 
                'tgl_crt_dt_tujuan' => $key->tgl_crt_dt_destination,
                'action' => '<button id="editdata" class="btn btn-success mr-1 pr-2 "'. 
                            'data-data="' . $dataviewsweetalert . '"   ' .
                            'data-href="' . base_url() . '/destination/update/' . $key->id_destination . '"   >' .
                            '<i class="far fa-edit"></i>'.
                            '</button>' .
                            '<button id="deldata"  class="btn btn-danger"'.
                            'data-data="'. $dataviewsweetalert.'"   ' .
                            'data-href="' . base_url() . '/destination/delete/' . $key->id_destination . '"   >' .
                            '<i class="fas fa-trash"></i>' .
                            '</button>',
            ); 

            $data[] = $row;
        }

        $output = array(
            'draw'  => $_POST['draw'],
            'recordsTotal' => $jumlah_semua[0]->id_destination,
            'recordsFiltered' => $jumlah_filter[0]->id_destination,
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
        /*  */
        if ($tgldestination == "") {
            $text2 = "Date Create Data Required.";
            $text2 = '<div class="" style="font-size:15px;">[ ' . $text2 . ' ]</div>';
        }


        //format type  
        $valid_file_types = array("image/png", "image/jpeg", "image/jpg");

        //variable
        $img1 =  $this->VARs()->getFile('gambar1');
        //format type  
        $file_type1 = $img1->getClientMimeType();
        //size
        $size1 = $img1->getSizeByUnit('mb');


        $text11 = "";

        if (!$img1->isValid()) { 
            $text11 = "Picture Required.";
            $text11 = '<div class="" style="font-size:15px;">[ ' . $text11 . ' ]</div>';
        }elseif(!in_array($file_type1, $valid_file_types)){
            $text11 = 'The Format You Entered is Wrong,<br>Please Enter the Format: "image/png", "image/jpeg", "image/jpg".';
            $text11 = '<div class="" style="font-size:15px;">[ ' . $text11 . ' ]</div>';
        } elseif ($size1 > 2.000) { 
            $text11 = 'Size is too BIG, Only Available Size 2 Mb or Below';
            $text11 = '<div class="" style="font-size:15px;">[ ' . $text11 . ' ]</div>';
        }

        

        if (($text1) || ($text2) || ($text11)) {
            session()->setFlashdata('error', $text1 . $text2 . $text11);
            return redirect()->to(base_url('/destination/insert'));
        } else {

            if (!$img1->hasMoved()) {
                $newName1 = $img1->getRandomName();
                $img1->move('uploads/destination/', $newName1);
            }else{
                $newName1 = "";
            }

            $Destination->insert([
                'nm_destination'             => $nmdestination, 
                'picture_destination'        => $newName1, 
                'tgl_crt_dt_destination'     => $tgldestination,
            ]);

            session()->setFlashdata('msg', '<div style="font-size:15px;">Insert Successfully.</div>');
            return redirect()->to(base_url('/destination'))->withInput(); 

        }

        

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
 
        //format type  
        $valid_file_types = array("image/png", "image/jpeg", "image/jpg", "image/gif");

        //variable
        $img1 =  $this->VARs()->getFile('gambar1');
        //format type  
        $file_type1 = $img1->getClientMimeType();
        //size
        $size1 = $img1->getSizeByUnit('mb');


        $text11 = "";

        if ($img1->isValid()) { // adagambar  
            if(!in_array($file_type1, $valid_file_types)){
                $text11 = 'The Format You Entered is Wrong,<br>Please Enter the Format: "image/png", "image/jpeg", "image/jpg".';
                $text11 = '<div class="" style="font-size:15px;">[ ' . $text11 . ' ]</div>';
            } elseif ($size1 > 2.000) { 
                $text11 = 'Size is too BIG, Only Available Size 2 Mb or Below';
                $text11 = '<div class="" style="font-size:15px;">[ ' . $text11 . ' ]</div>';
            }
        }



        if (($text1) || ($text2) || ($text11)) {
            session()->setFlashdata('error', $text1 . $text2 . $text11);
            return redirect()->to(base_url('/destination/update/'.$id_destination));
        } else {

            $getDestination = $Destination->where(['id_destination' => $id_destination ,])->first();


            if ($img1->isValid()) { // adagambar
                @unlink("uploads/destination/" . $getDestination->picture_destination);
                if (!$img1->hasMoved()) {
                    $newName1 = $img1->getRandomName();
                    $img1->move('uploads/destination/', $newName1);
                } else {
                    $newName1 = "";
                } 
            }else{ //kosong gambarnyas 
                $newName1 = $getDestination->picture_destination;  
            }


            $data = [
                'nm_destination'         => $nmdestination,
                'picture_destination'    => $newName1, 
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

        $data = [
            'sts_destination'           => 9, 
            'tgl_del_dt_destination'    => date("Y-m-d H:i:s"),
        ];  
        $delete = $Destination->update($id_destination, $data);   
 
        if ($delete) { 
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