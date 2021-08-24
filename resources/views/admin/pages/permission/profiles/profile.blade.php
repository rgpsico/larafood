@extends('adminlte::page')

@section('title', "Perfis da permissão {$permission->name}")

@section('content_header')
   
   <ol class="breadcrumb">
       <li  class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
       <li class="breadcrumb-item active" ><a href="{{route('permissions.index')}}">perfilos</a></li>
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
                @foreach ($profiles as $profile)
                <tr>
                    <td>{{$profile->name}}</td>

                    <td>
                        <a href="{{route('profiles.permissions.detach',[$profile->id,$permission->id])}}" class="btn btn-danger">DESVINCULAR</a>
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

