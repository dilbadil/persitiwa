<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status_id', 'body', 'user_id', 'lokasi_peristiwa', 'lokasi_status'];

    /**
     * A status has many tags.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * A status belongs to user.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
