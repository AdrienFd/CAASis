<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_manifestation //PK
 * @property int $id_member //FK
 * @property Manifestation $manifestation //Object of the type Manifestation
 * @property Member $member //Object of the type Member
 */
class Participate extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'participate';

    /**
     * Attribute that can be assigned
     */
    protected $fillable = [];

    /**
     * The connection name for the model.
     */
    protected $connection = 'mysql_arras';

    /**
     * A participation belongs to a manifestation
     */
    public function manifestation()
    {
        return $this->belongsTo('App\Manifestation', 'id_manifestation', 'id_manifestation');
    }

    /**
     * A participation belongs to a member
     */
    public function member()
    {
        return $this->belongsTo('App\User', 'id_member', 'id_member');
    }
}
