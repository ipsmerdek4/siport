<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tbl_user extends Migration{
    public function up(){

        $this->forge->addField([ 
            'id_user'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true
            ], 
			'hp'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '20', 
			], 
			'email'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100', 
			], 
			'username'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50', 
			], 
			'password'       => [
				'type'           => 'text', 
			], 
			'level'       => [
				'type'           => 'INT',
				'constraint'     => 3,
			],  
			'status'       => [
				'type'           => 'INT',
				'constraint'     => 3,
			],  
			'tgl_pembuatan_user' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			], 
        ]);
        $this->forge->addPrimaryKey('id_user', true); 
        $this->forge->createTable('tbl_user'); 
    }

    public function down(){
        $this->forge->dropTable('tbl_user');
    }
}