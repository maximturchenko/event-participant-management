<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParticipantandEvent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'participant_id', 'event_id'
    ];


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'partipants_and_events';
}
