@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header">Create Member Type <a href="{{ route("member_type.index") }}" class="btn btn-primary btn-sm float-right">View All</a></div>

                <div class="card-body">
                    <form action="{{ route('member_type.store') }}" method="POST">
                        {{csrf_field()}}

                        @include('dashbord.memtype._form')

                        
                    </form>
                </div>
            </div>

@endsection
