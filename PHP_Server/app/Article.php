<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_article //PK
 * @property int $id_img //FK -> Image
 * @property int $id_category //FK -> Category
 * @property string $article_name
 * @property string $article_description
 * @property string $article_price
 * @property Category $category //An article as an object of type Category
 * @property Image $image //An article as an object of type Image
 * @property Purchase[] $purchases //An article as an array of object of type Purchase
 * @property Member[] $members //An article as an array of object of type Member (due to shopping_cart)
 */
class Article extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'article';

    /**
     * The primary key for the model.
     */
    protected $primaryKey = 'id_article';

    /**
     * Attribute that can be assigned
     */
    protected $fillable = ['id_img', 'id_category', 'article_name', 'article_description', 'article_price'];

    /**
     * The connection name for the model.
     */
    protected $connection = 'mysql_arras';

    /**
    * An article belongs to a category
    */
    public function category()
    {
        return $this->belongsTo('App\Category', 'id_category', 'id_category');
    }

    /**
    * An article belongs to an image 
    */
    public function image()
    {
        return $this->belongsTo('App\Image', 'id_img', 'id_img');
    }

    /**
     * An article belongs to 0 or many purchase
    */
    public function purchases()
    {
        return $this->belongsToMany('App\Purchase', 'command', 'id_article', 'id_purchase');
    }

    /**
    * An article belongs to 0 or many member (many member can put this article in their shopping_cart)
    */
    public function members()
    {
        return $this->belongsToMany('App\Member', 'shopping_cart', 'id_article', 'id_member');
    }
}
