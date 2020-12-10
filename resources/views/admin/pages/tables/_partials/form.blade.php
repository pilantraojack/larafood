@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" name="identify" id="identify" class="form-control" placeholder="ID da Mesa" value="{{ $table->identify ?? old('identify')}}">
</div>
<div class="form-group">
    <label for="email">Descrição</label>
    <textarea name="description" id="description" cols="20" rows="5" class="form-control">{{ $table->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success" title="Salvar">Salvar</button>
</div>

