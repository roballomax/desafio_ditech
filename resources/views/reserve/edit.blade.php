@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edição de Reserva</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('reserve.update', $reserve) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group{{ $errors->has('room') ? ' has-error' : '' }}">
                            <label for="room" class="col-md-4 control-label">Sala</label>

                            <div class="col-md-6">
                                <select name="room" id="room" class="form-control">
                                    <option value="">Seleciona uma sala</option>
                                    @if(count($rooms) > 0)
                                        @foreach($rooms as $room)
                                            <option value="{{$room->id}}" <?php echo ((old('room') ?: $reserve->room_id) == $room->id ? 'selected' : ''); ?> >{{$room->name}}</option>
                                        @endforeach
                                    @endif
                                </select>

                                @if ($errors->has('room'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('room') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hour') ? ' has-error' : '' }}">
                            <label for="hour" class="col-md-4 control-label">Data e Hora</label>

                            <div class="col-md-6">
                                <input id="hour" type="text" class="datetimepicker" name="hour" value="{{ date('d/m/Y H:00', strtotime((old('hour') ?: $reserve->hour))) }}" required>

                                @if ($errors->has('hour'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hour') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
