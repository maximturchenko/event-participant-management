<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{ 
 
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name','email'
    ];




    /**
     * The events that belong to the participant.
     */
    public function events(){
        return $this->belongsToMany('App\Event', 'partipants_and_events','participant_id','event_id');
    }

     
}
