<?php 
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table      = 'tbl_user';
    protected $primaryKey = 'id_user';
    protected $returnType = 'object'; 
    protected $allowedFields = ['hp','email', 'username', 'password', 'level', 'status', 'tgl_log_user','tgl_pembuatan_user'];

    function reqLogin($input = null)
    {
        $builder = $this->db->table('tbl_user');   
        $builder->where('username', $input);
        $builder->orWhere('hp', $input);
        $builder->orWhere('email', $input);
        $query = $builder->get();

        return $query->getResult();
    }





    
}