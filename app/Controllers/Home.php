<?php

namespace App\Controllers;
use App\Models\TransactionModel;
use App\Models\UserAuthenticationModel;

class Home extends BaseController
{
    public function index()
    {

        $transModel = new TransactionModel();
        $user = new UserAuthenticationModel();
        $latestTrans = $transModel->getLatestTransaction();
        $acc_bal = $user->getBal(session()->get('email'));

        if(session()->get('email') == null){
            return redirect()->route('login');
        }
        $data['title'] = 'Dashboard here';
        $latestTrans['created_date'] = strtotime($latestTrans['created_date']);
        error_log($latestTrans['created_date']);


        $data = [
            'title' => "Dashboard",
            'latestTrans' => $latestTrans,
            'acc_bal' => $acc_bal
        ];

        return view('layouts/header', $data)
                . view('home/dashboard')
                . view('layouts/footer');
    }
}
