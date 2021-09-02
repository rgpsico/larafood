@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
    <h1>Categoria  
    <a href="{{route('categories.create')}}" class="btn btn-success">
       Adicionar
    </a> 
    </h1>
   <ol class="breadcrumb">
       <li  class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
       <li class="breadcrumb-item active" ><a href="{{route('categories.index')}}">Usuários</a></li>
   </ol>
@stop

@section('content')
@include('admin.includes.alerts')
   <div class="card">
       <div class="card-header">
           <form action="{{route('categories.search')}}" method="POST" class="form form-inline">
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
                @foreach ($categories as $category)
                <tr>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td>         
                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-dark">Editar</a>
                        <a href="{{route('categories.show',$category->id)}}" class="btn btn-info">Ver</a>
              
                    </td>
                </tr>
                @endforeach
    
               </tbody>
           </table>
       </div>
       <div class="card-footer">
           @if(isset($filters))
           {!!$categories->appends($filters)->links()!!}
           @else 
           {!! $categories->links() !!}
           @endif
           
       </div>
   </div>
@stop

