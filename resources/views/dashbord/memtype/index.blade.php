@extends('layouts.app')


@section('content')

            <div class="card">
            <div class="card-header">Member Types <a href="{{ route("member_type.create") }}" class="float-right btn btn-primary btn-sm">Add</a></div>

                <div class="card-body">
                    
                     <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>Label</th>
                                <th>Active</th>
                                <th width="150px">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->label }}</td>
                                    <td>{{ $d->active == 1 ? 'Active' : 'Not Active' }}</td>
                                <td><a href="{{ route('member_type.edit', $d->id) }}">Edit</a> | <a href="{{ route('member_type.destroy', $d->id) }}">Delete</a></td>
                                </tr>    
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

@endsection
