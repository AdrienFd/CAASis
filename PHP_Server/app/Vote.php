<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_manifestation //PK //FK
 * @property int $id_member //PK //FK
 * @property Manifestation $manifestation //Object of the type Manifestation
 * @property Member $member //Object of the type Member
 */
class Vote extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'vote';

    /**
     * Attributes that can be assigned
     */
    protected $fillable = [];

    /**
     * The connection name for the model.
     */
    protected $connection = 'mysql_arras';

    /**
    * A vote belongs to a manifestation
    */
    public function manifestation()
    {
        return $this->belongsTo('App\Manifestation', 'id_manifestation', 'id_manifestation');
    }

    /**
     * A vote belongs to a member
     */
    public function member()
    {
        return $this->belongsTo('App\Member', 'id_member', 'id_member');
    }
}
