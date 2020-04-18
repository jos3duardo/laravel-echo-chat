@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12 offset-m2">
                <div class="card-panel">
                    <div class="title">Escolha uma das salas abaixo</div>
                    <div class="card-content">
                        @foreach($rooms as $room)
                            <ul class="collection">
                                <li class="collection-item">
                                    <a href="{{route('chat.rooms.show',['room' => $room->id])}}">{{ $room->name }}</a>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
