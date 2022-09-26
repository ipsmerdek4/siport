<?php 
namespace App\Models;

use CodeIgniter\Model;

class DestinationModel extends Model{
    protected $table      = 'tbl_destination';   
    protected $primaryKey = 'id_destination';
    protected $returnType = 'object'; 
    protected $allowedFields = ['id_destination','nm_destination','picture_destination','sts_destination','tgl_crt_dt_destination','tgl_del_dt_destination'];

    var $column_order = array('id_destination','nm_destination','tgl_crt_dt_destination');
    var $order = array('tgl_crt_dt_destination' => 'DESC');


    function get_datatables()
    { 
        
        if ($_POST['length'] != -1); 
                $builder = $this->db->table('tbl_destination');

            // search
            if ($_POST['search']['value']) {
                $search = $_POST['search']['value'];
                $builder->like('nm_destination', $search);
                $builder->orLike('tgl_crt_dt_destination', $search); 
            } else {
                $builder->where('id_destination !=', '');
            }

            // order
            if (isset($_POST['order'])) {
                $result_order = $this->column_order[$_POST['order']['0']['column']];
                $result_dir = $_POST['order']['0']['dir'];
            } else if ($this->order) {
                $order = $this->order;
                $result_order = key($order);
                $result_dir = $order[key($order)];
            }

                $builder->orderBy($result_order, $result_dir);
                $builder->limit($_POST['length'], $_POST['start']); 
                $builder->where('sts_destination !=', 9); 



                $query = $builder->get();

                return $query->getResult();
 
    }

    function jumlah_semua()
    {
        $builder = $this->db->table('tbl_destination');
        $builder->selectCount('id_destination');
        $builder->where('sts_destination !=', 9); 

        $query = $builder->get();
        return $query->getResult();
 
    }

    function jumlah_filter()
    {

        $builder = $this->db->table('tbl_destination');
        $builder->selectCount('id_destination');
        // search
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $builder->like('nm_destination', $search);
            $builder->orLike('tgl_crt_dt_destination', $search);
        } else {
            $builder->where('id_destination !=', '');
        }


        $builder->where('sts_destination !=', 9); 
        $query = $builder->get();
        return $query->getResult();

 
    }
    



}