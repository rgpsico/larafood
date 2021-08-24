@extends('adminlte::page')

@section('title', 'Detalhes do plano {{$plan->name}}')

@section('content_header')
    <h1>Detalhes Do Plano <b>{{$plan->name}}</b></h1>
   
@stop

@section('content')
   <div class="card">
       <div class="card-header">

        @include('admin.includes.alerts')
       </div>
        <div class="card-body p-5"> 

            <ul>
                <li>
                    <strong>Nome:</strong>{{$plan->name}}
                </li>

                <li>
                    <strong>Url:</strong>{{$plan->url}}
                </li>

                
                <li>
                    <strong>Preço:</strong>{{number_format($plan->price,2,',','.')}}
                </li>

                <li>
                    <strong>Description:</strong>{{$plan->description}}
                </li>
            </ul>          

       
        </div>
       <div class="card-footer">
     <form action="{{route('plans.destroy',$plan->url)}}" method="POST">
        @csrf
         @method('DELETE')
         <button type="submit" class="btn btn-danger"><b>Deletar o Plano</b>: {{$plan->name}}</button>
     </form>
       </div>
   </div>
@stop

