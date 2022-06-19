@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edytuj zlecenie</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('zlecenie.index') }}"> Back</a>
        </div>
    </div>
</div>


{!! Form::model($zlecenie, ['method' => 'PATCH','route' => ['zlecenie.update', $zlecenie->id]]) !!}
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Treść:</strong>
            {!! Form::textarea('tresc', null, array('placeholder' => 'Treść','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Adres:</strong>
            {!! Form::text('adres',null, array('placeholder' => 'Adres','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Miasto:</strong>
            {!! Form::text('miasto',null, array('placeholder' => 'Miasto','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Kraj:</strong>
            {!! Form::text('kraj',null, array('placeholder' => 'Kraj','class' => 'form-control')) !!}
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Status:</strong>
            {!! Form::select('status', $statusy,['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>User:</strong>
            {!! Form::select('user_id', $usersById,['class'=>'form-control']) !!}
        </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


 
@endsection