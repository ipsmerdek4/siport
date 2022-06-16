<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tbl_Vehicle extends Migration{
    public function up(){

        $this->forge->addField([ 
            'id_vehicle'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true
            ],  
			'nm_vehicle'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100', 
			],  
			'seat'       => [
				'type'           => 'INT',
				'constraint'     => '5', 
			],  
			'tgl_crt_dt_vehicle' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			], 
        ]);
        $this->forge->addPrimaryKey('id_vehicle', true); 
        $this->forge->createTable('tbl_vehicle'); 
    }

    public function down(){
        $this->forge->dropTable('tbl_vehicle');
    }
}