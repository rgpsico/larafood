@extends('adminlte::page')

@section('title', "Detalhes do plano {{$permission->name}}")

@section('content_header')
    <h1>Detalhes Do permissiono <b>{{$permission->name}}</b></h1>
   
@stop

@section('content')
   <div class="card">
       <div class="card-header">

        @include('admin.includes.alerts')
       </div>
        <div class="card-body p-5"> 

            <ul>
                <li>
                    <strong>Nome:</strong> {{$permission->name}}
                </li>

            

                <li>
                    <strong>Description:</strong>{{$permission->description}}
                </li>
            </ul>          

       
        </div>
       <div class="card-footer">
     <form action="{{route('permissions.destroy',$permission->id)}}" method="POST">
        @csrf
         @method('DELETE')
         <button type="submit" class="btn btn-danger"><b>Deletar o Plano</b>: {{$permission->name}}</button>
     </form>
       </div>
   </div>
@stop

