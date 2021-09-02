@extends('adminlte::page')

@section('title',"Detalhes da Mesa {$table->name}")

@section('content_header')
    <h1>Detalhes Da Categoria <b>{{$table->name}}</b></h1>
   
@stop

@section('content')
   <div class="card">
       <div class="card-header">

        @include('admin.includes.alerts')
       </div>
        <div class="card-body p-5"> 

            <ul>
                <li>
                    <strong>Nome:</strong>{{$table->identify}}
                </li>


                <li>
                    <strong>Descrição:</strong>{{$table->description}}
                </li>
             
            </ul>          

       
        </div>
       <div class="card-footer">
     <form action="{{route('table.destroy',$table->id)}}" method="POST">
        @csrf
         @method('DELETE')
         <button type="submit" class="btn btn-danger"><b>Deletar o Usuario</b>: {{$table->name}}</button>
     </form>
       </div>
   </div>
@stop

