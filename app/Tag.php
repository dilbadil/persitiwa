<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'label'];

    /**
     * A tag has many status.
     */
    public function statuses()
    {
        $this->belongsToMany('App\Status');
    }
}
