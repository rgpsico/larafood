@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Planos  
    <a href="{{route('plans.create')}}" class="btn btn-success">
       Adicionar
    </a> 
    </h1>
   <ol class="breadcrumb">
       <li  class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
       <li class="breadcrumb-item active" ><a href="{{route('plans.index')}}">Planos</a></li>
   </ol>
@stop

@section('content')
   <div class="card">
       <div class="card-header">
           <form action="{{route('plans.search')}}" method="POST" class="form form-inline">
               @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{$filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
           </form>
       </div>
       <div class="card-body">
           <table class="table table-condensed">
               <tr>
                   <th>Nome</th>
                   <th>Preço</th>
                   <th with="50">Ações</th>
               </tr>

               <tbody>
                @foreach ($plans as $plan)
                <tr>
                    <td>{{$plan->name}}</td>
                    <td>{{number_format($plan->price,2,',','.')}}</td>
                    <td>
                        <a href="{{route('details.plan.index',$plan->url)}}" class="btn btn-primary">detalhes</a>
                        <a href="{{route('plans.edit',$plan->url)}}" class="btn btn-dark">Editar</a>
                        <a href="{{route('plans.show',$plan->url)}}" class="btn btn-info">Ver</a>
                        <a href="{{route('plans.profiles',$plan->id)}}" class="btn btn-warning">Perfil</a>
                    </td>
                </tr>
                @endforeach
    
               </tbody>
           </table>
       </div>
       <div class="card-footer">
           @if(isset($filters))
           {!!$plans->appends($filters)->links()!!}
           @else 
           {!! $plans->links() !!}
           @endif
           
       </div>
   </div>
@stop

