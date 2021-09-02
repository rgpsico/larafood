@extends('adminlte::page')

@section('title', 'Detalhes do Usuário {{$user->name}}')

@section('content_header')
    <h1>Detalhes Do Usuario <b>{{$user->name}}</b></h1>
   
@stop

@section('content')
   <div class="card">
       <div class="card-header">

        @include('admin.includes.alerts')
       </div>
        <div class="card-body p-5"> 

            <ul>
                <li>
                    <strong>Nome:</strong>{{$user->name}}
                </li>

                <li>
                    <strong>E-mail:</strong>{{$user->email}}
                </li>
                <li>
                    <strong>Empresa: </strong> {{ $user->tenant->name }}
                </li>
             
            </ul>          

       
        </div>
       <div class="card-footer">
     <form action="{{route('users.destroy',$user->id)}}" method="POST">
        @csrf
         @method('DELETE')
         <button type="submit" class="btn btn-danger"><b>Deletar o Usuario</b>: {{$user->name}}</button>
     </form>
       </div>
   </div>
@stop

