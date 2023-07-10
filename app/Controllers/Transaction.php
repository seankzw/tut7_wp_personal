<?php

namespace App\Controllers;

use App\Models\CategoriesModel;
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
        $category_model = model(CategoriesModel::class);

        $data = [
            "title" => "New transaction"
        ];

        if(!$this->request->is('post')){
            $data['categories'] = $category_model->getCategories(session()->get('id'));
            $data['curr_date'] = Date('d/m/Y');

            return view('layouts/header', $data)
                . view('transaction/new')
                . view('layouts/footer');
        }

        $post_data = $this->request->getPost(['date','desc','category','amount']);

        if(!$this->validateData($post_data, [
            'date' => 'required',
            'desc' => 'required',
            'category' => 'required',
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
            'date' => $post_data['date'],
            'desc' => $post_data['desc'],
            'category' => $post_data['category'],
            'amount' => $post_data['amount'],
            'user_id' => session()->get('id')
        ]);

        //Increase balance
        $user_model->deposit(session()->get('id'), $post_data['amount']);

        $data['categories'] = $category_model->getCategories(session()->get('id'));

        return view('layouts/header', $data)
            . view('transaction/new')
            . view('layouts/footer');
    }
}
