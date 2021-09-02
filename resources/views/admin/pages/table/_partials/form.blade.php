@include('admin.includes.alerts')
@csrf

<div class="form-group">
    <label for="">Identificação:</label>
    <input type="text" name="identify" id="identify" class="form-control"   value="{{$table->identify ?? old('identify')}}">
</div>

<div class="form-group">
    <label for="">Descrição:</label>
  <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$table->description ?? old('description')}}</textarea>
</div>




<div class="form-group">
    <button input="submit" class="btn btn-dark" >Salvar</button>
</div>