<div class="form-group {{ $errors->has('codigo') ? 'has-error' : ''}}">
    <label for="codigo" class="control-label">{{ 'Codigo' }}</label>
    <input class="form-control" name="codigo" type="text" id="codigo" value="{{ isset($mascotum->codigo) ? $mascotum->codigo : ''}}" >
    {!! $errors->first('codigo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tipo_id') ? 'has-error' : ''}}">
    <label for="tipo_id" class="control-label">{{ 'Tipo Id' }}</label>
    <input class="form-control" name="tipo_id" type="number" id="tipo_id" value="{{ isset($mascotum->tipo_id) ? $mascotum->tipo_id : ''}}" >
    
    
    <select name="tipo_id" id="tipo_id" class="form-control" >
    @foreach ($tipos as $fila)
        <option value="{{$fila->id}}">{{$fila->descrip}}</option>
    @endforeach
    
    </select>
    
    
    
    
    
    
    {!! $errors->first('tipo_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($mascotum->nombre) ? $mascotum->nombre : ''}}" >
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('raza_id') ? 'has-error' : ''}}">
    <label for="raza_id" class="control-label">{{ 'Raza Id' }}</label>
    <input class="form-control" name="raza_id" type="number" id="raza_id" value="{{ isset($mascotum->raza_id) ? $mascotum->raza_id : ''}}" >


    
    <select name="raza_id" id="raza_id" class="form-control">
    @foreach ($razas as $fila)
    <option value="{{$fila->id}}">{{$fila->descrip}}</option>
    @endforeach
    
    </select>
    
    
    
    
    {!! $errors->first('raza_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
    <label for="color" class="control-label">{{ 'Color' }}</label>
    <input class="form-control" name="color" type="text" id="color" value="{{ isset($mascotum->color) ? $mascotum->color : ''}}" >
    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('f_nac') ? 'has-error' : ''}}">
    <label for="f_nac" class="control-label">{{ 'F Nac' }}</label>
    <input class="form-control" name="f_nac" type="date" id="f_nac" value="{{ isset($mascotum->f_nac) ? $mascotum->f_nac : ''}}" >
    {!! $errors->first('f_nac', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('foto') ? 'has-error' : ''}}">
    <label for="foto" class="control-label">{{ 'Foto' }}</label>
    <input class="form-control" name="foto" type="file" id="foto" value="{{ isset($mascotum->foto) ? $mascotum->foto : ''}}" >
    {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
