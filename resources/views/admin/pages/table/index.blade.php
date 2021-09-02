@extends('adminlte::page')

@section('title', 'Mesa')

@section('content_header')
    <h1>Mesa  
    <a href="{{route('table.create')}}" class="btn btn-success">
       Adicionar
    </a> 
    </h1>
   <ol class="breadcrumb">
       <li  class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
       <li class="breadcrumb-item active" ><a href="{{route('table.index')}}">Usuários</a></li>
   </ol>
@stop

@section('content')
@include('admin.includes.alerts')
   <div class="card">
       <div class="card-header">
           <form action="{{route('table.search')}}" method="POST" class="form form-inline">
               @csrf
                <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{$filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
           </form>
       </div>
       <div class="card-body">
           <table class="table table-condensed">
               <tr>
                   <th>Nome</th>
                   <th>Descrição</th>
                   <th with="50">Ações</th>
               </tr>

               <tbody>
                @foreach ($tables as $table)
                <tr>
                    <td>{{$table->identify}}</td>
                    <td>{{$table->description}}</td>
                    <td>         
                        <a href="{{route('table.edit',$table->id)}}" class="btn btn-dark">Editar</a>
                        <a href="{{route('table.show',$table->id)}}" class="btn btn-info">Ver</a>
              
                    </td>
                </tr>
                @endforeach
    
               </tbody>
           </table>
       </div>
       <div class="card-footer">
           @if(isset($filters))
           {!!$tables->appends($filters)->links()!!}
           @else 
           {!! $tables->links() !!}
           @endif
           
       </div>
   </div>
@stop

