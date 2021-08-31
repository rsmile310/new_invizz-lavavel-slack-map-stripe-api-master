<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_profile';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Fillable fields for a Profile.
     *
     * @var array
     */

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'bio',
        'dob',
        'address',
        'zipcode',
        'coordinate',
        'artist_type',
        'send_mail',
        'hide_age',
        'collab_status',
        'slack_url',
        'social_fb',
        'social_tw',
        'social_insta',
        'social_lin',
        'profile_complete',
    ];

    protected $casts = [
        'user_id' => 'integer',
    ];

    /**
     * A profile belongs to a user.
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
