<?php

namespace App\Http\Controllers;

use App\Reserve;
use App\Room;
use Illuminate\Http\Request;

class ReserveController extends Controller
{

    private $reserve;

    private $room;

    public function __construct(Reserve $reserve, Room $room){
        $this->middleware('auth');
        $this->reserve = $reserve;
        $this->room = $room;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reserve.index', [
            'reserves' => $this->reserve->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reserve.create', [
            'rooms' => $this->room->getAll()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'room' => 'required|integer|max:11',
            'hour' => 'required|string|max:255'
        ]);

        $request['hour'] = str_replace('/', '-', $request['hour']) . ":00";
        $request['hour'] = date('Y-m-d H:00:00', strtotime($request['hour']));

        if($this->reserve->validateReserve($request->all())){
            
            $this->reserve->create_reserve($request->all());
            return redirect()->route('reserve.index');
        }

        return redirect()->route('reserve.create');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserve $reserve)
    {
        return view('reserve.edit', [
            'reserve' => $reserve,
            'rooms' => $this->room->getAll()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserve $reserve)
    {
        $this->validate($request,[
            'room' => 'required|integer|max:11',
            'hour' => 'required|string|max:255'
        ]);

        $request['hour'] = str_replace('/', '-', $request['hour']) . ":00";
        $request['hour'] = date('Y-m-d H:00:00', strtotime($request['hour']));

        if($this->reserve->validateReserve($request->all())) {
            
            $this->reserve->update_reserve($reserve, $request->all());
            return redirect()->route('reserve.index');
        }
        
        return redirect()->action('ReserveController@edit', [$reserve]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserve $reserve)
    {
        $this->reserve->destroy_reserve($reserve);
        return redirect()->route('reserve.index');
    }
}
