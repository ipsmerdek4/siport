<?php 
namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model{
    protected $table      = 'tbl_transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $returnType = 'object'; 
    protected $allowedFields = [ 'id_transaksi',
        'id_departure','id_destination', 'total_passenger','total_price', 'title_order', 
        'name_order', 'email_order', 'phone_order', 'metode_order',
        'status_order', 'tgl_crt_dt_transaksi'
    ];
 
    var $column_order = array('id_transaksi', 'nm_destination','total_passenger','date_of_departure','status_order', '');
    var $order = array('tgl_crt_dt_transaksi' => 'DESC');



    function get_datatables()
    { 
        
        if ($_POST['length'] != -1); 
                $builder = $this->db->table('tbl_transaksi'); 
                $builder->join('tbl_departure', 'tbl_transaksi.id_departure = tbl_departure.id_departure');
                $builder->join('tbl_destination', 'tbl_transaksi.id_destination = tbl_destination.id_destination');

            // search
            if ($_POST['search']['value']) {
                $search = $_POST['search']['value'];
                $builder->Like('id_transaksi', $search);  
                $builder->orLike('nm_destination', $search);  
                $builder->orLike('total_passenger', $search);  
                $builder->orLike('status_order', $search); 
                $builder->orLike('date_of_departure', $search);  
            } else {
                $builder->where('id_transaksi !=', '');
            }

            // order
            if (isset($_POST['order'])) {
                echo $_POST['order']['0']['column'];
                $result_order = $this->column_order[$_POST['order']['0']['column']];
                $result_dir = $_POST['order']['0']['dir'];
            } else if ($this->order) {
                $order = $this->order;
                $result_order = key($order);
                $result_dir = $order[key($order)];
            }

                $builder->orderBy($result_order, $result_dir);
                $builder->limit($_POST['length'], $_POST['start']); 

                $query = $builder->get();

            return $query->getResult();
 
    }

    function jumlah_semua()
    {
        $builder = $this->db->table('tbl_transaksi');  
        $builder->join('tbl_departure', 'tbl_transaksi.id_departure = tbl_departure.id_departure');
        $builder->join('tbl_destination', 'tbl_transaksi.id_destination = tbl_destination.id_destination');

        $builder->selectCount('id_transaksi'); 
        $query = $builder->get();
        return $query->getResult(); 
    }

    function jumlah_filter()
    {

        $builder = $this->db->table('tbl_transaksi'); 
        $builder->join('tbl_departure', 'tbl_transaksi.id_departure = tbl_departure.id_departure');
        $builder->join('tbl_destination', 'tbl_transaksi.id_destination = tbl_destination.id_destination');

        $builder->selectCount('id_transaksi');
        // search
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $builder->Like('id_transaksi', $search);  
            $builder->orLike('nm_destination', $search);  
            $builder->orLike('total_passenger', $search);    
            $builder->orLike('status_order', $search); 
            $builder->orLike('date_of_departure', $search);  
        } else {
           $builder->where('id_transaksi !=', ''); 



}


        $query = $builder->get();
        return $query->getResult();

 
    }
    
 



}