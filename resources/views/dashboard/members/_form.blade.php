<div class="form-group">
    <label for="fname">First Name</label>
    <input type="text" class="form-control" id="fname" name="fname" value="{{ old('name', $data->fname) }}">
</div>

<div class="form-group">
    <label for="lname">Last Name</label>
    <input type="text" class="form-control" id="lname" name="lname" value="{{ old('name', $data->lname) }}">
</div>
<div class="form-group">
    <label for="dob">Date Of Birth
    <input type="date" id="dob" name="dob"
        value="{{ old('dob', $data->dob) }}">
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $data->email) }}">
</div>

<div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" id="email_private" name="email_private" value="1" {{ old('email_private', $data->email_private == 1 ? 'checked' : '') }}>
    <label class="form-check-label" for="email_private">Email Private?</label>
</div>

<br>
<hr>

<div class="form-group">
    <label for="phone_mobile">Phone (Mobile)</label>
    <input type="text" class="form-control" id="phone_mobile" name="phone_mobile" value="{{ old('phone_mobile', $data->phone_mobile) }}">
</div>

<div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" id="phone_mobile_private" name="phone_mobile_private" value="1" {{ old('phone_mobile_private', $data->phone_mobile_private == 1 ? 'checked' : '') }}>
    <label class="form-check-label" for="phone_mobile_private">Phone (Mobile) Private?</label>
</div>

<br>
<hr>

<div class="form-group">
    <label for="phone_alt">Phone (Alt)</label>
    <input type="text" class="form-control" id="phone_alt" name="phone_alt" value="{{ old('phone_alt', $data->phone_alt) }}">
</div>

<div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" id="phone_alt_private" name="phone_alt_private" value="1" {{ old('phone_alt_private', $data->phone_alt_private == 1 ? 'checked' : '') }}>
    <label class="form-check-label" for="phone_alt_private">Phone (Alt) Private?</label>
</div>

<br>
<hr>

<div class="form-group">
    <label for="application_date">Application Date
    <input type="date" id="application_date" name="application_date"
        value="{{ old('application_date', $data->application_date) }}">
</div>

<div class="form-group">
    <label for="approval_date">Approval Date
    <input type="date" id="approval_date" name="approval_date"
        value="{{ old('approval_date', $data->approval_date) }}">
</div>

<div class="form-group">
    <label for="street_address">Street Address</label>
    <input type="text" class="form-control" id="street_address" name="street_address" value="{{ old('street_address', $data->street_address) }}">
</div>

<div class="form-group">
    <label for="city">City</label>
    <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $data->city) }}">
</div>

<div class="form-group">
    <label for="state">State</label>
    <input type="text" class="form-control" id="state" name="state" value="{{ old('state', $data->state) }}">
</div>

<div class="form-group">
    <label for="zip">Zip</label>
    <input type="text" class="form-control" id="zip" name="zip" value="{{ old('zip', $data->zip) }}">
</div>
 


<div class="form-group">
    <label for="mem_type_id">Member Type</label><br>
    <select id="mem_type_id" name="mem_type_id">        
        @foreach($memtypes as $memtype)
            <option value="{{ $memtype->id }}" {{ $memtype->id === $data->mem_type_id ? 'selected' : '' }}>{{ $memtype->label }}</option>
        @endforeach
    </select>

    {{-- <input type="text" class="form-control" id="mem_type_id" name="mem_type_id" value="{{ old('mem_type_id', $data->mem_type_id) }}"> --}}
</div>

<div class="form-group">
    <label for="mem_sponser_id">Member's Sponser</label><br>

    <select id="mem_sponser_id" name="mem_sponser_id">   
        <option value=0 {{ $data->mem_sponser_id == NULL ? 'selected' : '' }}></option>     
        @foreach($allmem as $sponser)
            <option value="{{ $sponser->id }}" {{ ($sponser->id === $data->mem_sponser_id) && !NULL ? 'selected' : '' }}>{{ $sponser->fname }}, {{ $sponser->lname }}</option>
        @endforeach
    </select>

    
    {{-- <input type="text" class="form-control" id="mem_sponser_id" name="mem_sponser_id" value="{{ old('mem_sponser_id', $data->mem_sponser_id) }}"> --}}
</div>

<div class="form-group">
    <label for="user_id">User ID</label>
    <input type="text" class="form-control" id="user_id" name="user_id" value="{{ old('user_id', $data->user_id) }}">
</div>

<button type="submit" class="btn btn-primary">{{ $submitButtonText ?? 'Save' }}</button>
