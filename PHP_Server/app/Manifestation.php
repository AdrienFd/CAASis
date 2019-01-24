<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_manifestation //PK
 * @property int $id_member_suggest //FK
 * @property int $id_member_plan //FK
 * @property int $id_member_approbator //FK
 * @property string $manifestation_name
 * @property string $manifestation_description
 * @property boolean $manifestation_recurrency
 * @property int $manifestation_frequency
 * @property int $manifestation_price
 * @property string $manifestation_date
 * @property int $manifestation_votes
 * @property boolean $manifestation_is_idea
 * @property string $manifestation_approbate_date
 * @property Member $member_plan //Object of type Member
 * @property Member $member_suggest //Object of type Member
 * @property Member $member_approbate //Object of type Member
 * @property Image[] $images //Array of type Image
 * @property Member[] $members_participate //Array of type Member
 * @property Member[] $members_votes //Array of type Member
 */
class Manifestation extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'manifestation';

    /**
     * The primary key for the model.
     */
    protected $primaryKey = 'id_manifestation';

    /**
     * Attribute that can be assigned
     */
    protected $fillable = ['id_member_suggest', 'id_member_plan', 'id_member_approbator', 'manifestation_name', 'manifestation_description', 'manifestation_recurrency', 'manifestation_frequency', 'manifestation_price', 'manifestation_date', 'manifestation_votes', 'manifestation_is_idea', 'manifestation_approbate_date'];

    /**
     * The connection name for the model.
     */
    protected $connection = 'mysql_arras';

    /**
     * A manifestation belongs to an approbator member
     */
    public function member_approbate()
    {
        return $this->belongsTo('App\User', 'id_member_approbator', 'id_member');
    }

    /**
     * A manifestation belongs to an planner member
     */
    public function member_plan()
    {
        return $this->belongsTo('App\User', 'id_member_plan', 'id_member');
    }

    /**
     * A manifestation belongs to an suggester member
     */
    public function member_suggest()
    {
        return $this->belongsTo('App\User', 'id_member_suggest', 'id_member');
    }

    /**
     * A manifestation belongs to 0 or many image
     */
    public function images()
    {
        return $this->belongsToMany('App\Image', 'illustrate_manifestation', 'id_manifestation', 'id_img');
    }

    /**
     * A manifestation belongs to 0 or many participant member
     */
    public function members_participate()
    {
        return $this->belongsToMany('App\User', 'participate', 'id_manifestation', 'id_member');
    }

    /**
     * A manifestation belongs to 0 or many voting member
     */
    public function members_vote()
    {
        return $this->belongsToMany('App\User', 'vote', 'id_manifestation', 'id_member');
    }
}
