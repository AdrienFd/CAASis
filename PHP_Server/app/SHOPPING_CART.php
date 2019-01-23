<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SHOPPING_CART extends Model
{
    protected $connection = 'CAASis_National_DB';
    protected $table = 'SHOPPING_CART';
    protected $primaryKey =['id_article','id_user'];
}
