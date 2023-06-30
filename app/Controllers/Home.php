<?php

namespace App\Controllers;
use App\Models\TransactionModel;

class Home extends BaseController
{
    public function index()
    {

        $transModel = new TransactionModel();
        $latestTrans = $transModel->getLatestTransaction();

        if(session()->get('email') == null){
            return redirect()->route('login');
        }
        $data['title'] = 'Dashboard here';
        $data['latestTrans'] = $latestTrans;
        return view('layouts/header', $data)
                . view('home/dashboard')
                . view('layouts/footer');
    }
}
