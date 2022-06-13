<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\LocationModel;
use App\Models\IslandModel;

class Location extends Controller{


    public function index()
    {
        $User = new UserModel();
        $getUser = $User->where(['id_user' => session()->get('ID'),])->first();

        $timesaatlog = strtotime($getUser->tgl_log_user);
        $timesaatini = strtotime(date("Y-m-d H:i:s"));



        $data = array(
            'menu'          => 'datalocation',
            'title'         => 'Data Location &rsaquo; [SIPORT]',
            'user'          => session()->get('name'),
            'timesaatini'   => $timesaatini,
            'timesaatlog'   => $timesaatlog,
        );
        echo view('ext/LA/header', $data);
        echo view('ext/LA/navigasi', $data);
        echo view('ext/LA/menu', $data);
        echo view('v_location_lvA', $data);
        echo view('ext/LA/footer', $data);
    }

    public function listlocation()
    {
        $Location = new LocationModel();

        $listing = $Location->get_datatables();
        $jumlah_semua = $Location->jumlah_semua();
        $jumlah_filter = $Location->jumlah_filter();


        $data = array();
        $no = $_POST['start'];
        foreach ($listing as $key) {
            $no++;
            $dataviewsweetalert = $key->name_island . "(^)" . $key->name_location . "(^)" . $key->tgl_pembuatan_location ;
            $row = array(
                'no' => $no,
                'name_island'               => '<a href="'.base_url(). '/island/@'. $key->name_island.'">'.$key->name_island.'</a>',
                'name_location'             => $key->name_location,
                'ket_location'              => $key->ket_location,
                'picture'                   => '<div>'. 
                                                '<img src="'.base_url(). '/uploads/location/'. 
                                                $key->picture.'" alt="'. $key->picture.'"'. 'class="img " style="width:50px" />'. 
                                                '</div>',
                'tgl_pembuatan_location'    => $key->tgl_pembuatan_location,
                'action'                    => 
                    '<button id="editdata" class="btn btn-success mr-1 pr-2 "' .
                    'data-data="' . $dataviewsweetalert . '"   ' .
                    'data-href="' . base_url() . '/location/edit/' . $key->id_location  . '"   >' .
                    '<i class="far fa-edit"></i>' .
                    '</button>' .
                    '<button id="deldata"  class="btn btn-danger"' .
                    'data-data="' . $dataviewsweetalert . '"   ' .
                    'data-href="' . base_url() . '/location/del/' . $key->id_location  . '"   >' .
                    '<i class="fas fa-trash"></i>' .
                    '</button>',
            );

            $data[] = $row;
        }

        $output = array(
            'draw'  => $_POST['draw'],
            'recordsTotal' => $jumlah_semua[0]->id_location,
            'recordsFiltered' => $jumlah_filter[0]->id_location,
            'data'  => $data
        );

        echo json_encode($output);
    }



    public function insrt_p()
    {
        
        $User = new UserModel();
        $Island = new IslandModel();
        $Location = new LocationModel();

        $getUser = $User->where(['id_user' => session()->get('ID'),])->first();
        $DataIsland = $Island->findAll();

        $timesaatlog = strtotime($getUser->tgl_log_user);
        $timesaatini = strtotime(date("Y-m-d H:i:s"));



        $data = array(
            'menu'          => 'datalocation',
            'title'         => 'Data Location &rsaquo; [SIPORT]',
            'loadHttp'      => 'insert',
            'user'          => session()->get('name'),
            'timesaatini'   => $timesaatini,
            'timesaatlog'   => $timesaatlog,
            'DataIsland'    => $DataIsland,
        );
        echo view('ext/LA/header', $data);
        echo view('ext/LA/navigasi', $data);
        echo view('ext/LA/menu', $data);
        echo view('v_location_insert_lvA', $data);
        echo view('ext/LA/footer', $data);

    }

    public function insrt_pp()
    {
        $Location = new LocationModel();

        $island             = $this->request->getVar('island');
        $namelocation       = $this->request->getVar('namelocation');
        $checknametrue      = $Location->where(['name_location' => $namelocation])->first();
        $ketlocation        = $this->request->getVar('ketlocation');
        $tgllocation        = $this->request->getVar('tgllocation');
         
        $img = $this->request->getFile('gambarnya');
        //format type 
        $file_type = $img->getClientMimeType();
        $valid_file_types = array("image/png", "image/jpeg", "image/jpg");
        //size
        $size = $img->getSizeByUnit('mb');

        $text1 = "";
        $text2 = "";
        $text3 = "";
        $text4 = "";
        $text5 = "";



        if (!$img->isValid()) { 
            $text1 = "Picture Required.";
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        }elseif(!in_array($file_type, $valid_file_types)){
            $text1 = 'The Format You Entered is Wrong,<br>Please Enter the Format: "image/png", "image/jpeg", "image/jpg".';
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        } elseif ($size > 2.000) { 
            $text1 = 'Size is too BIG, Only Available Size 2 Mb or Below';
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        }

        if ($island == "0") {
            $text2 = "Please Select the Island.";
            $text2 = '<div class="" style="font-size:15px;">[ ' . $text2 . ' ]</div>';
        }

        if ($namelocation == "") {
            $text3 = "Name Location Required.";
            $text3 = '<div class="" style="font-size:15px;">[ ' . $text3 . ' ]</div>';
        } elseif (strlen($namelocation) > 300) {
            $text3 = "Name Location max 300 Characters.";
            $text3 = '<div class="" style="font-size:15px;">[ ' . $text3 . ' ]</div>';
        } elseif ($checknametrue) {
            $text3 = "Name Location Already Available.";
            $text3 = '<div class="" style="font-size:15px;">[ ' . $text3 . ' ]</div>';
        }

        if ($ketlocation == "") {
            $text4 = "Description Location Required.";
            $text4 = '<div class="" style="font-size:15px;">[ ' . $text4 . ' ]</div>';
        }

        if ($tgllocation == "") {
            $text5 = "Date Create Data Required.";
            $text5 = '<div class="" style="font-size:15px;">[ ' . $text5 . ' ]</div>';
        }
 
        if (($text1) || ($text2) || ($text3) || ($text4) || ($text5)) { 
            session()->setFlashdata('error', $text2 . $text3 . $text4 . $text1 . $text5 );
            return redirect()->to(base_url('/location/insert'));
        }else{
            if (!$img->hasMoved()) {
                $newName = $img->getRandomName();
                $img->move('uploads/location/', $newName);
            }else{
                $newName = "";
            }

            $Location->insert([
                'id_island' => $island,
                'name_location' => $namelocation,
                'ket_location' => $ketlocation,
                'picture' => $newName,
                'tgl_pembuatan_location' => $tgllocation,
            ]);

            session()->setFlashdata('msg', '<div style="font-size:15px;">Insert Successfully.</div>');
            return redirect()->to(base_url('/location')); 



        }

 


    }

    public function edt_p($id = null)
    {


    }

    public function del_p($id = null)
    {

    }




}