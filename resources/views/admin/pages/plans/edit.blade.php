@extends('adminlte::page')

@section('title', "Editar  Plano {$plan->name}")

@section('content_header')
    <h1>Editar plano  </h1>
   
@stop

@section('content')
   <div class="card">
       <div class="card-header"></div>
        <div class="body p-5">
            <form action="{{route('plans.update',$plan->url)}}" method="POST">
                @method('PUT')
                @include('admin.pages.plans._partials.form')
            </form>

            
        </div>
       <div class="card-footer">

       </div>
   </div>
@stop

