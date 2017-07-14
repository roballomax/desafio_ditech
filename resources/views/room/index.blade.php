@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading left">Listagem de Salas</div>
                <a class="btn btn-success left" href='{{ route("room.create") }}'>Add Room</a>
                <div class="panel-body">
                    @if(count($rooms) > 0)
                    <table class='table table-striped'>
                        <tr>
                            <th>Id</th>
                            <th colspan='2'>Nome</th>
                        </tr>
                        @foreach($rooms as $room)
                            <tr>
                                <td>{{$room->id}}</td>
                                <td>{{$room->name}}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('room.edit', $room->id) }}" role="button"><i class='glyphicon glyphicon-pencil'></i></a>
                                    <form action="{{ route('room.destroy', $room->id) }}" method='post' style='float: left;'>
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger" type='submit'><i class='glyphicon glyphicon-remove'></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <p>Sem salas cadastradas, <a href="{{ route("room.create") }}">clique aqui</a> para cadastrar uma sala.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
