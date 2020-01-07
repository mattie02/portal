<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $data->name) }}">
</div>


<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $data->email) }}">
</div>
    
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
</div>

<div class="form-group">
    <label for="password_confirmation">Re-Enter password</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
</div>


<br>
<hr>
<button type="submit" class="btn btn-primary">{{ $submitButtonText ?? 'Save' }}</button>