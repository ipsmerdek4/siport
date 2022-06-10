<?php 
namespace App\Models; 
use CodeIgniter\Model;

class IslandModel extends Model{
    protected $table      = 'tbl_island'; 
    protected $primaryKey = 'id_island';
    protected $returnType = 'object';
    protected $allowedFields = ['id_island', 'name_island', 'tgl_pembuatan_island'];

    var $column_order = array('id_island', 'name_island', 'tgl_pembuatan_island');
    var $order = array('tgl_pembuatan_island' => 'DESC');


    function get_datatables()
    { 
        
        if ($_POST['length'] != -1); 
                $builder = $this->db->table('tbl_island');

            // search
            if ($_POST['search']['value']) {
                $search = $_POST['search']['value'];
                $builder->like('name_island', $search);
                $builder->orLike('tgl_pembuatan_island', $search); 
            } else {
                $builder->where('id_island !=', '');
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
        $builder = $this->db->table('tbl_island');
        $builder->selectCount('id_island');

        $query = $builder->get();
        return $query->getResult();
 
    }

    function jumlah_filter()
    {

        $builder = $this->db->table('tbl_island');
        $builder->selectCount('id_island');
        // search
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $builder->like('name_island', $search);
            $builder->orLike('tgl_pembuatan_island', $search);
        } else {
            $builder->where('id_island !=', '');
        }


        $query = $builder->get();
        return $query->getResult();

 
    }
    


}