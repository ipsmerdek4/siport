<?php 
namespace App\Models;

use CodeIgniter\Model;

class PassengerModel extends Model{
    protected $table      = 'tbl_passenger';
    protected $primaryKey = 'id_passenger';
    protected $returnType = 'object'; 
    protected $allowedFields = [
        'id_transaksi', 'title_passenger','name_passenger', 'KTP_passenger', 
        'country_passenger', 'tgl_crt_dt_passenger'
    ];

}