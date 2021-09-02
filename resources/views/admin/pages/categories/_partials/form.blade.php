@include('admin.includes.alerts')
@csrf

<div class="form-group">
    <label for="">Nome:</label>
    <input type="text" name="name" id="name" class="form-control"   value="{{$categories->name ?? old('name')}}">
</div>

<div class="form-group">
    <label for="">Descrição:</label>
  <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$categories->description ?? old('description')}}</textarea>
</div>




<div class="form-group">
    <button input="submit" class="btn btn-dark" >Salvar</button>
</div>