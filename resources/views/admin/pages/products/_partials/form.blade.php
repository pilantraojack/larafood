@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">* Título</label>
    <input type="text" name="title" id="title" class="form-control" placeholder="Título" value="{{ $product->title ?? old('title')}}">
</div>
<div class="form-group">
    <label for="name">* Preço</label>
    <input type="text" name="price" id="price" class="form-control" placeholder="Preço" value="{{ $product->price ?? old('price')}}">
</div>
<div class="form-group">
    <label for="name">* Imagem</label>
    <input type="file" name="image" id="image" class="form-control-file">
</div>
<div class="form-group">
    <label for="email">* Descrição</label>
    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $product->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>
