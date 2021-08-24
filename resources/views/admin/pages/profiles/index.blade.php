@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <h1>Adicionar
    <a href="{{route('profiles.create')}}" class="btn btn-success">
        Perfil  
    </a> 
    </h1>
   <ol class="breadcrumb">
       <li  class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
       <li class="breadcrumb-item active" ><a href="{{route('profiles.index')}}">perfilos</a></li>
   </ol>
@stop

@section('content')
@include('admin.includes.alerts')
   <div class="card">
       <div class="card-header">
           <form action="{{route('profiles.search')}}" method="POST" class="form form-inline">
               @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{$filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
           </form>
       </div>
       <div class="card-body">
           <table class="table table-condensed">
               <tr>
                   <th>Nome</th>
                   <th with="50">Ações</th>
               </tr>

               <tbody>
                @foreach ($profiles as $profile)
                <tr>
                    <td>{{$profile->name}}</td>
                    <td>
                        <a href="{{route('profiles.edit',$profile->id)}}" class="btn btn-dark">Editar</a>
                        <a href="{{route('profiles.show',$profile->id)}}" class="btn btn-info">Ver</a>
                        <a href="{{route('profiles.permissions',$profile->id)}}" class="btn btn-warning">Permissões</a>
                        <a href="{{route('profiles.plans',$profile->id)}}" class="btn btn-info"><i class="fas fas-list-alt"></i></a>
                    </td>
                </tr>
                @endforeach
    
               </tbody>
           </table>
       </div>
       <div class="card-footer">
           @if(isset($filters))
           {!!$profiles->appends($filters)->links()!!}
           @else 
           {!! $profiles->links() !!}
           @endif
           
       </div>
   </div>
@stop

