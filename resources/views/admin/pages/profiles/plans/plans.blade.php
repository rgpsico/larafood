@extends('adminlte::page')

@section('title', "Planos da perfil {$profile->name}")

@section('content_header')
   
   <ol class="breadcrumb">
       <li  class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
       <li class="breadcrumb-item " ><a href="{{route('profiles.index')}}">Perfis</a></li>
       <li class="breadcrumb-item active" ><a href="{{route('profiles.plans',$profile->id)}}" clas="active">Planos</a></li>
   </ol>
@stop

@section('content')
@include('admin.includes.alerts')
   <div class="card">
       <div class="card-header">
         
       </div>
       <div class="card-body">
           <table class="table table-condensed">
               <tr>
                   <th>Nome</th>
                   <th>Ações</th>          
               </tr>

               <tbody>
                @foreach ($plans as $plan)
                <tr>
                    <td>{{$plan->name}}</td>

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
           {!!$plans->appends($filters)->links()!!}
           @else 
           {!! $plans->links() !!}
           @endif
           
       </div>
   </div>
@stop

