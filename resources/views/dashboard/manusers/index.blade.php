@extends('layouts.main')


@section('content')

            <div class="card">
            <div class="card-header">Manage Users<a href="{{ route("users.create") }}" class="float-right btn btn-primary btn-sm">Add</a></div>

                <div class="card-body">
                    
                     <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th width="250px">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->email }}</td>   
                                    <td>{{ $d->created_at }}</td>                                                                   

                                    <td>
                                        <form action="{{ route('users.edit', $d->id) }}"><input type="submit" value="Edit"/></form>
                                        
                                        <form action="{{ route('users.destroy', $d->id) }}" method="POST">
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}
                                            <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')" value="Delete"/>
                                        </form>
                                    </td>


                                </tr>    
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

@endsection
