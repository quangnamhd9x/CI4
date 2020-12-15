<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'user';
    protected $allowedFields = ['name', 'email', 'password', 'user_status', 'user_group'];
    protected $beforeInsert = ['beforeInsert'];

    function checkLogin($email, $password)
	{
        $user = $this->where(['email' => $email, 'password' => $password])->first();
        return $user;
	}
}