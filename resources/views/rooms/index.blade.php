@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Escolha uma das salas
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#novaSalaChat">
                            Criar Sala
                        </button>
                    </div>
                    <div class="card-body">
                        @forelse($rooms as $room)
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="{{ route('chat.rooms.show', ['room' => $room->id])  }}">
                                        {{ $room->name  }}
                                    </a>

                                    <a href="#" onClick="document.getElementById('delete_form').submit();" class="text-danger float-right">
                                        <i class="material-icons">delete</i>
                                    </a>

                                    <a type="button" class=" float-right" data-toggle="modal" data-target="#novaSalaChat-{{$room->id}}">
                                       <i class="material-icons">edit</i>
                                    </a>

                                    {{-- form de delete --}}
                                    <form method="post" action="{{route('chat.rooms.destroy',['room' => $room->id])}}" class="form-inline" id="delete_form">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <!-- Modal -->
                                    <div class="modal fade" id="novaSalaChat-{{$room->id}}" tabindex="-1" role="dialog" aria-labelledby="novaSalaChatLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="novaSalaChatLabel">Editar Sala de Chat</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{route('chat.rooms.update',['room' => $room->id])}}" method="POST">
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="name">Nome</label>
                                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome da Sala" value="{{ $room->name }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                        <button type="submit"  class="btn btn-primary">Salvar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @empty
                            <ul class="list-group">
                                Nenhuma sala cadastrada
                            </ul>
                        @endforelse
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
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
