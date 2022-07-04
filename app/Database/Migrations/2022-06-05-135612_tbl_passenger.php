<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tbl_passenger extends Migration{
    public function up(){

        $this->forge->addField([ 
            'id_passenger'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true
            ],  
			'id_transaksi'     => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true, 
			],     
			'title_passenger'      => [  
				'type'           => 'VARCHAR',
				'constraint'     => '50', 
			],   
			'name_passenger'      => [  
				'type'           => 'VARCHAR',
				'constraint'     => '225', 
			],     
			'KTP_passenger'      => [  
				'type'           => 'VARCHAR',
				'constraint'     => '225', 
			],     
			'country_passenger'      => [  
				'type'           => 'VARCHAR',
				'constraint'     => '225', 
			],   
			'tgl_crt_dt_passenger'  => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			], 
        ]);
        $this->forge->addPrimaryKey('id_passenger', true); 
        $this->forge->addForeignKey('id_transaksi', 'tbl_transaksi', 'id_transaksi');
        $this->forge->createTable('tbl_passenger'); 
    }

    public function down(){
        $this->forge->dropTable('tbl_passenger');
    }
}