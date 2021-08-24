@extends('adminlte::page')

@section('title', "Perfis disponivel para o plano {$plan->name}")

@section('content_header')
    <h1>ADD Novo Perfil   {{$plan->name}}
    <a href="{{route('plans.profiles.available',$plan->id)}}" class="btn btn-success">
       ADD
    </a> 
    </h1>
   <ol class="breadcrumb">
       <li  class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
       <li class="breadcrumb-item" ><a href="{{route('plans.index')}}">Planos</a></li>
       <li class="breadcrumb-item" ><a href="{{route('plans.profiles',$plan->id)}}">Perfis</a></li>
       <li class="breadcrumb-item active" ><a href="{{route('plans.profiles',$plan->id)}}">Perfis</a></li>
    </ol>

    <h1>Prfis disponivel o plano <strong>{{$profile->name}}</strong></h1>
@stop

@section('content')
@include('admin.includes.alerts')
   <div class="card">
       <div class="card-header">
           <form action="{{route('plans.profiles.available',$plan->id)}}" method="POST" class="form form-inline">
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
                        <a href="{{route('plans.profile.detach',[$plan->id,$profile->id])}}" class="btn btn-danger">DESVINCULAR</a>
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

