<?php 
namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model{
    protected $table      = 'tbl_transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $returnType = 'object'; 
    protected $allowedFields = [ 'id_transaksi',
        'id_departure', 'total_passenger','total_price', 'title_order', 
        'name_order', 'email_order',
        'phone_order', 'metode_order',
        'status_order', 'tgl_crt_dt_transaksi'
    ];
}