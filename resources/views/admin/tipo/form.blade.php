<div class="form-group {{ $errors->has('descrip') ? 'has-error' : ''}}">
    <label for="descrip" class="control-label">{{ 'Descrip' }}</label>
    <input class="form-control" name="descrip" type="text" id="descrip" value="{{ isset($tipo->descrip) ? $tipo->descrip : ''}}" >
    {!! $errors->first('descrip', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
