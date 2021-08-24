@extends('adminlte::page')

@section('title', "Editar  Plano {$permission->name}")

@section('content_header')
    <h1>Editar Permissão  </h1>
   
@stop

@section('content')
<div class="card">
    <div class="card-header"></div>
        <div class="body p-5">
            <form action="{{route('permissions.update',$permission->id)}}" method="POST">
                @method('PUT')
                @include('admin.pages.permission._partials.form')
            </form>            
        </div>
    <div class="card-footer"> </div>
</div>
@stop

