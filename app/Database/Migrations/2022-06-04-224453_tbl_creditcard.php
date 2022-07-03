<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

  //varchar
           //varchar 
      //bigint
         //bigint  
       //namecard
  //varchar
      //text
    //datetime


class Tbl_creditcard extends Migration{
    public function up(){
        $this->forge->addField([ 
            'id_creditcard'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true
            ],  
			'id_transaksi'     => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true, 
			],     
			'order_id'              => [
				'type'           => 'BIGINT', 
			],  
			'bank'                  => [
				'type'           => 'VARCHAR',
				'constraint'     => '100', 
			],  
			'currency'              => [
				'type'           => 'VARCHAR',
				'constraint'     => '50', 
			],  
			'payment_type'          => [  
				'type'           => 'VARCHAR',
				'constraint'     => '225', 
			],   
			'gross_amount'          => [ 
				'type'           => 'BIGINT', 
			],  
			'no_card'               => [  
				'type'           => 'VARCHAR', 
				'constraint'     => '225', 
			],  
			'name_card'             => [  
				'type'           => 'VARCHAR', 
				'constraint'     => '225', 
			],  
			'transaction_status'    => [  
				'type'           => 'VARCHAR', 
				'constraint'     => '20', 
			],  
			'status_message'        => [  
				'type'           => 'TEXT', 
			],  
			'transaction_time'      => [  
				'type'           => 'DATETIME',
			],   
			'tgl_crt_dt_creditcar'  => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			], 
        ]);
        $this->forge->addPrimaryKey('id_creditcard', true);  
		$this->forge->addForeignKey('id_transaksi', 'tbl_transaksi', 'id_transaksi'); 
        $this->forge->createTable('tbl_creditcard'); 
    
    }

    public function down(){
        $this->forge->dropTable('tbl_creditcard');
    }
}