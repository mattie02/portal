@extends('layouts.main')

@section('content')

            <div class="card">
                <div class="card-header">Create Key <a href="{{ route("door_keys.index") }}" class="btn btn-primary btn-sm float-right">View All</a></div>

                <div class="card-body">
                    <form action="{{ route('door_keys.store') }}" method="POST">
                        {{csrf_field()}}

                        @include('dashboard.keys._form')

                        
                    </form>
                </div>
            </div>

@endsection
