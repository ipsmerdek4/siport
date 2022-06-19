<?php 
namespace App\Models;

use CodeIgniter\Model;

class DepartureModel extends Model{
    protected $table      = 'tbl_departure';
    protected $primaryKey = 'id_departure';
    protected $returnType = 'object'; 
    protected $allowedFields = ['id_destination','id_vehicle', 'plat_number', 'id_driver', 'date_of_departure', 'price','tgl_crt_dt_departure'];





}