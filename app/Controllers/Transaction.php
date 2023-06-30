<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use Config\Services;

class Transaction extends BaseController
{
    public function index()
    {

        $model = model(TransactionModel::class);
        $transactions = $model->getTransactions();

        $data = [
            'title' => 'Transaction',
            'transactions' => $transactions
        ];

        return view('layouts/header', $data)
                . view('transaction/index')
                . view('layouts/footer');
    }

    public function newTransaction(){
        helper('form');

        $data = [
            "title" => "New transaction"
        ];

        if(!$this->request->is('post')){
            return view('layouts/header', $data)
                . view('transaction/new')
                . view('layouts/footer');
        }

        $post_data = $this->request->getPost(['from','amount']);

        if(!$this->validateData($post_data, [
            'from' => 'required',
            'amount' => 'required'
        ])){
            session()->setFlashdata("error","Validation fail");

            return view('layouts/header', $data)
                . view('transaction/new')
                . view('layouts/footer');
        }

        $model = model(TransactionModel::class);
        $model->save([
            'from' => $post_data['from'],
            'amount' => $post_data['amount']
        ]);
        return view('layouts/header', $data)
            . view('transaction/new')
            . view('layouts/footer');
    }
}
