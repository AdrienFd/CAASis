<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_article //PK //FK
 * @property int $id_member //PK //FK
 * @property Article $article //Object of type Article
 * @property Member $member //Object of type Member
 */
class Shopping_cart extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'shopping_cart';

    /**
     * Attribute that can be assigned
     */
    protected $fillable = [];

    /**
     * The connection name for the model.
     */
    protected $connection = 'mysql_arras';

    /**
     * A shopping_cart (row) belongs to an article
     */
    public function article()
    {
        return $this->belongsTo('App\Article', 'id_article', 'id_article');
    }

    /**
     * A shopping_cart (row) belongs to an member
     */
    public function member()
    {
        return $this->belongsTo('App\Member', 'id_member', 'id_member');
    }

}
