<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tbl_departure extends Migration{
    public function up(){
        $this->forge->addField([ 
            'id_departure'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true
            ],  
			'id_destination'     => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true, 
			],  
			'id_vehicle'         => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true, 
			],  
			'plat_number'		 => [  
				'type'           => 'VARCHAR',
				'constraint'     => '20', 
			],   
			'book_seat'		 => [  
				'type'           => 'INT', 
                'constraint'     => 10,
			],  
			'id_driver'          => [ 
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true, 
			],  
			'date_of_departure'  => [  
				'type'           => 'VARCHAR',
				'constraint'     => '50', 
			],  
			'price'              => [  
				'type'           => 'BIGINT', 
			],  
			'sts_departure'       => [
				'type'           => 'TINYINT', 
                'default'           => 0,
			],   
			'tgl_crt_dt_departure'  => [
				'type'              => 'DATETIME',
				'null'       	    => true,
			], 
			'tgl_del_dt_departure' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
                'default'       => null,
			], 
        ]);
        $this->forge->addPrimaryKey('id_departure', true); 
        $this->forge->addForeignKey('id_destination', 'tbl_destination', 'id_destination');
        $this->forge->addForeignKey('id_vehicle', 'tbl_vehicle', 'id_vehicle');
        $this->forge->addForeignKey('id_driver', 'tbl_driver', 'id_driver');
        $this->forge->createTable('tbl_departure'); 
    }

    public function down(){
        $this->forge->dropTable('tbl_departure');

    }
}