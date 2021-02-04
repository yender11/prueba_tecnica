<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'products';
	
	 protected $fillable = ['sku', 'model', 'price', 'name', 'attribute_color'];
     public $timestamps = false;
}


