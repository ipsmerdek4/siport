<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\IslandModel; 

class Island extends Controller{



    public function index()
    {
        $User = new UserModel();   
        $getUser = $User->where(['id_user' => session()->get('ID'),])->first();

        $timesaatlog = strtotime($getUser->tgl_log_user);
        $timesaatini = strtotime(date("Y-m-d H:i:s")); 



        $data = array(
            'menu'          => 'dataisland',
            'title'         => 'Data Island &rsaquo; [SIPORT]',
            'user'          => session()->get('name'),
            'timesaatini'   => $timesaatini,
            'timesaatlog'   => $timesaatlog,
        );
        echo view('ext/LA/header', $data);
        echo view('ext/LA/navigasi', $data);
        echo view('ext/LA/menu', $data);
        echo view('v_island_lvA', $data);
        echo view('ext/LA/footer', $data);
    }

    public function listisland()
    {
        $Island = new IslandModel();
 
        $listing = $Island->get_datatables();
        $jumlah_semua = $Island->jumlah_semua();
        $jumlah_filter = $Island->jumlah_filter();
         
      
        $data = array();
        $no = $_POST['start'];
        foreach ($listing as $key)
        {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $key->name_island;
            $row[] = $key->tgl_pembuatan_island; 

            $data[] = $row;
        }

        $output = array(
            'draw'  => $_POST['draw'],
            'recordsTotal' => $jumlah_semua->jml,
            'recordsFiltered' => $jumlah_filter->jml,
            'data'  => $data
        );

        echo json_encode($output);

    }


}