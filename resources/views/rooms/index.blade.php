@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Escolha uma das salas abaixo
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#novaSalaChat">
                            Nova Sala
                        </button>
                    </div>

                    <div class="card-body">
                        @foreach($rooms as $room)
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="{{ route('chat.rooms.show', ['room' => $room->id])  }}">
                                        {{ $room->name  }}
                                    </a>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="novaSalaChat" tabindex="-1" role="dialog" aria-labelledby="novaSalaChatLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="novaSalaChatLabel">Cadastrar Nova Sala para Chat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('chat.rooms.store')}}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome da Sala" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="">
        $('#novaSalaChat').on('shown.bs.modal', function () {
            $('#name').trigger('focus')
        })
    </script>
@endsection
