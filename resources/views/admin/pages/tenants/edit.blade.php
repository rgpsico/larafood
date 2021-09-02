@extends('adminlte::page')

@section('title', "Editar  Empresa {$tenants->name}")

@section('content_header')
    <h1>Editar Empresa  </h1>
   
@stop

@section('content')
   <div class="card">
       <div class="card-header">
          <strong>Categoria: {{$tenants->name}}</strong>
       </div>
        <div class="body p-5">
            <form action="{{route('tenants.update',$tenants->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('admin.pages.tenants._partials.form')
            </form>

            
        </div>
       <div class="card-footer">

       </div>
   </div>
@stop

