<?php 
namespace App\Models;

use CodeIgniter\Model;

class LocationModel extends Model{
    protected $table      = 'tbl_location'; 
    protected $primaryKey = 'id_location ';
    protected $returnType = 'object';
    protected $allowedFields = ['id_location', 'id_island','name_location', 'ket_location', 'picture', 'tgl_pembuatan_location'];

    function joinlocation()
    {
        $builder = $this->db->table('tbl_location');
        $builder->join('tbl_island', 'tbl_island.id_island = tbl_location.id_island');
        $query = $builder->get();

        return $query->getResult();
    }


    var $column_order = array('name_island', 'name_location', 'ket_location', 'tgl_pembuatan_location');
    var $order = array('tgl_pembuatan_location' => 'DESC');


    function get_datatables()
    {

        if ($_POST['length'] != -1);
        $builder = $this->db->table('tbl_location');
        $builder->join('tbl_island', 'tbl_island.id_island = tbl_location.id_island');

        // search
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $builder->like('name_island', $search);
            $builder->orLike('name_location', $search);
            $builder->orLike('ket_location', $search);
            $builder->orLike('tgl_pembuatan_location', $search);
        } else {
            $builder->where('id_location !=', '');
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
        $builder = $this->db->table('tbl_location');
        $builder->join('tbl_island', 'tbl_island.id_island = tbl_location.id_island');
        $builder->selectCount('id_location');

        $query = $builder->get();
        return $query->getResult();
    }

    function jumlah_filter()
    {

        $builder = $this->db->table('tbl_location');
        $builder->join('tbl_island', 'tbl_island.id_island = tbl_location.id_island');
        $builder->selectCount('id_location');
        // search
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $builder->like('name_island', $search);
            $builder->orLike('name_location', $search);
            $builder->orLike('ket_location', $search);
            $builder->orLike('tgl_pembuatan_location', $search);
        } else {
            $builder->where('id_location !=', '');
        }


        $query = $builder->get();
        return $query->getResult();
    }




}