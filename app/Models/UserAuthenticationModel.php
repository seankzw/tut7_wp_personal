<?php

namespace App\Models;

use CodeIgniter\Model;

class UserAuthentication extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['id','email','password'];

    public function loginUser($email, $pwd){
        $data = $this->where([
            'email' => $email,
            'password' => md5($pwd)
        ])->first();
        return $data;
    }
}
