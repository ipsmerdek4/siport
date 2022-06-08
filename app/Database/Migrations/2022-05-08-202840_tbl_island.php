<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tbl_island extends Migration{
    public function up(){

       $this->forge->addField([ 
            'id_island'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true
            ],  
			'name_island'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100', 
			],  
			'tgl_pembuatan_island' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			], 
        ]);
        $this->forge->addPrimaryKey('id_island', true); 
        $this->forge->createTable('tbl_island'); 
    }

    public function down(){
        $this->forge->dropTable('tbl_island');
    }
}