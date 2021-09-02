@extends('adminlte::page')

@section('title', "Editar  Usuario {$user->name}")

@section('content_header')
    <h1>Editar Usuario  </h1>
   
@stop

@section('content')
   <div class="card">
       <div class="card-header"></div>
        <div class="body p-5">
            <form action="{{route('users.update',$user->id)}}" method="POST">
                @method('PUT')
                @include('admin.pages.users._partials.form')
            </form>

            
        </div>
       <div class="card-footer">

       </div>
   </div>
@stop

