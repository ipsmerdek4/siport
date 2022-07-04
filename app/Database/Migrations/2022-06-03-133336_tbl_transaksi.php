<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tbl_transaksi extends Migration{
    public function up(){
        $this->forge->addField([ 
            'id_transaksi'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true
            ],  
			'id_departure'     => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true, 
			],    
			'id_destination'     => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true, 
			],    
			'total_passenger'      => [  
				'type'           => 'INT',
                'constraint'     => 10,
			],   
			'total_price'      => [  
				'type'           => 'BIGINT', 
			],   
			'title_order'      => [  
				'type'           => 'VARCHAR',
				'constraint'     => '50', 
			],   
			'name_order'      => [  
				'type'           => 'VARCHAR',
				'constraint'     => '225', 
			],     
			'email_order'      => [  
				'type'           => 'VARCHAR',
				'constraint'     => '225', 
			],     
			'phone_order'      => [  
				'type'           => 'VARCHAR',
				'constraint'     => '20', 
			],  
			'metode_order'      => [  
				'type'           => 'TINYINT',
			],   
			'status_order'      => [  
				'type'           => 'VARCHAR',
				'constraint'     => '100', 
			],  
			'tgl_crt_dt_transaksi'  => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			], 
        ]);
        $this->forge->addPrimaryKey('id_transaksi', true);  
        $this->forge->addForeignKey('id_departure', 'tbl_departure', 'id_departure');
        $this->forge->addForeignKey('id_destination', 'tbl_destination', 'id_destination'); 
        $this->forge->createTable('tbl_transaksi'); 
    }

    public function down(){
        $this->forge->dropTable('tbl_transaksi');
    }
}