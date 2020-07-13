<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Participant;
use App\Event;
use App\ParticipantandEvent;

use Illuminate\Support\Facades\Validator;

class ParticipantController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participants = Participant::all();
        return $this->sendResponse($participants->toArray(), 'Список всех участников.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:participants',            
            'event' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $events = Event::find(json_decode($request->event));

        $participant = Participant::create([
            'first_name' => $request->first_name, 
            'last_name' => $request->last_name,
            'email' => $request->email,   
            ]);
        $participant->events()->sync($events);   
       return $this->sendResponse($participant->toArray(), 'Участник '.$request->last_name.' '.$request->first_name.' успешно добавлен.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $participant = Participant::find($id);
        if (is_null($participant)) {
            return $this->sendError('Участник не найден.');
        }
        return $this->sendResponse($participant->toArray(), 'Участник показан.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participant $participant)
    {

        $input = $request->all();
        $validator = Validator::make($input, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:participants',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $participant->first_name = $input['first_name'];
        $participant->last_name = $input['last_name'];
        $participant->email = $input['email'];
        $participant->save();
        return $this->sendResponse($participant->toArray(), 'Данные об участнике обновены.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {

        $participant->events()->detach();
        $participant->delete();
        return $this->sendResponse($participant->toArray(), 'Успешно удалено.');
    }

}
