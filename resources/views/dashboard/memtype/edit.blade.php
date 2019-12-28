@extends('layouts.main')

@section('content')

            <div class="card">
                <div class="card-header">
                    Edit Member Type
                    <div class="btn-group float-right" role="group" aria-label="Basic example">
                        <a href="{{ route('member_type.index') }}" class="btn btn-primary btn-sm">View All</a>
                        <a href="{{ route('member_type.create') }}" class="btn btn-success btn-sm">Add New</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('member_type.update', $data->id) }}" method="POST">

                        {{csrf_field()}}
                        {{method_field('PUT')}}

                        @include('dashboard.memtype._form', [
                                    'submitButtonText' => 'Save'
                                ])

                        
                        
                    </form>
                </div>
            </div>

@endsection