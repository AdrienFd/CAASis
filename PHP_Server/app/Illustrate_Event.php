<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ILLUSTRATE_EVENT extends Model
{
    protected $connection = 'CAASis_National_DB';
    protected $table = 'ILLUSTRATE_EVENT';
    protected $primaryKey =['id_img','id_event'];
    public $incementing =false;
}
