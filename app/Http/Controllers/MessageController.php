<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($id)
    {

        $messages = Message::find($id);

        if (!$messages) {
            throw new ModelNotFoundException("Sala não existente");
        }

        return response()->json($messages, 201);
    }
}
