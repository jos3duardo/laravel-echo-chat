@extends('layouts.app')
@section('pre-style')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4>Usuários</h4>
                <ul class="list-group">
                    <li class="list-group-item" v-for="o in users">
                        <a href="#">[[ o.name ]]</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$room->name}}</div>

                    <div class="card-body">
                        <ul class="chat list-unstyled">
                            @foreach($messages as $message)
                                <li class="clearfix {{ $message->user->id == auth()->user()->id ? 'right' : 'left'}}">
                                <span class="{{ $message->user->id == auth()->user()->id ? 'float-right' : 'float-left'}}">
                                    <img src="http://www.gravatar.com/avatar/{{md5($message->user->email)}}.jpg" class="rounded-circle" style="height: 45px;"/>
                                </span>
                                    <div class="chat-body">
                                        <strong>{{ $message->user->name }}</strong>
                                        <p>{{ $message->content }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <ul class="chat list-unstyled">
                            <li v-for="o in messages" class="clearfix"
                                v-bind:class="{left: userId != o.user.id, right: userId == o.user.id}">
                                <span v-bind:class="{'float-left': userId != o.user.id, 'float-right': userId == o.user.id}">
                                    <img v-bind:src="createPhoto(o.user.email)" class="rounded-circle" style="height: 45px;"/>
                                </span>
                                <div class="chat-body">
                                    <strong>[[ o.user.name ]]</strong>
                                    <p>[[ o.message.content ]]</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class="input-group">
                            <input type="text" class="form-control input-md" id="input-mesage"
                                   placeholder="Digite sua mensagem" v-model="content" v-on:keyup.enter="sendMessage"/>
                            <span class="input-group-btn">
                                <button class="btn btn-success btn-md" v-on:click="sendMessage">Enviar</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pre-script')
    <script type="text/javascript">
        let roomId = "{{ $room->id }}";
        let userId = "{{ Auth::user()->id }}";
    </script>
@endsection
