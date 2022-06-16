<?php 
namespace App\Models;

use CodeIgniter\Model;

class TujuanModel extends Model{
    protected $table      = 'tbl_tujuan';
    protected $primaryKey = 'id_tujuan';
    protected $returnType = 'object'; 
    protected $allowedFields = ['id_tujuan','nm_tujuan','tgl_crt_dt_tujuan'];

    var $column_order = array('id_tujuan','nm_tujuan','tgl_crt_dt_tujuan');
    var $order = array('tgl_crt_dt_tujuan' => 'DESC');


    function get_datatables()
    { 
        
        if ($_POST['length'] != -1); 
                $builder = $this->db->table('tbl_tujuan');

            // search
            if ($_POST['search']['value']) {
                $search = $_POST['search']['value'];
                $builder->like('nm_tujuan', $search);
                $builder->orLike('tgl_crt_dt_tujuan', $search); 
            } else {
                $builder->where('id_tujuan !=', '');
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
        $builder = $this->db->table('tbl_tujuan');
        $builder->selectCount('id_tujuan');

        $query = $builder->get();
        return $query->getResult();
 
    }

    function jumlah_filter()
    {

        $builder = $this->db->table('tbl_tujuan');
        $builder->selectCount('id_tujuan');
        // search
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $builder->like('nm_tujuan', $search);
            $builder->orLike('tgl_crt_dt_tujuan', $search);
        } else {
            $builder->where('id_tujuan !=', '');
        }


        $query = $builder->get();
        return $query->getResult();

 
    }
    













}