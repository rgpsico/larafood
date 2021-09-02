@extends('adminlte::page')

@section('title',"Detalhes do Produto {$products->title}")

@section('content_header')
    <h1>Detalhes Do Produto <b>{{$products->title}}</b></h1>
   
@stop

@section('content')
   <div class="card">
       <div class="card-header">

        @include('admin.includes.alerts')
       </div>
        <div class="card-body p-5"> 

            <ul>
                <li>
                    <td><img src="{{url("storage/{$products->image}")}}" alt="" width="100" height="100"></td>
                </li>
                <li>
                    <strong>Nome:</strong>{{$products->title}}
                </li>

                <li>
                    <strong>URL:</strong>{{$products->flag}}
                </li>

                <li>
                    <strong>Descrição:</strong>{{$products->description}}
                </li>
             
            </ul>          

       
        </div>
       <div class="card-footer">
     <form action="{{route('products.destroy',$products->id)}}" method="POST">
        @csrf
         @method('DELETE')
         <button type="submit" class="btn btn-danger"><b>Deletar o Usuario</b>: {{$products->title}}</button>
     </form>
       </div>
   </div>
@stop

