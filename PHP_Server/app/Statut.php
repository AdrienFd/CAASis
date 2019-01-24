<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_statut //PK
 * @property string $statut_name
 * @property Member[] $members //Array of type Member
 */
class Statut extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'statut';

    /**
     * The primary key for the model.
     */
    protected $primaryKey = 'id_statut';

    /**
     * Attributes that can be assigned
     */
    protected $fillable = ['statut_name'];

    /**
     * The connection name for the model.
     */
    protected $connection = 'mysql_national';

    /**
    * A statut has many memeber
    */
    public function members()
    {
        return $this->hasMany('App\Member', 'id_statut', 'id_statut');
    }
}
