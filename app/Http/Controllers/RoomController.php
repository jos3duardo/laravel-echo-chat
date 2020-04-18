<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Message;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $rooms = Room::all();

        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     */
    public function show(Room $room)
    {
        //caso usuario tente acessar uma sala q não existe
        if (!$room){
            throw new ModelNotFoundException('Sala não existe');
        }

        $user = Auth::user();
        $user->room_id = $room->id;
        $user->save();

        return view('rooms.show', compact('room'));
    }

    /**
     * Create a message in the room.
     *
     * @param Request $request
     * @param Room $room
     * @return \Illuminate\Http\JsonResponse
     */
    public function createMessage(Request $request, Room $room){
        //caso usuario tente acessar uma sala q não existe
        if (!$room){
            throw new ModelNotFoundException('Sala não existe');
        }

        $message = new Message();
        $message->content = $request->get('content');
        $message->room_id = $room->id;
        $message->user_id = Auth::user()->id;
        $message->save();

        return response()->json($message, 201);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
