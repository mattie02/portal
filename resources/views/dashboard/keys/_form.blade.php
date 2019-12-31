<div class="form-group">
    <label for="key">Key</label>
    <input type="text" class="form-control" id="key" name="key" value="{{ old('key', $data->key) }}">
</div>

<br>
<hr>
<button type="submit" class="btn btn-primary">{{ $submitButtonText ?? 'Save' }}</button>
