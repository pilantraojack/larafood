@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Nome" value="{{ $category->name ?? old('name')}}">
</div>
<div class="form-group">
    <label for="email">Descrição</label>
    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $category->description }}</textarea>
</div>
<div class="form-group">
    <label for="password">Senha</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Senha" value="{{ $user->password ?? old('password')}}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>

