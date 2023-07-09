<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvoiceModel;

class Invoice extends BaseController
{
    public function index()
    {
        $invoiceModel = model(InvoiceModel::class);
        $data = [
            'title' => 'Your invoices',
            'invoices' => $invoiceModel->getInvoices()
        ];

        return view('layouts/header', $data)
            . view("invoice/index")
            . view('layouts/footer');
    }

    public function new()
    {
        helper('form');
        $invoiceModel = model(InvoiceModel::class);

        $data = [
            'title' => "New invoice",
            'columns' => $invoiceModel->getFieldData()
        ];

        if(!$this->request->is('post')){

            return view('layouts/header', $data)
            . view("invoice/new")
            . view("layouts/footer");
        }

        $post_data = $this->request->getPost($invoiceModel->getColumns());

        $toSave = [];

        for($i=0;$i<count($post_data);$i++){
            $toSave[$data['columns'][$i]->name] = $post_data[$data['columns'][$i]->name];
        }

        error_log(implode(" ", $toSave));
        $invoiceModel->save($toSave);
    }
}
