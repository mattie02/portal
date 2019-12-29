<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $data->name) }}">
</div>


<div class="form-group">
    <label for="email">email</label>
    <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $data->email) }}">
</div>
    
<div class="form-group">
        <label for="password">password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>


<br>
<hr>
<button type="submit" class="btn btn-primary">{{ $submitButtonText ?? 'Save' }}</button>
