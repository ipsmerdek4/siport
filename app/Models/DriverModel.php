<?php 
namespace App\Models;

use CodeIgniter\Model;

class DriverModel extends Model{
    protected $table      = 'tbl_driver';
    protected $primaryKey = 'id_driver';
    protected $returnType = 'object'; 
    protected $allowedFields = ['NIK','full_name', 'number', 'plat_car', 'picture', 'picture_KTP', 'picture_SIM','tgl_crt_dt_driver'];
}