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
    public function participants(){
        return $this->belongsToMany('App\Participant', 'partipants_and_events','event_id','participant_id');
    }
}
