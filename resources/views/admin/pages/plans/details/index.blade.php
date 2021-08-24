@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
  
   <ol class="breadcrumb">
       <li  class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
       <li class="breadcrumb-item active" ><a href="{{route('plans.index')}}">Planos</a></li>
       <li class="breadcrumb-item active" ><a href="{{route('plans.show',$plan->url)}}">{{$plan->name}}</a></li>
       <li class="breadcrumb-item active" ><a href="{{route('details.plan.index',$plan->url)}}">{{$plan->url}}</a>Detalhes</li>
   </ol>

   <h1> Cadatrar Detalhes do Plano {{$plan->name}}
    <a href="{{route('details.plan.create',$plan->url)}}" class="btn btn-dark">
      ADD
    </a> 
    </h1>
@stop

@section('content')
@include('admin.includes.alerts')
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
                
                   <th with="50">Ações</th>
               </tr>

               <tbody>
                @foreach ($details as $detail)
                <tr>
                    <td>{{$detail->name}}</td>
                
                    <td>
                        <a href="{{route('details.plan.edit',[$plan->url, $detail->id])}}" class="btn btn-dark">Editar</a>
                        <a href="{{route('details.plan.show',[$plan->url, $detail->id])}}" class="btn btn-info">Ver</a>
                    </td>
                </tr>
                @endforeach
    
               </tbody>
           </table>
       </div>
       <div class="card-footer">
           @if(isset($filters))
           {!!$details->appends($filters)->links()!!}
           @else 
           {!! $details->links() !!}
           @endif
           
       </div>
   </div>
@stop

