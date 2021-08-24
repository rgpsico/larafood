@extends('adminlte::page')

@section('title', "editar o deatlhe {{$detail->name}}")

@section('content_header')
   
   <ol class="breadcrumb">
       <li  class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
       <li class="breadcrumb-item" ><a href="{{route('plans.index')}}">Planos</a></li>
       <li class="breadcrumb-item" ><a href="{{route('details.plan.index',$plan->name)}}">Detalhes</a></li>
       <li class="breadcrumb-item" ><a href="{{route('details.plan.edit',[$plan->url, $detail->id])}}"
         class="active">Editar</a></li>
   </ol>

   <h1>Editar o detalhe ao plano {{$detail->name}} 
    </h1>
@stop

@section('content')
   <div class="card">
       <div class="card-header"></div>
       <div class="card-body">  
       <ul>
        <li>
            <strong>Nome:</strong> {{$detail->name}}
        </li>

    
    </ul>      
           
    
       <div class="card-footer">
        <form action="{{route('details.plan.destroy',[$plan->url, $detail->id])}}" method="POST">
           @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><b>Deletar o Detalhe</b>: {{$detail->name}} do plano {{$plan->name}}</button>
        </form>
          </div>
        </div>
   </div>
@stop

