<div class="form-group">
    <label for="fname">First Name</label>
    <input type="text" class="form-control" id="fname" name="fname" value="{{ old('name', $data->fname) }}">
</div>

<div class="form-group">
    <label for="lname">Last Name</label>
    <input type="text" class="form-control" id="lname" name="lname" value="{{ old('name', $data->lname) }}">
</div>

<div class="form-group">
    <label for="email">email</label>
    <input type="date" class="form-control" id="email" name="email" value="{{ old('email', $data->email) }}">
</div>
    
<div class="form-group">
        <label for="password">password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>


<br>
<hr>
<button type="submit" class="btn btn-primary">{{ $submitButtonText ?? 'Save' }}</button>
