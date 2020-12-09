@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Nome" value="{{ $tenant->name ?? old('title')}}">
</div>
<div class="form-group">
    <label for="logo">Logo</label>
    <input type="file" name="logo" id="logo" accept="*"  class="form-control-file" value="">
</div>
<div class="form-group">
    <label for="email">E-mail</label>
    <input type="text" name="email" id="email" class="form-control" placeholder="Nome" value="{{ $tenant->email ?? old('email')}}">
</div>
<div class="form-group">
    <label for="cnpj">CNPJ</label>
    <input type="text" name="cnpj" id="cnpj" class="form-control" placeholder="CNPJ" value="{{ $tenant->cnpj ?? old('cnpj')}}">
</div>
<div class="form-group">
    <label for="active">Ativo ?</label>
    <select name="active" id="active" class="form-control">
        <option value="Y" @if(isset($tenant) && $tenant->active == 'Y') selecetd @endif >Sim</option>
        <option value="N" @if(isset($tenant) && $tenant->active == 'N') selecetd @endif >Não</option>
    </select>
</div>

<hr>

<h3>Assinatura</h3>

<div class="form-group">
    <label for="subscription">Data Assinatura (início)</label>
    <input type="date" name="subscription" class="form-control data" placeholder="Data Assinatura" value="{{$tenant->subscription->format('d/m/y') }}">
</div>
<div class="form-group">
    <label for="expires_at">Expira em (final)</label>
    <input type="date" name="expires_at" class="form-control data" placeholder="Expira em" value="{{$tenant->expires_at->format('d/m/y') }}">
</div>
<div class="form-group">
    <label for="sub_active">Assinatura Ativa ?</label>
    <select name="sub_active" class="form-control">
        <option selected disabled>Select...</option>
        <option value="1" @if(isset($tenant) && $tenant->sub_active) selected @endif >Sim</option>
        <option value="0" @if(isset($tenant) && $tenant->sub_active) selected @endif >Não</option>
    </select>
</div>
<div class="form-group">
    <label for="sub_suspended">Assinatura Cancelada ?</label>
    <select name="sub_suspended" class="form-control">
        <option selected disabled>Select...</option>
        <option value="1" @if(isset($tenant) && $tenant->sub_suspended) selected @endif >Sim</option>
        <option value="0" @if(isset($tenant) && $tenant->sub_suspended) selected @endif >Não</option>
    </select>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success" data-toogle="tooltip" title="Salvar">Salvar</button>
</div>

