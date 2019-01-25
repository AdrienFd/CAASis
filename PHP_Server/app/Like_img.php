<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_img //PK //FK
 * @property int $id_member //PK //FK
 * @property Image $image //Object of type Image
 * @property Member $member //Object of type Member
 */
class Like_img extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'like_img';

    /**
     * Attribute can be assigned
     */
    protected $fillable = [];

    /**
     * The connection name for the model.
     */
    protected $connection = 'mysql_arras';

    /**
     * A like belongs to an image
     */
    public function image()
    {
        return $this->belongsTo('App\Image', 'id_img', 'id_img');
    }

    /**
     * A like belongs to a member
     */
    public function member()
    {
        return $this->belongsTo('App\User', 'id_member', 'id_member');
    }
}
