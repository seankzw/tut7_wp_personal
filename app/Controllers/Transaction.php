<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use App\Models\UserAuthenticationModel;
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

        $post_data = $this->request->getPost(['from','to','amount']);

        if(!$this->validateData($post_data, [
            'from' => 'required',
            'to' => 'required',
            'amount' => 'required'
        ])){
            session()->setFlashdata("error","Validation fail");

            return view('layouts/header', $data)
                . view('transaction/new')
                . view('layouts/footer');
        }

        //models
        $trans_model = new TransactionModel();
        $user_model = new UserAuthenticationModel();

        //add to transaction
        $trans_model->save([
            'from' => $post_data['from'],
            'to' => $post_data['to'],
            'amount' => $post_data['amount']
        ]);

        //Increase balance
        $user_model->deposit($post_data['to'], $post_data['amount']);


        return view('layouts/header', $data)
            . view('transaction/new')
            . view('layouts/footer');
    }
}
