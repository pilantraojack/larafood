@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Nome" value="{{ $plan->name ?? old('name')}}">
</div>
<div class="form-group">
    <label for="preco">Preço</label>
    <input type="text" name="price" id="price" class="form-control money" placeholder="$" value="{{ $plan->price ?? old('price')}}">
</div>
<div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" name="description" id="description" class="form-control" placeholder="Descrição" value="{{ $plan->description ?? old('description')}}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark" title="Salvar" >Salvar</button>
</div>
