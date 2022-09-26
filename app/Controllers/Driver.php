<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel; 
use App\Models\DriverModel;


class Driver extends Controller{

    public function VARs(){ return $request = service('request'); }



    public function index()
    { 
        $User = new UserModel();  
        
        $title = 'Driver &rsaquo; [SIPORT]';

        $sessionID = session()->get('ID');
        if (isset($sessionID)) {
        
            $getUser = $User->where(['id_user' => session()->get('ID'),])->first();

            $timesaatlog = strtotime($getUser->tgl_log_user);
            $timesaatini = strtotime(date("Y-m-d H:i:s")); 
        
        }


        $data = array(  
            'menu'          => 'driver',
            'title'         => $title,
            'user'          => session()->get('name'),
            'timesaatini'   => $timesaatini,
            'timesaatlog'   => $timesaatlog,
        );
 

        echo view('ext/LA/header', $data);
        echo view('ext/LA/navigasi', $data);
        echo view('ext/LA/menu', $data);
        echo view('v_driver_lvA', $data);
        echo view('ext/LA/footer', $data);


    }



    public function list()
    {
        $Driver = new DriverModel();

        $listing = $Driver->get_datatables();
        $jumlah_semua = $Driver->jumlah_semua();
        $jumlah_filter = $Driver->jumlah_filter();


        $data = array();
        $no = $_POST['start'];
        foreach ($listing as $key) {
            $no++;
            $dataviewsweetalert = $key->NIK."(^)".$key->full_name."(^)".$key->tgl_crt_dt_driver ;
            $row = array(
                'no'                => $no,
                'NIK'               => $key->NIK,
                'full_name'         => $key->full_name,
                'number_driver'     => $key->number_driver, 
                'picture'           =>  '<div>'. 
                                            '<img src="'.base_url(). '/uploads/driver/pic_driver/'. 
                                            $key->picture.'" alt="'. $key->picture.'"'. 'class="img " id="pictureview" style="width:50px;cursor: pointer;" '. 
                                            'data-picture="' . $key->picture . '"   ' .
                                            'data-name="' . $key->full_name . '"   ' .
                                            'data-selct="1"   ' .
                                            ' />'. 
                                        '</div>',     
                'picture_KTP'       =>  '<div>'. 
                                            '<img src="'.base_url(). '/uploads/driver/pic_ktp/'. 
                                            $key->picture_KTP.'" alt="'. $key->picture_KTP.'"'. 'class="img " id="pictureview" style="width:50px;cursor: pointer;" '. 
                                            'data-picture="' . $key->picture_KTP . '"   ' .
                                            'data-name="KTP - ' . $key->full_name . '"   ' .
                                            'data-selct="2"   ' .
                                            ' />'. 
                                        '</div>', 
                'picture_SIM'       =>  '<div>'. 
                                            '<img src="'.base_url(). '/uploads/driver/pic_sim/'. 
                                            $key->picture_SIM.'" alt="'. $key->picture_SIM.'"'. 'class="img " id="pictureview" style="width:50px;cursor: pointer;" '. 
                                            'data-picture="' . $key->picture_SIM . '"   ' .
                                            'data-name="SIM - ' . $key->full_name . '"   ' .
                                            'data-selct="3"   ' .
                                            ' />'. 
                                        '</div>', 
                'tgl'               => $key->tgl_crt_dt_driver,
                'action' => '<button id="editdata" class="btn btn-success mr-1 pr-2 "'. 
                            'data-data="' . $dataviewsweetalert . '"   ' .
                            'data-href="' . base_url() . '/driver/update/' . $key->id_driver  . '"   >' .
                            '<i class="far fa-edit"></i>'.
                            '</button>' .
                            '<button id="deldata"  class="btn btn-danger"'.
                            'data-data="'. $dataviewsweetalert.'"   ' .
                            'data-href="' . base_url() . '/driver/delete/' . $key->id_driver  . '"   >' .
                            '<i class="fas fa-trash"></i>' .
                            '</button>',
            ); 

            $data[] = $row;
        }

        $output = array(
            'draw'  => $_POST['draw'],
            'recordsTotal' => $jumlah_semua[0]->id_driver,
            'recordsFiltered' => $jumlah_filter[0]->id_driver,
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
            'menu'          => 'driver',
            'loadHttp'      => 'insert',
            'title'         => 'Driver &rsaquo; [SIPORT]',
            'user'          => session()->get('name'),
            'timesaatini'   => $timesaatini,
            'timesaatlog'   => $timesaatlog,
        );

        echo view('ext/LA/header', $data);
        echo view('ext/LA/navigasi', $data);
        echo view('ext/LA/menu', $data);
        echo view('v_driver_save_lvA.php', $data);
        echo view('ext/LA/footer', $data);
    }

