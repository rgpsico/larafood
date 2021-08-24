@extends('adminlte::page')

@section('title', "Editar  Plano {$profiles->name}")

@section('content_header')
    <h1>Editar profiles  </h1>
   
@stop

@section('content')
<div class="card">
    <div class="card-header"></div>
        <div class="body p-5">
            <form action="{{route('profile.update',$profiles->id)}}" method="POST">
                @method('PUT')
                @include('admin.pages.profiles._partials.form')
            </form>            
        </div>
    <div class="card-footer"> </div>
</div>
@stop

