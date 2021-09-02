@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>Produtos  
    <a href="{{route('products.create')}}" class="btn btn-success">
       Adicionar
    </a> 
    </h1>
   <ol class="breadcrumb">
       <li  class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
       <li class="breadcrumb-item active" ><a href="{{route('products.index')}}">Usuários</a></li>
   </ol>
@stop

@section('content')
@include('admin.includes.alerts')
   <div class="card">
       <div class="card-header">
           <form action="{{route('products.search')}}" method="POST" class="form form-inline">
               @csrf
                <input type="text" title="filter" placeholder="Filtrar:" class="form-control" value="{{$filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
           </form>
       </div>
       <div class="card-body">
           <table class="table table-condensed">
               <tr>
                <th>imagem</th>
                   <th>Titulo</th>
                   <th>Descrição</th>
                   <th with="50">Ações</th>
               </tr>

               <tbody>
                @foreach ($products as $product)
                <tr>
              
                    <td><img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->title }}" style="max-width: 90px;"></td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>         
                        <a href="{{route('products.edit',$product->id)}}" class="btn btn-dark">Editar</a>
                        <a href="{{route('products.show',$product->id)}}" class="btn btn-info">Ver</a>
                        <a href="{{route('products.categories',$product->id)}}" class="btn btn-info">Adicionar Categoria</a>
                    </td>
                </tr>
                @endforeach
    
               </tbody>
           </table>
       </div>
       <div class="card-footer">
           @if(isset($filters))
           {!!$products->appends($filters)->links()!!}
           @else 
           {!! $products->links() !!}
           @endif
           
       </div>
   </div>
@stop

