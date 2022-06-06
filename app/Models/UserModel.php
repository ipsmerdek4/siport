<?php 
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table      = 'tbl_user';
    protected $primaryKey = "id_user";
    protected $returnType = "object"; 
    protected $allowedFields = ['hp','email', 'username', 'password', 'level', 'status', 'tgl_pembuatan_user'];







    
}