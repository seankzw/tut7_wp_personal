<?php

namespace App\Models;

use CodeIgniter\Model;

class UserAuthentication extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['id','email','password', 'security_question', 'security_answer'];

    public function getUserId($email){
        $data = $this->where(['email' => $email])->first();
        return $data['id'];
    }

    public function getUserInfo($id){
        $data = $this->where(['id' => $id])->first();
        return $data;
    }

    public function loginUser($email, $pwd){
        $data = $this->where([
            'email' => $email,
            'password' => md5($pwd)
        ])->first();
        return $data;
    }

    public function resetPassword($email, $sAnswer){
        $data = $this->where([
            'email' => $email,
            'security_answer' => $sAnswer
        ])->first();

        return $data;
    }

    public function getSecurityQuestion($id){
        $data = $this->where([
            'id' => $id
        ])->first();

        return $data['security_question'];
    }

    public function updateUserData($id, $newPwd){
        $this->where(['id' => $id])->set(['password' => md5($newPwd)])->update();
    }

    public function verifySecurityAnswer($id, $ans){
        $data = $this->where(['id'=>$id, 'security_answer' => $ans])->countAllResults();

        if($data){
            return true;
        }else{
            return false;
        }
    }
}
