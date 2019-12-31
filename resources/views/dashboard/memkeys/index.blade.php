@extends('layouts.main')


@section('content')

            <div class="card">
            <div class="card-header">Member Key Pairs<a href="{{ route("member_keys.create") }}" class="float-right btn btn-primary btn-sm">Add</a></div>

                <div class="card-body">
                    
                     <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>Member</th>
                                <th>Key</th>
                                <th width="250px">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->member_id }}</td>
                                    <td>{{ $d->key_id }}</td>
                                <td>
                                    <form action="{{ route('member_keys.edit', $d->id) }}"><input type="submit" value="Edit"/></form>
                                    
                                    <form action="{{ route('member_keys.destroy', $d->id) }}" method="POST">
                                        {{method_field('DELETE')}}
                                        {{csrf_field()}}
                                        <input type="submit" class="btn btn-danger" value="Delete"/>
                                    </form>
                                </td>


                                </tr>    
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

@endsection
