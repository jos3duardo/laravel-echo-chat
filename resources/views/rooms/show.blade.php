@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 m4 l4">
                <div class="card-panel">
                    <div class="card-header"><h4 class="title">Usuários</h4></div>
                    <div class="card-content">
                        <ul class="collection">
                            <li class="collection-item">
                                <a href="#"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col s12 m8 l8">
                <div class="card-panel">
                    <div class="card-header"><h4 class="title">{{ $room->name }}</h4></div>
                    <div class="card-content">
                        <ul class="collection">
                            <li class="collection-item">


                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="input-field col s12 m8 l8">
                                <i class="material-icons prefix">mode_edit</i>
                                <input id="icon_prefix" type="text" class="validate"
                                       v-model="content" v-on:keyup.enter="sendMessage"/>
                                <label for="icon_prefix">Digite uma mensagem</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <button class="btn waves-effect waves-light" type="submit" name="action"
                                v-on:click="sendMessage" >
                                    Enviar
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
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
    </script>
@endsection
