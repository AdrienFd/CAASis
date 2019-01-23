<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $connection = 'CAASis_National_DB';
    protected $table = 'Event';
    protected $primaryKey ='id_event';
}
