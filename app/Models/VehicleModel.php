<?php 
namespace App\Models;

use CodeIgniter\Model;

class VehicleModel extends Model{
    protected $table      = 'tbl_vehicle';   
    protected $primaryKey = 'id_vehicle';
    protected $returnType = 'object'; 
    protected $allowedFields = ['id_vehicle','nm_vehicle','seat','tgl_crt_dt_vehicle','sts_vehicle','tgl_del_dt_vehicle'];
    

    var $column_order = array('id_vehicle','nm_vehicle','seat','tgl_crt_dt_vehicle');
    var $order = array('tgl_crt_dt_vehicle' => 'DESC');


    function get_datatables()
    { 
        
        if ($_POST['length'] != -1); 
                $builder = $this->db->table('tbl_vehicle');

            // search
            if ($_POST['search']['value']) {
                $search = $_POST['search']['value'];
                $builder->like('nm_vehicle', $search);
                $builder->orLike('seat', $search); 
                $builder->orLike('tgl_crt_dt_vehicle', $search); 
            } else {
                $builder->where('id_vehicle !=', '');
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
                $builder->where('sts_vehicle !=', 9); 

                $query = $builder->get();

            return $query->getResult();
 
    }

    function jumlah_semua()
    {
        $builder = $this->db->table('tbl_vehicle');
        $builder->selectCount('id_vehicle');
        $builder->where('sts_vehicle !=', 9); 

        $query = $builder->get();
        return $query->getResult();
 
    }

    function jumlah_filter()
    {

        $builder = $this->db->table('tbl_vehicle');
        $builder->selectCount('id_vehicle');
        // search
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $builder->like('nm_vehicle', $search);
            $builder->orLike('seat', $search); 
            $builder->orLike('tgl_crt_dt_vehicle', $search);
        } else {
            $builder->where('id_vehicle !=', '');
        }


        $builder->where('sts_vehicle !=', 9); 
        $query = $builder->get();
        return $query->getResult();

 
    }


}