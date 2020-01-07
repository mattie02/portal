@extends('layouts.main')

@section('content')

            <div class="card">
                <div class="card-header">
                    Edit Member Type
                    <div class="btn-group float-right" role="group" aria-label="Basic example">
                        <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">View All</a>
                        <a href="{{ route('users.create') }}" class="btn btn-success btn-sm">Add New</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('users.update', $data->id) }}" method="POST">

                        {{csrf_field()}}
                        {{method_field('PUT')}}

                        @include('dashboard.manusers._form', [
                                    'submitButtonText' => 'Save'
                                ])
                                
                <div class="card">
                    <div class="card-header">Notes</div>
        
                    <div class="card-body">

                        @if($notes->count() > 0)
                        @foreach($notes as $note)

                        {{ $note->body }} 
                        <br>
                        {{ $note->created_at }} By: {{ $note->user->name }}
                        <hr>

                        @endforeach
                        
                        @endif
                                
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">New Note</div>

                    <div class="card-body">
                        <form action="{{ route('notes.store') }}" method="POST">
                            {{csrf_field()}}

                            @include('dashboard.members._form_notes')

                                
                        </form>
                    </div>
                </div>                        
                        
                    </form>
                </div>
            </div>

@endsection