<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statut extends Model
{
    protected $connection = 'CAASis_National_DB';
    protected $table = 'Statut';
    protected $primaryKey ='id_statut';
}
