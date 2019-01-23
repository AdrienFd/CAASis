<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class COMMAND extends Model
{
    protected $connection = 'CAASis_National_DB';
    protected $table = 'COMMAND';
    protected $primaryKey =['id_article','id_order'];
    public $incrementing = false;
    


}
