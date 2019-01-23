<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $connection = 'CAASis_National_DB';
    protected $table = 'Order';
    protected $primaryKey ='id_order';
}
