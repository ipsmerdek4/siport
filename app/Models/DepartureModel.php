<?php 
namespace App\Models;

use CodeIgniter\Model;

class DepartureModel extends Model{
    protected $table      = 'tbl_departure';
    protected $primaryKey = 'id_departure';
    protected $returnType = 'object'; 
    protected $allowedFields = ['id_destination','id_vehicle', 'plat_number', 'book_seat', 'id_driver', 'date_of_departure', 'price', 'tgl_crt_dt_departure'];


    function whereandlike($nameW = null, $where = null, $nameL = null, $like = null)
    { 
        $builder = $this->db->table('tbl_departure');
        $builder->join('tbl_destination', 'tbl_destination.id_destination = tbl_departure.id_destination');
        $builder->join('tbl_vehicle', 'tbl_vehicle.id_vehicle = tbl_departure.id_vehicle');
        $builder->join('tbl_driver', 'tbl_driver.id_driver = tbl_departure.id_driver'); 
        $builder->where($nameW, $where); 
        $builder->like($nameL, $like); 

        $query = $builder->get();
        return $query->getResult();
    }

    function joinAll($id = null){
        $builder = $this->db->table('tbl_departure');
        $builder->join('tbl_destination', 'tbl_destination.id_destination = tbl_departure.id_destination');
        $builder->join('tbl_vehicle', 'tbl_vehicle.id_vehicle = tbl_departure.id_vehicle');
        $builder->join('tbl_driver', 'tbl_driver.id_driver = tbl_departure.id_driver'); 
        $builder->where('id_departure', $id); 

        $query = $builder->get();
        return $query->getResult();
    }

    var $column_order = array('id_destination','id_vehicle', 'plat_number', 'id_driver', 'date_of_departure', 'price', 'tgl_crt_dt_departure');
    var $order = array('tgl_crt_dt_departure' => 'DESC');


    function get_datatables()
    { 
        
        if ($_POST['length'] != -1); 
                $builder = $this->db->table('tbl_departure'); 
                $builder->join('tbl_destination', 'tbl_destination.id_destination = tbl_departure.id_destination');
                $builder->join('tbl_vehicle', 'tbl_vehicle.id_vehicle = tbl_departure.id_vehicle');
                $builder->join('tbl_driver', 'tbl_driver.id_driver = tbl_departure.id_driver');
            // search
            if ($_POST['search']['value']) {
                $search = $_POST['search']['value'];
                $builder->like('id_destination', $search);
                $builder->orLike('id_vehicle', $search); 
                $builder->orLike('plat_number', $search); 
                $builder->orLike('id_driver', $search); 
                $builder->orLike('date_of_departure', $search); 
                $builder->orLike('price', $search); 
                $builder->orLike('tgl_crt_dt_departure', $search); 
            } else {
                $builder->where('id_departure !=', '');
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
        $builder = $this->db->table('tbl_departure');
        $builder->join('tbl_destination', 'tbl_destination.id_destination = tbl_departure.id_destination');
        $builder->join('tbl_vehicle', 'tbl_vehicle.id_vehicle = tbl_departure.id_vehicle');
        $builder->join('tbl_driver', 'tbl_driver.id_driver = tbl_departure.id_driver');
        $builder->selectCount('id_departure');

        $query = $builder->get();
        return $query->getResult();
 
    }

    function jumlah_filter()
    {

        $builder = $this->db->table('tbl_departure');
        $builder->join('tbl_destination', 'tbl_destination.id_destination = tbl_departure.id_destination');
        $builder->join('tbl_vehicle', 'tbl_vehicle.id_vehicle = tbl_departure.id_vehicle');
        $builder->join('tbl_driver', 'tbl_driver.id_driver = tbl_departure.id_driver');
        $builder->selectCount('id_departure');
        // search
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $builder->like('id_destination', $search);
            $builder->orLike('id_vehicle', $search); 
            $builder->orLike('plat_number', $search); 
            $builder->orLike('id_driver', $search); 
            $builder->orLike('date_of_departure', $search); 
            $builder->orLike('price', $search); 
            $builder->orLike('tgl_crt_dt_departure', $search); 
        } else {
            $builder->where('id_departure !=', '');
        }


        $query = $builder->get();
        return $query->getResult();

 
    }


}