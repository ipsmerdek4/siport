<?php 
namespace App\Database\Seeds;

class UserDefault extends \CodeIgniter\Database\Seeder{
    public function run(){
        $data = [
            [
                'id_user'               =>  1,
                'hp'                    =>  '+62',
                'email'                 =>  'admin@siport.local',
                'username'              =>  'admin2022',
                'password'              =>  password_hash('admin2022', PASSWORD_BCRYPT),
                'level'                 =>  5,
                'status'                =>  1,
                'tgl_log_user'          =>  null,
                'tgl_pembuatan_user'    =>  date("Y-m-d H:i:s")
            ], 
        ];

        $this->db->table('tbl_user')->insertBatch($data);
    }
}