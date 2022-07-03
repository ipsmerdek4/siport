<?php 
namespace App\Models;

use CodeIgniter\Model;

class CreditCardModel extends Model{
    protected $table      = 'tbl_creditcard';   
    protected $primaryKey = 'id_creditcard';
    protected $returnType = 'object'; 
    protected $allowedFields = [
        'id_transaksi', 'order_id','bank', 'currency', 'payment_type', 'gross_amount', 
        'no_card', 'name_card', 'transaction_status', 'status_message', 'transaction_time', 
        'tgl_crt_dt_creditcar'
    ];

}