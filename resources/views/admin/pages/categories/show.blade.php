@extends('adminlte::page')

@section('title',"Detalhes da Categoria {$categories->name}")

@section('content_header')
    <h1>Detalhes Da Categoria <b>{{$categories->name}}</b></h1>
   
@stop

@section('content')
   <div class="card">
       <div class="card-header">

        @include('admin.includes.alerts')
       </div>
        <div class="card-body p-5"> 

            <ul>
                <li>
                    <strong>Nome:</strong>{{$categories->name}}
                </li>

                <li>
                    <strong>URL:</strong>{{$categories->url}}
                </li>

                <li>
                    <strong>Descrição:</strong>{{$categories->description}}
                </li>
             
            </ul>          

       
        </div>
       <div class="card-footer">
     <form action="{{route('categories.destroy',$categories->id)}}" method="POST">
        @csrf
         @method('DELETE')
         <button type="submit" class="btn btn-danger"><b>Deletar o Usuario</b>: {{$categories->name}}</button>
     </form>
       </div>
   </div>
@stop

