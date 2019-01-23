<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $connection = 'CAASis_National_DB';
    protected $table = 'Category';
    protected $primaryKey ='id_category';
}
