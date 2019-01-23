<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LIKE extends Model
{
    protected $connection = 'CAASis_National_DB';
    protected $table = 'LIKE';
    protected $primaryKey =['id_img','id_user'];
    public $incrementing =false;   

}
