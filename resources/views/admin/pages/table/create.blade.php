@extends('adminlte::page')

@section('title', 'Cadastrar Nova Mesa')

@section('content_header')
    <h1>Cadastrar Nova Mesa  </h1>
   
@stop

@section('content')
   <div class="card">
       <div class="card-header"></div>
        <div class="body p-5">
            <form action="{{route('table.store')}}" method="POST">
                @include('admin.pages.table._partials.form')
            </form>

            
        </div>
       <div class="card-footer">

       </div>
   </div>
@stop

