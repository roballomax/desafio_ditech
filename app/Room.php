<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function getAll(){
        return Room::orderBy('name', 'asc')->get();
    }

    public function create_room($data){
        return Room::create([
            'name' => $data['name']
        ]);
    }

    public function update_room($room, $data){
        $room->name = $data['name'];
        return $room->save();
    }

    public function destroy_room($room){
        return $room->delete();
    }
}
