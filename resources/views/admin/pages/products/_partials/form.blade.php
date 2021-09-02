@include('admin.includes.alerts')
@csrf

<div class="form-group">
    <label for="">Nome:</label>
    <input type="text" name="title" id="title" class="form-control"   value="{{$products->title ?? old('title')}}">
</div>

<div class="form-group">
    <label for="">Preço:</label>
    <input type="text" name="price" id="price" class="form-control"   value="{{$products->price ?? old('price')}}">
</div>

<div class="form-group">
    <label for="">Descrição:</label>
  <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$products->description ?? old('description')}}</textarea>
</div>

<div class="form-group">
    <label for="">Image:</label>
    <input type="file" name="image" id="image"  class="form-control">
</div>



<div class="form-group">
    <button input="submit" class="btn btn-dark" >Salvar</button>
</div>