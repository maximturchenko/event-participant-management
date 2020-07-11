<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
 
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'date','city'
    ];

    /**
     * The participants that belong to the event.
     */
    public function events(){
        return $this->belongsToMany('App\Participant')->using('App\ParticipantandEvent');
    }
}
