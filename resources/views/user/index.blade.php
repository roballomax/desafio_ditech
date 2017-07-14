@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading left">Listagem de usuários</div>
                <a class="btn btn-success left" href='{{ route("user.create") }}'>Add User</a>
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
                                    @if($user->id != Auth::user()->id)
                                        <form action="{{ route('user.destroy', $user->id) }}" method='post' style='float: left;'>
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger" type='submit'><i class='glyphicon glyphicon-remove'></i></button>
                                        </form>
                                    @endif
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
