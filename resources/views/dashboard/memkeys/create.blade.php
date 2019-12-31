@extends('layouts.main')

@section('content')

            <div class="card">
                <div class="card-header">Create Member Type <a href="{{ route("member_keys.index") }}" class="btn btn-primary btn-sm float-right">View All</a></div>

                <div class="card-body">
                    <form action="{{ route('member_keys.store') }}" method="POST">
                        {{csrf_field()}}

                        @include('dashboard.memkeys._form')

                        
                    </form>
                </div>
            </div>

@endsection
