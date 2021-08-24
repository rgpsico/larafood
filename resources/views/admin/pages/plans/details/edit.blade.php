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
        <form action="{{route('details.plan.update',[$plan->url,$detail->id])}}" method="post">
            @method('PUT')
            @include('admin.pages.plans.details._partials.form')

        </form>
           
       </div>
       
   </div>
@stop

