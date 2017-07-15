<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $fillable = [
        'hour', 'user_id', 'room_id',
    ];

    public function getAll(){
        return Reserve::orderBy('hour', 'desc')->where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->get();
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function room(){
        return $this->belongsTo('App\Room');
    }

    public function create_reserve($data){
        return Reserve::create([
            'hour' => $data['hour'],
            'room_id' => $data['room'],
            'user_id' => \Illuminate\Support\Facades\Auth::user()->id,
        ]);
    }

    public function update_reserve($reserve, $data){
        $reserve->hour = $data['hour'];
        $reserve->room_id = $data['room'];
        $reserve->user_id = \Illuminate\Support\Facades\Auth::user()->id;

        return $reserve->save();

    }

    public function destroy_reserve($reserve){
        return $reserve->delete();
    }

}
