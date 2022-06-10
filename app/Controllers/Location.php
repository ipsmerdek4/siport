<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\LocationModel;

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
                'picture'                   => $key->picture,
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

    

    }

    public function edt_p($id = null)
    {


    }

    public function del_p($id = null)
    {

    }




}