@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Pokaż użytkownika</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('zlecenie.index') }}"> Wróć</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tresc:</strong>
            {{ $zlecenie->tresc }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Adres:</strong>
            {{ $zlecenie->adres }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Miasto:</strong>
        {{ $zlecenie->miasto }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Kraj:</strong>
        {{ $zlecenie->kraj }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Status:</strong>
        {{ $zlecenie->status }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>User:</strong>
        {{ $zlecenie->user->name }}
        </div>
    </div>
</div>
@endsection