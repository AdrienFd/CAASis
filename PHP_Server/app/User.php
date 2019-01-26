<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as basicAuth;
/**
 * @property int $id_member //PK
 * @property int $id_location //FK
 * @property int $id_statut //FK
 * @property string $member_name
 * @property string $member_firstname
 * @property string $member_email
 * @property string $member_password
 * @property Location $location //Object of type Location
 * @property Statut $statut //Object of type Statut
 */
class User extends Model implements Authenticatable
{

    use basicauth;
    /**
     * The table associated with the model.
     */
    protected $table = 'member';

    /**
     * The primary key for the model.
     */
    protected $primaryKey = 'id_member';

    /**
     * Attribute that can be assigned
     */
    protected $fillable = ['id_location', 'id_statut', 'member_name', 'member_firstname', 'email', 'activation_link','password','email_verified'];
    protected $hidden = ['password', 'remember_token','activation_link'];
    /**
     * The connection name for the model.
     */
    protected $connection = 'mysql_national';
    
    /**
     * The member belongs to a location
     */
    public function location()
    {
        return $this->belongsTo('App\Location', 'id_location', 'id_location');
    }

    /**
     * The member belongs to a statut
     */
    public function statut()
    {
        return $this->belongsTo('App\Statut', 'id_statut', 'id_statut');
    }

    public function getRememberToken()
{
    return $this->token;
}

public function setRememberToken($value)
{
    $this->token = $value;
}

public function getRememberTokenName()
{
    return 'token';
}
}
