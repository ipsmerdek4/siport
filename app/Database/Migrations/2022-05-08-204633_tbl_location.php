<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tbl_location extends Migration{
    public function up(){

       
       $this->forge->addField([ 
            'id_location'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true
            ],  
			'id_island'       => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true, 
			],  
			'name_location'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100', 
			],  
			'ket_location'       => [
				'type'           => 'text', 
			],  
			'picture'       => [
				'type'           => 'text', 
			], 
			'tgl_pembuatan_location' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			], 
        ]);
        $this->forge->addPrimaryKey('id_location', true); 
        $this->forge->addForeignKey('id_island', 'tbl_island', 'id_island'); 
        $this->forge->createTable('tbl_location'); 
    }

    public function down(){
        $this->forge->dropTable('tbl_location');
    }
}