
<div class="form-group">
    <label for="notes">Notes</label>
    <input type="textarea" class="form-control" id="body" name="body">
</div>

<input type='hidden' name='member_id' value={{ $data->id }}>




<button type="submit" class="btn btn-primary">{{ $submitButtonText ?? 'Save' }}</button>
