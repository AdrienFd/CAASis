<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $connection = 'CAASis_National_DB';
    protected $table = 'Location';
    protected $primaryKey ='id_location';

}
