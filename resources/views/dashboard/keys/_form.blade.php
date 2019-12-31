<div class="form-group">
        <label for="label">Label</label>
        <input type="text" class="form-control" id="label" name="label" value="{{ old('label', $data->label) }}">
    </div>

<div class="form-group">
    <label for="key">Key</label>
    <input type="text" class="form-control" id="key" name="key" value="{{ old('key', $data->key) }}">
</div>

<div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="active" name="active" value="1" {{ old('active', $data->active == 1 ? 'checked' : '') }}>
        <label class="form-check-label" for="active">Active</label>
    </div>
<br>
<hr>
<button type="submit" class="btn btn-primary">{{ $submitButtonText ?? 'Save' }}</button>
