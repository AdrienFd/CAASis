<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_comment //PK
 * @property int $id_member
 * @property int $id_img
 * @property int $id_member_approbator //FK
 * @property string $comment_content //FK
 * @property string $comment_approbate_date //FK
 * @property Image $image //An object of type Article
 * @property Member $member_approbator //An object of type Member
 * @property Member $member //An object of type Member
 */
class Comment extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'comment';

    /**
     * The primary key for the model.
     */
    protected $primaryKey = 'id_comment';

    /**
     * Attribute that can be assigned
     */
    protected $fillable = ['id_member', 'id_img', 'id_member_approbator', 'comment_content', 'comment_approbate_date'];

    /**
     * The connection name for the model.
     */
    protected $connection = 'mysql_arras';

    /**
    * A comment belongs to an image
    */
    public function image()
    {
        return $this->belongsTo('App\Image', 'id_img', 'id_img');
    }

    /**
    * A comment belongs to an approbator member
    */
    public function member_approbate()
    {
        return $this->belongsTo('App\User', 'id_member_approbator', 'id_member');
    }

    /**
    * A command belongs to a member 
    */
    public function member()
    {
        return $this->belongsTo('App\User', 'id_member', 'id_member');
    }
}
