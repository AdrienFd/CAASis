<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VOTE extends Model
{
    protected $connection = 'CAASis_National_DB';
    protected $table = 'VOTE';
    protected $primaryKey =['id_event','id_user'];
    public $incrementing = false;
}
