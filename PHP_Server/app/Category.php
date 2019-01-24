<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_category //PK
 * @property string $category_name
 * @property Article[] $articles //A category has an array of objects from type Article
 */
class Category extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'category';

    /**
     * The primary key for the model.
     */
    protected $primaryKey = 'id_category';

    /**
     * Attribut that can be assigned
     */
    protected $fillable = ['category_name'];

    /**
     * The connection name for the model.
     */
    protected $connection = 'mysql_arras';

    /**
     * A category has 0 to many articles
     */
    public function articles()
    {
        return $this->hasMany('App\Article', 'id_category', 'id_category');
    }
}
