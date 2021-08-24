@extends('adminlte::page')

@section('title', "Detalhes do plano {{$profile->name}}")

@section('content_header')
    <h1>Detalhes Do profileo <b>{{$profile->name}}</b></h1>
   
@stop

@section('content')
   <div class="card">
       <div class="card-header">

        @include('admin.includes.alerts')
       </div>
        <div class="card-body p-5"> 

            <ul>
                <li>
                    <strong>Nome:</strong> {{$profile->name}}
                </li>

            

                <li>
                    <strong>Description:</strong>{{$profile->description}}
                </li>
            </ul>          

       
        </div>
       <div class="card-footer">
     <form action="{{route('profiles.destroy',$profile->id)}}" method="POST">
        @csrf
         @method('DELETE')
         <button type="submit" class="btn btn-danger"><b>Deletar o Plano</b>: {{$profile->name}}</button>
     </form>
       </div>
   </div>
@stop

