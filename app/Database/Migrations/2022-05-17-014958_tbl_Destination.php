<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tbl_Destination extends Migration{
    public function up(){

        $this->forge->addField([ 
            'id_destination'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true
            ],  
			'nm_destination'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100', 
			],  
			'picture_destination'       => [
				'type'           => 'TEXT', 
			],  
			'tgl_crt_dt_destination' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			], 
        ]);
        $this->forge->addPrimaryKey('id_destination', true); 
        $this->forge->createTable('tbl_destination'); 
    }

    public function down(){
        $this->forge->dropTable('tbl_destination');
    }
}