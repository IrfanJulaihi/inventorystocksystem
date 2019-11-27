<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class foodmenu extends Model
{
	use Sortable;
      protected $fillable = [
    'share_name',
    'price',
    'group_uid'
   
  ];
}
