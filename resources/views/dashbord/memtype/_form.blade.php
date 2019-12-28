<div class="form-group">
    <label for="label">Label</label>
    <input type="text" class="form-control" id="label" name="label" value="{{ old('label', $data->label) }}">
</div>


<div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ old('description', $data->description) }}</textarea>
    </div>


<div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" id="active" name="active" value="1" {{ old('active', $data->active == 1 ? 'checked' : '') }}>
    <label class="form-check-label" for="active">Active</label>
</div>
<br>
<hr>
<button type="submit" class="btn btn-primary">{{ $submitButtonText ?? 'Save' }}</button>
