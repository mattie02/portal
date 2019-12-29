@extends('layouts.main')

@section('content')

            <div class="card">
                <div class="card-header">Create Member Type <a href="{{ route("members.index") }}" class="btn btn-primary btn-sm float-right">View All</a></div>

                <div class="card-body">
                    <form action="{{ route('members.store') }}" method="POST">
                        {{csrf_field()}}

                        @include('dashboard.members._form')

                        
                    </form>
                </div>
            </div>

@endsection
