@extends('adminlte::page')

@section('title', "Editar  Produto {$products->name}")

@section('content_header')
    <h1>Editar Categoria  </h1>
   
@stop

@section('content')
   <div class="card">
       <div class="card-header">
          <strong>Categoria: {{$products->name}}</strong>
       </div>
        <div class="body p-5">
            <form action="{{route('products.update',$products->id)}}" method="POST">
                @method('PUT')
                @include('admin.pages.products._partials.form')
            </form>

            
        </div>
       <div class="card-footer">

       </div>
   </div>
@stop

