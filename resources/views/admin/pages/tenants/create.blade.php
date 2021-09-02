@extends('adminlte::page')

@section('title', 'Cadastrar Novo Produto')

@section('content_header')
    <h1>Cadastrar Nova Empresa  </h1>
   
@stop

@section('content')
   <div class="card">
       <div class="card-header"></div>
        <div class="body p-5">
            <form action="{{route('tenants.store')}}" method="POST" enctype="multipart/form-data">
                @include('admin.pages.tenants._partials.form')
            </form>

            
        </div>
       <div class="card-footer">

       </div>
   </div>
@stop

