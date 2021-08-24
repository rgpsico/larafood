@extends('adminlte::page')

@section('title', 'Cadastrar Novo Perfil')

@section('content_header')
    <h1>Cadastrar Nova Permissão  </h1>
   
@stop

@section('content')
   <div class="card">
       <div class="card-header"></div>
        <div class="body p-5">
            <form action="{{route('permissions.store')}}" method="POST">
                @csrf
                @include('admin.pages.permission._partials.form')
            </form>

            
        </div>
       <div class="card-footer">

       </div>
   </div>
@stop

