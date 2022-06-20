<?php 
namespace App\Models;

use CodeIgniter\Model;

class DriverModel extends Model{
    protected $table      = 'tbl_driver';
    protected $primaryKey = 'id_driver';
    protected $returnType = 'object'; 
    protected $allowedFields = ['id_driver', 'NIK','full_name', 'number_driver', 'picture', 'picture_KTP', 'picture_SIM','tgl_crt_dt_driver'];



    var $column_order = array('NIK','full_name', 'number_driver', 'picture', 'picture_KTP', 'picture_SIM','tgl_crt_dt_driver');
    var $order = array('tgl_crt_dt_driver' => 'DESC');


    function get_datatables()
    { 
        
        if ($_POST['length'] != -1); 
                $builder = $this->db->table('tbl_driver');

            // search
            if ($_POST['search']['value']) {
                $search = $_POST['search']['value'];
                $builder->like('NIK', $search);
                $builder->orLike('full_name', $search); 
                $builder->orLike('number_driver', $search); 
                $builder->orLike('plat_car', $search); 
                $builder->orLike('picture', $search); 
                $builder->orLike('picture_KTP', $search); 
                $builder->orLike('picture_SIM', $search); 
                $builder->orLike('tgl_crt_dt_driver', $search); 
            } else {
                $builder->where('id_driver !=', '');
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

                $query = $builder->get();

            return $query->getResult();
 
    }

    function jumlah_semua()
    {
        $builder = $this->db->table('tbl_driver');
        $builder->selectCount('id_driver');

        $query = $builder->get();
        return $query->getResult();
 
    }

    function jumlah_filter()
    {

        $builder = $this->db->table('tbl_driver');
        $builder->selectCount('id_driver');
        // search
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $builder->like('NIK', $search);
            $builder->orLike('full_name', $search); 
            $builder->orLike('number_driver', $search); 
            $builder->orLike('plat_car', $search); 
            $builder->orLike('picture', $search); 
            $builder->orLike('picture_KTP', $search); 
            $builder->orLike('picture_SIM', $search);  
            $builder->orLike('tgl_crt_dt_driver', $search);
        } else {
            $builder->where('id_driver !=', '');
        }


        $query = $builder->get();
        return $query->getResult();

 
    }







}