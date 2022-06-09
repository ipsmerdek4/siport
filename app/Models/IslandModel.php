<?php 
namespace App\Models; 
use CodeIgniter\Model;

class IslandModel extends Model{
    protected $table      = 'tbl_island'; 
    protected $primaryKey = 'id_island';
    protected $returnType = 'object';
    protected $allowedFields = ['id_island', 'name_island', 'tgl_pembuatan_island'];

    var $column_order = array('id_island', 'name_island', 'tgl_pembuatan_island');
    var $order = array('id_island' => 'ASC');


    function get_datatables()
    {

        // search
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $kondisi_search = "name_island LIKE '%$search%' OR tgl_pembuatan_island LIKE '%$search%' ";
        } else {
            $kondisi_search = "id_island != ''";
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


        if ($_POST['length'] != -1);
            $db = db_connect();
            $builder = $db->table('tbl_island');
            $query = $builder->select('*')
                    ->where($kondisi_search)
                    ->orderBy($result_order, $result_dir)
                    ->limit($_POST['length'], $_POST['start'])
                    ->get();
            return $query->getResult();

 
    
        
    }

    function jumlah_semua()
    {
        $sQuery = "SELECT COUNT(id_island) as jml FROM tbl_island";
        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query; 
    }

    function jumlah_filter()
    { 
        // kondisi_search
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $kondisi_search = " AND (name_island LIKE '%$search%' OR tgl_pembuatan_island LIKE '%$search%')";
        } else {
            $kondisi_search = "";
        }
        $sQuery = "SELECT COUNT(id_island) as jml FROM tbl_island WHERE id_island != '' $kondisi_search";
        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query; 
        
    }
    


}