<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tbl_tujuan extends Migration{
    public function up(){

        $this->forge->addField([ 
            'id_tujuan'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true
            ],  
			'nm_tujuan'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100', 
			],  
			'tgl_crt_dt_tujuan' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			], 
        ]);
        $this->forge->addPrimaryKey('id_tujuan', true); 
        $this->forge->createTable('tbl_tujuan'); 
    }

    public function down(){
        $this->forge->dropTable('tbl_tujuan');
    }
}