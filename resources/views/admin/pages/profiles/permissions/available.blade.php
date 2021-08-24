@extends('adminlte::page')

@section('title', "Perfil disponivel para o  Plano {$plan->name}")

@section('content_header')
   
   <ol class="breadcrumb">
    <li  class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item" ><a href="{{route('plans.index')}}">Planos</a></li>
    <li class="breadcrumb-item" ><a href="{{route('plans.profiles',$plan->id)}}">Perfis</a></li>
    <li class="breadcrumb-item active" ><a href="{{route('plans.profiles',$plan->id)}}">Disponivel</a></li>
   </ol>

   <h1>Perfis disponivel o plano <strong>{{$plan->name}}</strong></h1>

   <h1>Plano  disponivel para o  Perfil   {{$profile->name}}
    <a href="{{route('plans.profiles.available',$profile->id)}}" class="btn btn-success">
       ADD
    </a> 
    </h1>


@stop

@section('content')
@include('admin.includes.alerts')
   <div class="card">
       <div class="card-header">
           <form action="{{route('plans.profile.available',$profile->id)}}" method="POST" class="form form-inline">
               @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{$filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
           </form>
       </div>
       <div class="card-body">

           <table class="table table-condensed">
               <tr>
                  <th width="100px">#</th>
                   <th>Nome</th>
                
               </tr>

               <tbody>
                <form action="{{route('plans.profiles.attach',$plan->id)}}" method="POST">
                @foreach ($profiles as $profile)
                
                    @csrf
            
                <tr>
                    <td><input type="checkbox" name="profiles[]" value="{{$profile->id}}"></td>
                    <td>{{$profile->name}}</td>
                
                </tr>
                   
                @endforeach
                <tr>
                    <td colspan="500">
                    
                    <button type="submit" class="btn btn-success"> Vincular</button>
                    </td>
                </tr>
            </form>
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

