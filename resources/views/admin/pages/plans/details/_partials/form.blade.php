@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <label for="">Nome:</label>
    <input type="text" name="name" placeholder="Nome" class="form-control" value="{{$detail-> name ?? old('name')}}">
</div>

<div class="form-group">
    <input type="submit"  value="Salvar" class="btn btn-info">
</div>

