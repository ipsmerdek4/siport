<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\IslandModel;

class Island extends Controller
{
 
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
        foreach ($listing as $key) {
            $no++;
            $dataviewsweetalert = $key->name_island."(^)".$key->tgl_pembuatan_island ;
            $row = array(
                'no' => $no,
                'name_island' => $key->name_island,
                'tgl_pembuatan_island' => $key->tgl_pembuatan_island,
                'action' => '<button id="editdata" class="btn btn-success mr-1 pr-2 "'. 
                            'data-data="' . $dataviewsweetalert . '"   ' .
                            'data-href="' . base_url() . '/island/edit/' . $key->id_island . '"   >' .
                            '<i class="far fa-edit"></i>'.
                            '</button>' .
                            '<button id="deldata"  class="btn btn-danger"'.
                            'data-data="'. $dataviewsweetalert.'"   ' .
                            'data-href="' . base_url() . '/island/del/' . $key->id_island . '"   >' .
                            '<i class="fas fa-trash"></i>' .
                            '</button>',
            ); 

            $data[] = $row;
        }

        $output = array(
            'draw'  => $_POST['draw'],
            'recordsTotal' => $jumlah_semua[0]->id_island,
            'recordsFiltered' => $jumlah_filter[0]->id_island,
            'data'  => $data
        );

        echo json_encode($output); 
    }



    public function insrt_p()
    {

        $User = new UserModel();
        $getUser = $User->where(['id_user' => session()->get('ID'),])->first();

        $timesaatlog = strtotime($getUser->tgl_log_user);
        $timesaatini = strtotime(date("Y-m-d H:i:s"));
        $data = array(
                'menu'          => 'dataisland',
                'title'         => 'Data Island &rsaquo; [SIPORT]',
                'loadHttp'      => 'insert',
                'user'          => session()->get('name'),
                'timesaatini'   => $timesaatini,
                'timesaatlog'   => $timesaatlog,
            );
        echo view('ext/LA/header', $data);
        echo view('ext/LA/navigasi', $data);
        echo view('ext/LA/menu', $data);
        echo view('v_island_insert_lvA', $data);
        echo view('ext/LA/footer', $data);


    }


    public function insrt_pp()
    {
        $Island = new IslandModel();

        $nameisland     = $this->request->getVar('nameisland');
        $checknametrue  = $Island->where(['name_island' => $nameisland])->first();

        $tglisland =  $this->request->getVar('tglisland');

        $text1 = "";
        $text2 = "";
        if ($nameisland == "") {
            $text1 = "Name Island Required.";
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        } elseif (strlen($nameisland) > 300) {
            $text1 = "Name Island Minimum 300 Characters.";
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        }elseif($checknametrue){
            $text1 = "Name Island Already Available.";
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        }  
        /*  */
        if ($tglisland == "") {
            $text2 = "Date Create Data Required.";
            $text2 = '<div class="" style="font-size:15px;">[ ' . $text2 . ' ]</div>';
        }

        if (($text1) || ($text2)) {
            session()->setFlashdata('error', $text1 . $text2);
            return redirect()->to(base_url('/island/insert'));
        } else {

            $Island->insert([
                'name_island' => $nameisland, 
                'tgl_pembuatan_island' => $tglisland,
            ]);

            session()->setFlashdata('msg', '<div style="font-size:15px;">Insert Successfully.</div>');
            return redirect()->to(base_url('/island'))->withInput(); 

        }

    }

    public function edt_p($id = null)
    { 
        $id_island = $id;

        $User = new UserModel();
        $Island = new IslandModel();

        $getUser = $User->where(['id_user' => session()->get('ID'),])->first();
        $getIsland = $Island->where(['id_island' => $id_island,])->first();

 
        $timesaatlog = strtotime($getUser->tgl_log_user);
        $timesaatini = strtotime(date("Y-m-d H:i:s"));
        $data = array(
            'menu'          => 'dataisland',
            'title'         => 'Data Island &rsaquo; [SIPORT]',
            'user'          => session()->get('name'),
            'loadHttp'      => 'update',
            'timesaatini'   => $timesaatini,
            'timesaatlog'   => $timesaatlog,
            'getIsland'     => $getIsland,
        );
        echo view('ext/LA/header', $data);
        echo view('ext/LA/navigasi', $data);
        echo view('ext/LA/menu', $data);
        echo view('v_island_insert_lvA', $data);
        echo view('ext/LA/footer', $data); 

    }

    public function edt_pp($id = null)
    {
        $id_island = $id;
        $Island = new IslandModel();

        $nameisland = $this->request->getVar('nameisland');
        $tglisland =  $this->request->getVar('tglisland');

        $text1 = "";
        $text2 = "";
        if ($nameisland == "") {
            $text1 = "Name Island Required.";
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        } elseif (strlen($nameisland) > 300) {
            $text1 = "Name Island Minimum 300 Characters.";
            $text1 = '<div class="" style="font-size:15px;">[ ' . $text1 . ' ]</div>';
        }
        /*  */
        if ($tglisland == "") {
            $text2 = "Date Create Data Required.";
            $text2 = '<div class="" style="font-size:15px;">[ ' . $text2 . ' ]</div>';
        }

        if (($text1) || ($text2)) {
            session()->setFlashdata('error', $text1 . $text2);
            return redirect()->to(base_url('/island/edit/'.$id));
        } else {

            $data = [
                'name_island' => $nameisland,
                'tgl_pembuatan_island' => $tglisland,
            ];  
            $Island->update($id_island, $data); 

            session()->setFlashdata('msg', '<div style="font-size:15px;">Update Successfully.</div>');
            return redirect()->to(base_url('/island')); 




        }
    }


    public function del_p($id = null)
    {

        $id_island = $id;
        $Island = new IslandModel();
        $getIsland = $Island->where(['id_island' => $id_island,])->first();
 
        if ($Island->find($id_island)) {
            $Island->delete($id_island);

            session()->setFlashdata('msg', '<div style="font-size:15px;">Delete Successfully.<br><br>'.
            '<b>[ ID => ' . $getIsland->id_island  . ' ]</b><br>' .
            '<b>[ Name Island => ' . $getIsland->name_island . ' ]</b><br>' .
            '<b>[ Date Data => '. $getIsland->tgl_pembuatan_island.' ]</b></div>');
            return redirect()->to(base_url('/island')); 
        } else {
            session()->setFlashdata('error', '<div class="" style="font-size:15px;">An error occurred while deleting data.<br>Please repeat again.</div>');
            return redirect()->to(base_url('/island'));
        } 


    }





}
