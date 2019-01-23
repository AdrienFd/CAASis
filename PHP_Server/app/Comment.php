<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $connection = 'CAASis_National_DB';
    protected $table = 'Comment';
    protected $primaryKey ='id_comment';
}