    public function inp_progress()
    {

        $Driver = new DriverModel();

        $nik = $this->VARs()->getVar('name1');
        $fullname = $this->VARs()->getVar('name2');
        $number = $this->VARs()->getVar('name3'); 

        $checknametrue1  = $Driver->where(['NIK' => $nik])->first();
        $checknametrue2  = $Driver->where(['number_driver' => $number])->first(); 
    

        $tgldriver = $this->VARs()->getVar('tgldate');

        $text1 = "";
        $text2 = "";
        $text3 = ""; 
        $text5 = "";

        if ($nik == "") {
            $text1 = "NIK Required.";
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        } elseif (strlen($nik) > 50) {
            $text1 = "NIK Max 50 Character.";
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        }elseif($checknametrue1){
            $text1 = "NIK Already Available.";
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        }  
        /*  */ 
        if ($fullname == "") {
            $text2 = "Name Required.";
            $text2 = '<div class="" style="font-size:15px;">[ ' . $text2 . ' ]</div>';
        } elseif (strlen($fullname) > 100) {
            $text2 = "Name Max 100 Character.";
            $text2 = '<div class="" style="font-size:15px;">[ ' . $text2 . ' ]</div>';
        }  
        /*  */ 
        if ($number == "") {
            $text3 = "Number Hp/WhatsApp Required.";
            $text3 = '<div class="" style="font-size:15px;">[ ' . $text3 . ' ]</div>';
        } elseif (strlen($number) > 20) {
            $text3 = "Number Hp/WhatsApp Max 20 Character.";
            $text3 = '<div class="" style="font-size:15px;">[ ' . $text3 . ' ]</div>';
         }elseif($checknametrue2){
            $text3 = "Number Already Available.";
            $text3 = '<div class="" style="font-size:15px;">[ ' . $text3 . ' ]</div>';
        }   
        /*  */
        if ($tgldriver == "") {
            $text5 = "Date Create Required.";
            $text5 = '<div class="" style="font-size:15px;">[ ' . $text5 . ' ]</div>';
        }

        //format type  
        $valid_file_types = array("image/png", "image/jpeg", "image/jpg");

        //variable
        $img1 =  $this->VARs()->getFile('gambar1');
        $img2 =  $this->VARs()->getFile('gambar2');
        $img3 =  $this->VARs()->getFile('gambar3');
        //format type  
        $file_type1 = $img1->getClientMimeType();
        $file_type2 = $img2->getClientMimeType();
        $file_type3 = $img3->getClientMimeType();
        //size
        $size1 = $img1->getSizeByUnit('mb');
        $size2 = $img2->getSizeByUnit('mb');
        $size3 = $img3->getSizeByUnit('mb');

        $text11 = "";
        $text12 = "";
        $text13 = "";

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


        if (!$img2->isValid()) { 
            $text12 = "Picture KTP Required.";
            $text12 = '<div class="" style="font-size:15px;">[ ' . $text12 . ' ]</div>';
        }elseif(!in_array($file_type2, $valid_file_types)){
            $text12 = 'The Format You Entered is Wrong,<br>Please Enter the Format: "image/png", "image/jpeg", "image/jpg".';
            $text12 = '<div class="" style="font-size:15px;">[ ' . $text12 . ' ]</div>';
        } elseif ($size2 > 2.000) { 
            $text12 = 'Size is too BIG, Only Available Size 2 Mb or Below';
            $text12 = '<div class="" style="font-size:15px;">[ ' . $text12 . ' ]</div>';
        }

        if (!$img3->isValid()) { 
            $text13 = "Picture SIM Required.";
            $text13 = '<div class="" style="font-size:15px;">[ ' . $text13 . ' ]</div>';
        }elseif(!in_array($file_type3, $valid_file_types)){
            $text13 = 'The Format You Entered is Wrong,<br>Please Enter the Format: "image/png", "image/jpeg", "image/jpg".';
            $text13 = '<div class="" style="font-size:15px;">[ ' . $text13 . ' ]</div>';
        } elseif ($size3 > 2.000) { 
            $text13 = 'Size is too BIG, Only Available Size 2 Mb or Below';
            $text13 = '<div class="" style="font-size:15px;">[ ' . $text13 . ' ]</div>';
        }


        if (($text1) || ($text2) || ($text3)  || ($text5) || ($text11) || ($text12) || ($text13)) {
            session()->setFlashdata('error', $text1 . $text2 . $text3   . $text5 . $text11 . $text12 . $text13);
            return redirect()->to(base_url('/driver/insert'));
        } else {

            if (!$img1->hasMoved()) {
                $newName1 = $img1->getRandomName();
                $img1->move('uploads/driver/pic_driver/', $newName1);
            }else{
                $newName1 = "";
            }

            if (!$img2->hasMoved()) {
                $newName2 = $img2->getRandomName();
                $img2->move('uploads/driver/pic_ktp/', $newName2);
            }else{
                $newName2 = "";
            }

            if (!$img3->hasMoved()) {
                $newName3 = $img3->getRandomName();
                $img3->move('uploads/driver/pic_sim/', $newName3);
            }else{
                $newName3 = "";
            }

 
            $Driver->insert([
                'NIK'                       => $nik, 
                'full_name'                 => $fullname, 
                'number_driver'             => $number,  
                'picture'                   => $newName1, 
                'picture_KTP'               => $newName2, 
                'picture_SIM'               => $newName3, 
                'tgl_crt_dt_driver'         => $tgldriver,
            ]);  

            session()->setFlashdata('msg', '<div style="font-size:15px;">Insert Successfully.</div>');
            return redirect()->to(base_url('/driver'))->withInput(); 

        }

        

    }
 
