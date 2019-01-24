<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_purchase //PK //FK
 * @property int $id_member //PK //FK
 * @property string $purchase_date 
 * @property int $purchase_price
 * @property Member $member //Object of type Member
 * @property Article[] $articles //Array of type Article
 */
class Purchase extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'purchase';

    /**
     * The primary key for the model.
     */
    protected $primaryKey = 'id_purchase';

    /**
     * Attribute that can be assigned
     */
    protected $fillable = ['id_member', 'purchase_date', 'purchase_price'];

    /**
     * The connection name for the model.
     */
    protected $connection = 'mysql_arras';

    /**
     * A purchase belongs to a member
     */
    public function member()
    {
        return $this->belongsTo('App\Member', 'id_member', 'id_member');
    }

    /**
     * A purchase belongs to 1 or many article
     */
    public function articles()
    {
        return $this->belongsToMany('App\Article', 'command', 'id_purchase', 'id_article');
    }
}
