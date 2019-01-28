<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_img //PK //FK
 * @property int $id_manifestation //PK //FK
 * @property Image $image //Object of type Image
 * @property Manifestation $manifestation //Object of type Manifestation
 */
class Illustrate_manifestation extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'illustrate_manifestation';

    /**
     * Attribute that can be assigned
     */
    protected $fillable = [];

    /**
     * The connection name for the model.
     */
    protected $connection = 'mysql_arras';

    /**
    * A picture that illustrate a manifestation belongs to an image
    */
    public function image()
    {
        return $this->belongsTo('App\Image', 'id_img', 'id_img');
    }

    /**
    * A picture that illustrate a manifestation belongs to a manifestation
    */
    public function manifestation()
    {
        return $this->belongsTo('App\Manifestation', 'id_manifestation', 'id_manifestation');
    }
}
