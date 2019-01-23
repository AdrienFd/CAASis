<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $connection = 'CAASis_National_DB';
    protected $table = 'Image';
    protected $primaryKey ='id_img';
}
