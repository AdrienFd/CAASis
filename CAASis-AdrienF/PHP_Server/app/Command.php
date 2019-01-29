<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_article //PK //FK
 * @property int $id_purchase //PK //FK
 * @property Article $article //A command as an object of type Article
 * @property Purchase $purchase //A command as an object of type Purchase
 */
class Command extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'command';

    /**
     * Attribute that can be assigned
     */
    protected $fillable = [];

    /**
     * The connection name for the model.
     */
    protected $connection = 'mysql_arras';

    /**
    * A command (a row of a command) belongs to an article
    */
    public function article()
    {
        return $this->belongsTo('App\Article', 'id_article', 'id_article');
    }

    /**
    * A command belongs to a purschase
    */
    public function purchase()
    {
        return $this->belongsTo('App\Purchase', 'id_purchase', 'id_purchase');
    }
}
