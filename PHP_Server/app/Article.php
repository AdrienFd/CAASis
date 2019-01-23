<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $connection = 'CAASis_National_DB';
    protected $table = 'Article';
    protected $primaryKey ='id_article';
}
