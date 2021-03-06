@include('admin.includes.alerts')

<div class="form-group">
    <input type="hidden" name="tenant_id"  value="{{ $tenant = auth()->user()->tenant->id }}">

    <label for="name">Título</label>
    <input type="text" name="title" id="title" class="form-control" placeholder="Título" value="{{ $product->title ?? old('title')}}">
</div>
<div class="form-group">
    <label for="name">Preço</label>
    <input type="number" step="0.01" name="price" id="price" class="form-control" placeholder="R$" value="{{ $product->price ?? old('price')}}">
</div>
<div class="form-group">
    <label for="name">Imagem</label>
    <input type="file" name="image" id="image" class="form-control-file" value="{{ $product->image ?? old('image') }}">
</div>
<div class="form-group">
    <label for="email">Descrição</label>
    <textarea name="description" id="description" cols="20" rows="5" class="form-control">{{ $product->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success" title="Salvar">Salvar</button>
</div>

