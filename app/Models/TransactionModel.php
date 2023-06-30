<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transactions';
    protected $allowedFields = ['id','from','amount','createdate'];

    public function getTransactions(){
        return $this->findAll();
    }

    public function getLatestTransaction(){
        $data = $this->orderBy('created_date','DESC')->limit(1)->findAll();
        return $data;
    }
}
