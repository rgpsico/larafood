@extends('adminlte::page')

@section('title', 'Cadastrar Novo Usuário')

@section('content_header')
    <h1>Cadastrar Nova Categoria  </h1>
   
@stop

@section('content')
   <div class="card">
       <div class="card-header"></div>
        <div class="body p-5">
            <form action="{{route('categories.store')}}" method="POST">
                @include('admin.pages.categories._partials.form')
            </form>

            
        </div>
       <div class="card-footer">

       </div>
   </div>
@stop

