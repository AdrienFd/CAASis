<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PARTICIPATE extends Model
{
    protected $connection = 'CAASis_National_DB';
    protected $table = 'PARTICIPATE';
    protected $primaryKey =['id_event','id_user'];
    public $incrementing = false;
}
