@extends('adminlte::page')

@section('title', 'Empresa')

@section('content_header')
    <h1>Empresa</h1>
   <ol class="breadcrumb">
       <li  class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
       <li class="breadcrumb-item active" ><a href="{{route('tenants.index')}}">Usuários</a></li>
   </ol>
@stop

@section('content')
@include('admin.includes.alerts')
   <div class="card">
       <div class="card-header">
           <form action="{{route('tenants.search')}}" method="POST" class="form form-inline">
               @csrf
                <input type="text" title="filter" placeholder="Filtrar:" class="form-control" value="{{$filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
           </form>
       </div>
       <div class="card-body">
           <table class="table table-condensed">
               <tr>
                <th>logo</th>
                   <th>name</th>
                   <th>email</th>
                   <th with="50">Ações</th>
               </tr>

               <tbody>
                @foreach ($tenants as $tenant)
                <tr>
              
                    <td>   <img src="{{ url("storage/{$tenant->logo}") }}" alt="{{ $tenant->title }}" style="max-width: 90px;"></td>
                    <td>{{$tenant->name}}</td>
                    <td>{{$tenant->email}}</td>
                    <td>         
                        <a href="{{route('tenants.edit',$tenant->id)}}" class="btn btn-dark">Editar</a>
                        <a href="{{route('tenants.show',$tenant->id)}}" class="btn btn-info">Ver</a>
                      
                    </td>
                </tr>
                @endforeach
    
               </tbody>
           </table>
       </div>
       <div class="card-footer">
           @if(isset($filters))
           {!!$tenants->appends($filters)->links()!!}
           @else 
           {!! $tenants->links() !!}
           @endif
           
       </div>
   </div>
@stop

