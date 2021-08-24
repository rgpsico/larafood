@include('admin.includes.alerts')


<div class="form-group">
    <label for="">Name:</label>
    <input type="text" name="name" id="name" class="form-control"   value="{{$plan->name ?? old('name')}}">
</div>

<div class="form-group">
    <label for="">Preço:</label>
    <input type="text" name="price" id="price" class="form-control" value="{{$plan->price ?? old('price')}}">
</div>


<div class="form-group">
    <label for="">Descricao:</label>
   <textarea name="description" id="description" cols="30" rows="5" class="form-control">
    {{$plan->description ?? old('description')}}

   </textarea>
</div>

<div class="form-group">
    <button input="submit" class="btn btn-dark" >Salvar</button>
</div>