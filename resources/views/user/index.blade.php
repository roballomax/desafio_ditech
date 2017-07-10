@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Listagem de usuários</div>

                <div class="panel-body">
                    
                    <table class='table table-striped'>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th colspan='2'>E-mail</th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('user.edit', $user->id) }}" role="button"><i class='glyphicon glyphicon-pencil'></i></a>
                                    <a class="btn btn-danger" href="{{ route('user.destroy', $user->id) }}" role="button"><i class='glyphicon glyphicon-remove'></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
