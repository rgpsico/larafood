@include('admin.includes.alerts')
@csrf

<div class="form-group">
    <label for="">Nome:</label>
    <input type="text" name="name" id="name" class="form-control"   value="{{$user->name ?? old('name')}}">
</div>

<div class="form-group">
    <label for="">E-mail:</label>
    <input type="text" name="email" id="email" class="form-control" value="{{$user->email ?? old('email')}}">
</div>

<div class="form-group">
    <label for="">Senha:</label>
    <input type="password" name="password" id="password" class="form-control" value="{{$user->password ?? old('password')}}">
</div>



<div class="form-group">
    <button input="submit" class="btn btn-dark" >Salvar</button>
</div>