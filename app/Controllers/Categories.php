<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriesModel;

class Categories extends BaseController
{
    public function index()
    {
        //
    }

    public function new(){
        helper('form');
        $data = [
            'title' => 'New category'
        ];

        //If user not logon
        if(session()->get('email') == null){
            return redirect()->route("/login");
        }

        //If get request
        if(!$this->request->is('post')){
            return view('layouts/header', $data)
                    . view('category/new')
                    . view('layouts/footer');
        }

        //If pot request
        $post_data = $this->request->getPost(['name']);

        $model = model(CategoriesModel::class);
        $user = model(UserAuthenticationModel::class);

        $model->save([
            'name' => $post_data['name'],
            'user_id' => $user->getUserId(session()->get('email'))
        ]);

        return redirect()->to('/transaction/new');

    }
}
