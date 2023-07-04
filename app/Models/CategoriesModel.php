<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $table = 'categories';
    protected $allowedFields = ['id','name','user_id'];

    public function getCategories($id = null){
        if($id == null){
            return $this->findAll();
        }

        return $this->where(['user_id' => $id])->findAll();

    }
}
