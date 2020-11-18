<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'product';

    public $incrementing = false;
    
    protected $primaryKey = 'id';
}
