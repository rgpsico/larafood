@extends('adminlte::page')

@section('title', "Editar  Mesa {$table->name}")

@section('content_header')
    <h1>Editar mesa  </h1>
   
@stop

@section('content')
   <div class="card">
       <div class="card-header">
          <strong>mesa: {{$table->name}}</strong>
       </div>
        <div class="body p-5">
            <form action="{{route('table.update',$table->id)}}" method="POST">
                @method('PUT')
                @include('admin.pages.table._partials.form')
            </form>

            
        </div>
       <div class="card-footer">

       </div>
   </div>
@stop

