<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tbl_driver extends Migration{
    public function up(){
        $this->forge->addField([ 
            'id_driver'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true
            ],  
			'NIK'                => [
				'type'           => 'VARCHAR',
				'constraint'     => '100', 
			],  
			'full_name'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '100', 
			],  
			'number_driver'		 => [  
				'type'           => 'VARCHAR',
				'constraint'     => '20', 
			],   
			'picture'            => [ 
				'type'           => 'TEXT', 
			],  
			'picture_KTP'        => [  
				'type'           => 'TEXT', 
			],  
			'picture_SIM'        => [  
				'type'           => 'TEXT', 
			],  
			'tgl_crt_dt_driver'  => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			], 
        ]);
        $this->forge->addPrimaryKey('id_driver', true); 
        $this->forge->createTable('tbl_driver'); 
    }

    public function down(){
        $this->forge->dropTable('tbl_driver');
    }
}