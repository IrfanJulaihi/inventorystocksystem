<?php

  

namespace App;

  

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
   

class Product extends Model

{
use Sortable;
    protected $fillable = [

        'name', 'detail','price','quantity','menu_fooduid','group_uid'

    ];
public $sortable = ['Quantity'];
}