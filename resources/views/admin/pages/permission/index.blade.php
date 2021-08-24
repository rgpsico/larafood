@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <h1>Adicionar
    <a href="{{route('permissions.create')}}" class="btn btn-success">
        Permissoes  
    </a> 
    </h1>
   <ol class="breadcrumb">
       <li  class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
       <li class="breadcrumb-item active" ><a href="{{route('permissions.index')}}">perfilos</a></li>
   </ol>
@stop

@section('content')
@include('admin.includes.alerts')
   <div class="card">
       <div class="card-header">
           <form action="{{route('permissions.search')}}" method="POST" class="form form-inline">
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
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{$permission->name}}</td>
                    <td>
                        <a href="{{route('permissions.edit',$permission->id)}}" class="btn btn-dark">Editar</a>
                        <a href="{{route('permissions.show',$permission->id)}}" class="btn btn-info">Ver</a>
                        <a href="{{route('permissions.profiles',$permission->id)}}" class="btn btn-danger"><i class="fas fa-address-book"></i></a>
                    </td>
                </tr>
                @endforeach
    
               </tbody>
           </table>
       </div>
       <div class="card-footer">
           @if(isset($filters))
           {!!$permissions->appends($filters)->links()!!}
           @else 
           {!! $permissions->links() !!}
           @endif
           
       </div>
   </div>
@stop

