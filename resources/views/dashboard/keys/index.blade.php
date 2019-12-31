@extends('layouts.main')


@section('content')

            <div class="card">
            <div class="card-header">Keys<a href="{{ route("door_keys.create") }}" class="float-right btn btn-primary btn-sm">Add</a></div>

                <div class="card-body">
                    
                     <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>label</th>
                                <th>Key Number</th>
                                <th width="250px">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->label }}</td>
                                    <td>{{ $d->key }}</td>
                                    <td>{{ $d->active == 1 ? 'Active' : 'Not Active'  }}</td>
                                <td>
                                    <form action="{{ route('door_keys.edit', $d->id) }}"><input type="submit" value="Edit"/></form>
                                    
                                    <form action="{{ route('door_keys.destroy', $d->id) }}" method="POST">
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
