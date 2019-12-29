@extends('layouts.main')

@section('content')

            <div class="card">
                <div class="card-header">Create Member Type <a href="{{ route("users.index") }}" class="btn btn-primary btn-sm float-right">View All</a></div>

                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        {{csrf_field()}}

                        @include('dashboard.manusers._form')

                        
                    </form>
                </div>
            </div>

@endsection
