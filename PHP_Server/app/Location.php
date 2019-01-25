<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_location //PK
 * @property string $location_name
 * @property Member[] $members //Array of type Member
 */
class Location extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'location';

    /**
     * The primary key for the model.
     */
    protected $primaryKey = 'id_location';

    /**
     * Attribute that can be assigned
     */
    protected $fillable = ['location_name'];

    /**
     * The connection name for the model.
     */
    protected $connection = 'mysql_national';

    /**
     * A location has 0 to many members
     */
    public function members()
    {
        return $this->hasMany('App\User', 'id_location', 'id_location');
    }
}
