@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading left">Listagem de Reservas</div>
                <a class="btn btn-success left" href='{{ route("reserve.create") }}'>Reservar Sala</a>
                <div class="panel-body">
                    @if(count($reserves) > 0)
                        <table class='table table-striped'>
                            <tr>
                                <th>Id</th>
                                <th>Data e hora</th>
                                <th>Usuário</th>
                                <th colspan='2'>Sala</th>
                            </tr>
                            @foreach($reserves as $reserve)
                                <tr>
                                    <td>{{$reserve->id}}</td>
                                    <td>{{date('d/m/Y H:00', strtotime($reserve->hour))}}</td>
                                    <td>{{$reserve->user->name}}</td>
                                    <td>{{$reserve->room->name}}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('reserve.edit', $reserve->id) }}" role="button"><i class='glyphicon glyphicon-pencil'></i></a>
                                        <form action="{{ route('reserve.destroy', $reserve->id) }}" method='post' style='float: left;'>
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger" type='submit'><i class='glyphicon glyphicon-remove'></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>No momento não há nenhuma sala agendada, <a href="{{route('reserve.create')}}">Clique Aqui</a> e agende uma sala.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
