<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Invoice extends BaseController
{
    public function index()
    {

        return view("invoice/index");
    }

    public function new()
    {
        helper('form');
        $data = [
            'title' => "New invoice"
        ];
        return view('layouts/header', $data)
        . view("invoice/new")
        . view("layouts/footer");
    }
}
