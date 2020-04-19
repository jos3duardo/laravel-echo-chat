<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use App\Models\Room;
use App\Models\Message;
use App\User;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $data = $request->only('name');
        Room::create($data);

        return redirect()->to(route('chat.rooms.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Room  $room
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Room $room)
    {
        //caso usuario tente acessar uma sala q não existe
        if (!$room){
            throw new ModelNotFoundException('Sala não existe');
        }

        $messages = Message::where([
            'room_id' => $room->id
        ])->get();

        $user = Auth::user();
        $user->room_id = $room->id;
        $user->save();

        return view('rooms.show', compact('room','messages'));
    }

    /**
     * Create a message in the room.
     *
     * @param Request $request
     * @param Room $room
     * @return \Illuminate\Http\JsonResponse
     */
    public function createMessage(Request $request, $id)
    {
        $room = Room::find($id);
        if (!$room) {
            throw new ModelNotFoundException("Sala não existente");
        }
        $message = new Message();
        $message->content = $request->get('content');
        $message->room_id = $room->id;
        $message->user_id = Auth::user()->id;
        $message->save();

        broadcast(new SendMessage($message));

        return response()->json($message, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Room $room
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Room $room)
    {
        $data = $request->only('name');
        $room->fill($data);
        $room->save();

        return redirect()->to(route('chat.rooms.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Room $room
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Room $room)
    {
        $messages = Message::all();
        if ($messages){
            foreach ($messages as $message){
                $message->delete();
            }
        }
        $users = User::all();
        if ($users){
            foreach ($users as $user){
                $user->room_id = null;
                $user->save();
            }
        }
        $room->delete();

        return redirect()->to(route('chat.rooms.index'));
    }
}
