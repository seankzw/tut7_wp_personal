<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transactions';
    protected $allowedFields = ['id','date','desc','category','amount', 'user_id'];

    public function getTransactions($id=null){
        return $this->findAll();
}

    public function getLatestTransaction($id){
        //$data = $this->where(['user_id' => $id])->first();
        $data = $this->where(['user_id' => $id])->orderBy('date','DESC')->limit(1)->first();
        if(!$data){
            return null;
        }

        return $data;
    }
}
