@extends('adminlte::page')

@section('title', "Editar  Categoria {$categories->name}")

@section('content_header')
    <h1>Editar Categoria  </h1>
   
@stop

@section('content')
   <div class="card">
       <div class="card-header">
          <strong>Categoria: {{$categories->name}}</strong>
       </div>
        <div class="body p-5">
            <form action="{{route('categories.update',$categories->id)}}" method="POST">
                @method('PUT')
                @include('admin.pages.categories._partials.form')
            </form>

            
        </div>
       <div class="card-footer">

       </div>
   </div>
@stop

