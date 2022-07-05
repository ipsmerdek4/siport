<?php  
 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel; 
use App\Models\TransaksiModel; 



class Order extends Controller{

    public function VARs(){ return $request = service('request'); }
    /* function excrip and descript */
    public function encrypt_descrip($action, $string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'asdadoaudo8asudoaud8o';
        $secret_iv = '555555334342423';
        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if( $action == 'decrypt' ) {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }

   

    public function index()
    {  
  
            $User = new UserModel();    

            $title = 'Home &rsaquo; [SIPORT]';

            $sessionID = session()->get('ID');
            if (isset($sessionID)) {
            
                $getUser = $User->where(['id_user' => session()->get('ID'),])->first();
    
                $timesaatlog = strtotime($getUser->tgl_log_user);
                $timesaatini = strtotime(date("Y-m-d H:i:s")); 
            
            }
 
            $data = array(
                'menu'                  => 'myorder',
                'title'                 => $title,    
                'user'                  => session()->get('name'), 
                'timesaatini'           => $timesaatini,
                'timesaatlog'           => $timesaatlog , 
            );

            echo view('ext/L1/header', $data);
            echo view('ext/L1/menu', $data); 
            echo view('v_myorder_lv1', $data);
            echo view('ext/L1/footer', $data); 

    }

    public function list()
    {
        $Transaksi = new TransaksiModel();

        $listing = $Transaksi->get_datatables();
        $jumlah_semua = $Transaksi->jumlah_semua();
        $jumlah_filter = $Transaksi->jumlah_filter();

 
         

        $data = array();
        $no = $_POST['start'];
        foreach ($listing as $key) {

            
            $pack = $key->id_transaksi."^".$key->metode_order;
            $encrypted_txt = $this->encrypt_descrip('encrypt', $pack); 

            $no++;
            //$dataviewsweetalert = $key->nm_destination."(^)".$key->date_of_departure ;
            $row = array( 
                'no' => $no,
                'id_transaksi' => $key->id_transaksi, 
                'nm_destination' => $key->nm_destination, 
                'total_passenger' => $key->total_passenger .' Seat', 
                'status' => $key->status_order,  
                'picture' => '<img class="img" style="width:150px;" src="/QRCODE/'.$key->id_transaksi.'.png">',  
                'date_of_departure' => $key->date_of_departure,  
                 'action' => '<button id="editdata" class="btn btn-success mr-1 pr-2 "'. 
                            //'data-data="' . $dataviewsweetalert . '"   ' .
                            'data-href="' . base_url() . '/destination/update/' . $key->id_transaksi . '"   >' .
                            '<i class="fa fa-info mr-2"></i>'. 
                            ' Details'.
                            '</button>' .
                            '<a class="btn btn-primary mr-1 pr-2 "'.  
                            'href="' . base_url() . '/paymen/p/' . $encrypted_txt . '"   >' .
                            '<i class="fas fa-money-check mr-1"></i>'. 
                            ' Checkout'.
                            '</a>'
            ); 

            $data[] = $row;
        }

        $output = array(
            'draw'  => $_POST['draw'],
            'recordsTotal' => $jumlah_semua[0]->id_transaksi,
            'recordsFiltered' => $jumlah_filter[0]->id_transaksi,
            'data'  => $data
        );


        echo json_encode($output);  

    }
















}