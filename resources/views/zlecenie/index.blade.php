@extends('layouts.app')


@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Zarządzanie zleceniami</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-success" href="{{ route('zlecenie.create') }}">Dodaj nowe zlecenie</a>  
    </div>
  </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
  <tr>
    <th>Nr</th>
    <th>Nazwa</th>
    <th>Status</th>
    <th>Przypisany</th>
    <th width="280px">Action</th>
  </tr>
  @foreach ($data as $key => $zlecenie)
  <tr>
    <td>{{ ++$i }}</td>
    <td>Zlecenie {{ $zlecenie->id }}</td>
    <td>{{$zlecenie->status}}</td>
    <td>{{$zlecenie->user->name}}</td>
    <td>
       <a class="btn btn-info" href="{{ route('zlecenie.show',$zlecenie->id) }}">Zobacz</a>
       <a class="btn btn-primary" href="{{ route('zlecenie.edit',$zlecenie->id) }}">Edytuj</a>
       @hasrole('Admin')
        {!! Form::open(['method' => 'DELETE','route' => ['zlecenie.destroy', $zlecenie->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Usuń', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
        @endhasrole
    </td>
  </tr>
  @endforeach
</table>


{!! $data->render() !!}



@endsection