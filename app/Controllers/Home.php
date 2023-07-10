<?php

namespace App\Controllers;
use App\Models\TransactionModel;
use App\Models\UserAuthenticationModel;
use App\Models\InvoiceModel;
use Error;

class Home extends BaseController
{
    public function index()
    {

        $transModel = new TransactionModel();
        $user = new UserAuthenticationModel();
        $invoiceModel = new InvoiceModel();
        $latestTrans = $transModel->getLatestTransaction(session()->get('id'));
        $invoices = $invoiceModel->getLatestInvoice();
        $invoice_count = $invoiceModel->getNumOfInvoice();

        error_log("Session id is " . session()->get('id'));
        $acc_bal = $user->getBal(session()->get('id'));

        if(session()->get('email') == null){
            return redirect()->route('login');
        }
        $data['title'] = 'Dashboard here';

        if($latestTrans == null){
            $latestTrans['date'] = null;
        }

        $latestTrans['date'] = strtotime($latestTrans['date']);

        $data = [
            'title' => "Dashboard",
            'latestTrans' => $latestTrans,
            'acc_bal' => $acc_bal,
            'invoices' => $invoices,
            'invoice_count' => $invoice_count
        ];

        return view('layouts/header', $data)
                . view('home/dashboard')
                . view('layouts/footer');
    }

}
