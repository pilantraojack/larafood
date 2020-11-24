@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">ID da Mesa</label>
    <input type="text" name="identify" id="identify" class="form-control" placeholder="ID da Mesa" value="{{ $table->identify ?? old('identify')}}">
</div>
<div class="form-group">
    <label for="email">Descrição</label>
    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $category->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>