    public function update($id = null)
    {
        $id_driver = $id; 

        $Driver = new DriverModel(); 
        $User = new UserModel();   

        $getDriver = $Driver->where(['id_driver' => $id_driver ,])->first();

        $sessionID = session()->get('ID');
        if (isset($sessionID)) {
        
            $getUser = $User->where(['id_user' => session()->get('ID'),])->first();

            $timesaatlog = strtotime($getUser->tgl_log_user);
            $timesaatini = strtotime(date("Y-m-d H:i:s")); 
        
        }

        $data = array(  
            'menu'              => 'driver',
            'loadHttp'          => 'update',
            'title'             => 'Driver &rsaquo; [SIPORT]',
            'user'              => session()->get('name'),
            'timesaatini'       => $timesaatini,
            'timesaatlog'       => $timesaatlog,
            'getDriver'         => $getDriver,
        );

        echo view('ext/LA/header', $data);
        echo view('ext/LA/navigasi', $data);
        echo view('ext/LA/menu', $data);
        echo view('v_driver_save_lvA', $data);
        echo view('ext/LA/footer', $data);
    }


    public function up_progress($id = null)
    {
        $id_driver = $id; 
        $Driver = new DriverModel();


        $nik = $this->VARs()->getVar('name1');
        $fullname = $this->VARs()->getVar('name2');
        $number = $this->VARs()->getVar('name3'); 
        $tgldriver = $this->VARs()->getVar('tgldate');

        $text1 = "";
        $text2 = "";
        $text3 = ""; 
        $text5 = "";

        if ($nik == "") {
            $text1 = "NIK Required.";
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        } elseif (strlen($nik) > 50) {
            $text1 = "NIK Max 50 Character.";
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        } 
        /*  */ 
        if ($fullname == "") {
            $text2 = "Name Required.";
            $text2 = '<div class="" style="font-size:15px;">[ ' . $text2 . ' ]</div>';
        } elseif (strlen($fullname) > 100) {
            $text2 = "Name Max 100 Character.";
            $text2 = '<div class="" style="font-size:15px;">[ ' . $text2 . ' ]</div>';
        }  
        /*  */ 
        if ($number == "") {
            $text3 = "Number Hp/WhatsApp Required.";
            $text3 = '<div class="" style="font-size:15px;">[ ' . $text3 . ' ]</div>';
        } elseif (strlen($number) > 20) {
            $text3 = "Number Hp/WhatsApp Max 20 Character.";
            $text3 = '<div class="" style="font-size:15px;">[ ' . $text3 . ' ]</div>';
        }   
        /*  */
        if ($tgldriver == "") {
            $text5 = "Date Create Required.";
            $text5 = '<div class="" style="font-size:15px;">[ ' . $text5 . ' ]</div>';
        }

         //format type  
         $valid_file_types = array("image/png", "image/jpeg", "image/jpg");

         //variable
         $img1 =  $this->VARs()->getFile('gambar1');
         $img2 =  $this->VARs()->getFile('gambar2');
         $img3 =  $this->VARs()->getFile('gambar3');
         //format type  
         $file_type1 = $img1->getClientMimeType();
         $file_type2 = $img2->getClientMimeType();
         $file_type3 = $img3->getClientMimeType();
         //size
         $size1 = $img1->getSizeByUnit('mb');
         $size2 = $img2->getSizeByUnit('mb');
         $size3 = $img3->getSizeByUnit('mb');
 
         $text11 = "";
         $text12 = "";
         $text13 = "";

        if ($img1->isValid()) { // adagambar 
            if(!in_array($file_type1, $valid_file_types)){
                $text11 = 'The Format You Entered is Wrong,<br>Please Enter the Format: "image/png", "image/jpeg", "image/jpg".';
                $text11 = '<div class="" style="font-size:15px;">[ ' . $text11 . ' ]</div>';
            } elseif ($size1 > 2.000) { 
                $text11 = 'Size is too BIG, Only Available Size 2 Mb or Below';
                $text11 = '<div class="" style="font-size:15px;">[ ' . $text11 . ' ]</div>';
            }
        }
 
        if ($img2->isValid()) { // adagambar  
            if(!in_array($file_type2, $valid_file_types)){
                $text12 = 'The Format You Entered is Wrong,<br>Please Enter the Format: "image/png", "image/jpeg", "image/jpg".';
                $text12 = '<div class="" style="font-size:15px;">[ ' . $text12 . ' ]</div>';
            } elseif ($size2 > 2.000) { 
                $text12 = 'Size is too BIG, Only Available Size 2 Mb or Below';
                $text12 = '<div class="" style="font-size:15px;">[ ' . $text12 . ' ]</div>';
            }
        }

        if ($img3->isValid()) { // adagambar   
            if(!in_array($file_type3, $valid_file_types)){
                $text13 = 'The Format You Entered is Wrong,<br>Please Enter the Format: "image/png", "image/jpeg", "image/jpg".';
                $text13 = '<div class="" style="font-size:15px;">[ ' . $text13 . ' ]</div>';
            } elseif ($size3 > 2.000) { 
                $text13 = 'Size is too BIG, Only Available Size 2 Mb or Below';
                $text13 = '<div class="" style="font-size:15px;">[ ' . $text13 . ' ]</div>';
            }
        }
   
 
        if (($text1) || ($text2) || ($text3)  || ($text5) || ($text11) || ($text12) || ($text13)) {
            session()->setFlashdata('error', $text1 . $text2 . $text3 . $text5 . $text11 . $text12 . $text13);
            return redirect()->to(base_url('/driver/update/'.$id_driver));
        } else {

            $getDriver = $Driver->where(['id_driver' => $id_driver ,])->first();
 

            if ($img1->isValid()) { // adagambar
                @unlink("uploads/driver/pic_driver/" . $getDriver->picture);
                if (!$img1->hasMoved()) {
                    $newName1 = $img1->getRandomName();
                    $img1->move('uploads/driver/pic_driver/', $newName1);
                } else {
                    $newName1 = "";
                } 
            }else{ //kosong gambarnyas 
                $newName1 = $getDriver->picture;  
            }

            if ($img2->isValid()) { // adagambar
                @unlink("uploads/driver/pic_ktp/" . $getDriver->picture_KTP);
                if (!$img2->hasMoved()) {
                    $newName2 = $img2->getRandomName();
                    $img2->move('uploads/driver/pic_ktp/', $newName2);
                } else {
                    $newName2 = "";
                } 
            }else{ //kosong gambarnyas 
                $newName2 = $getDriver->picture_KTP;  
            }

            if ($img3->isValid()) { // adagambar
                @unlink("uploads/driver/pic_sim/" . $getDriver->picture_SIM);
                if (!$img3->hasMoved()) {
                    $newName3 = $img3->getRandomName();
                    $img3->move('uploads/driver/pic_sim/', $newName3);
                } else {
                    $newName3 = "";
                } 
            }else{ //kosong gambarnyas 
                $newName3 = $getDriver->picture_SIM;  
            }

  
            $data = [
                'NIK'                       => $nik, 
                'full_name'                 => $fullname, 
                'number_driver'             => $number,  
                'picture'                   => $newName1, 
                'picture_KTP'               => $newName2, 
                'picture_SIM'               => $newName3, 
                'tgl_crt_dt_driver'         => $tgldriver,
            ];  
            $Driver->update($id_driver, $data);  

            session()->setFlashdata('msg', '<div style="font-size:15px;">Update Successfully.</div>');
            return redirect()->to(base_url('/driver'));  
        }
 



    }

 
    public function delete( $id = null)
    {
        $id_driver = $id; 
        $Driver = new DriverModel();
        $getDriver = $Driver->where(['id_driver' => $id_driver ,])->first(); 

        $data = [
            'sts_driver'           => 9, 
            'tgl_del_dt_driver'    => date("Y-m-d H:i:s"),
        ];  
        $delete = $Driver->update($id_driver, $data);   
 
        if ($delete) { 
            session()->setFlashdata('msg',  '<div style="font-size:15px;">Delete Successfully.<br><br>' . 
                                            '<b>[ NIK => ' .  $getDriver->NIK. ' ]</b><br>' .
                                            '<b>[ Name => ' . $getDriver->full_name . ' ]</b><br>' .
                                            '<b>[ Date Data => '. $getDriver->tgl_crt_dt_driver .' ]</b><br></div>');
            return redirect()->to(base_url('/driver'));
        } else {
            session()->setFlashdata('error', '<div class="" style="font-size:15px;">An error occurred while deleting data.<br>Please repeat again.</div>');
            return redirect()->to(base_url('/driver'));
        } 


        /*   
        if ($Driver->find($id_driver)) {
            @unlink("uploads/driver/pic_driver/" . $getDriver->picture);
            @unlink("uploads/driver/pic_ktp/" . $getDriver->picture_KTP);
            @unlink("uploads/driver/pic_sim/" . $getDriver->picture_SIM);
            $Driver->delete($id_driver);

          
        } else {
            session()->setFlashdata('error', '<div class="" style="font-size:15px;">An error occurred while deleting data.<br>Please repeat again.</div>');
            return redirect()->to(base_url('/driver'));
        } 
        */





    }





}