<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    protected $connection = 'CAASis_National_DB';
    protected $table = 'User';
    protected $primaryKey ='id_user';
}
