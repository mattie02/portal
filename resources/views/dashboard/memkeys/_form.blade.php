<div class="form-group">
    <label for="label">Member</label><br>

    <select id="member_id" name="member_id">   
        <option value=0 {{ $data->member_id == NULL ? 'selected' : '' }}></option>     
        @foreach($members as $member)
            <option value="{{ $member->id }}" {{ ($member->id === $data->member_id) && !NULL ? 'selected' : '' }}>{{ $member->fname }}, {{ $member->lname }}</option>
        @endforeach
    </select>

</div>


<div class="form-group">
        <label for="description">Key</label><br>

        <select id="key_id" name="key_id">   
            <option value=0 {{ $data->key_id == NULL ? 'selected' : '' }}></option>     
            @foreach($keys as $key)
                <option value="{{ $key->id }}" {{ ($key->id === $data->key_id) && !NULL ? 'selected' : '' }}>{{ $key->key }}</option>
            @endforeach
        </select>

    </div>


    
<br>
<hr>
<button type="submit" class="btn btn-primary">{{ $submitButtonText ?? 'Save' }}</button>
