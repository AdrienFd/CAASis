<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_img //PK
 * @property int $id_member //FK
 * @property int $id_member_approbator //FK
 * @property string $img_name
 * @property string $img_url
 * @property int $img_likes
 * @property string $img_approbate_date
 * @property Member $member_approbator //Object of the type Member
 * @property Member $member //Object of the type Member
 * @property Article[] $articles //Array of type Article
 * @property Comment[] $comments //Array of type Comment
 * @property Manifestation[] $manifestations //Array of type Manifestation
 * @property Member[] $members_likes //Array of type Member
 */
class Image extends Model
{

    public $timestamps = false;
    /**
     * The table associated with the model.
     */
    protected $table = 'image';

    /**
     * The primary key for the model.
     */
    protected $primaryKey = 'id_img';

    /**
     * Attribute that can be assigned
     */
    protected $fillable = ['id_member', 'id_member_approbator', 'img_name', 'img_url', 'img_likes', 'img_approbate_date'];

    /**
     * The connection name for the model.
     */
    protected $connection = 'mysql_arras';

    /**
    * An image belongs to an approbator member
    */
    public function member_approbate()
    {
        return $this->belongsTo('App\User', 'id_member_approbator', 'id_member');
    }

    /**
    * An image belongs to a member
    */
    public function member()
    {
        return $this->belongsTo('App\User', 'id_member', 'id_member');
    }

    /**
    * An image has 0 to many articles
    */
    public function articles()
    {
        return $this->hasMany('App\Article', 'id_img', 'id_img');
    }

    /**
    * An image has 0 to many comments
    */
    public function comments()
    {
        return $this->hasMany('App\Comment', 'id_img', 'id_img');
    }

    /**
    * An image belongs to 0 or many manifestations
    */
    public function manifestations()
    {
        return $this->belongsToMany('App\Manifestation', 'illustrate_manifestation', 'id_img', 'id_manifestation');
    }

    /**
    * An image belongs to 0 or many member that like it
    */
    public function members_like()
    {
        return $this->belongsToMany('App\User', 'like_img', 'id_img', 'id_member');
    }
}
