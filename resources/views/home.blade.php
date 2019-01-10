@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $today }} (day 3 of 14)</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        <li><a href="question">Questions of the day</a></li>
                        <li>Exercises</li>
                        <li>Check you progress </li>
                        <li>Ask for help</li>
                        <li>Go to your personal tasks</li>
                    </ul>

                </div>
                <div class="card-footer">Go back 1 day</div>
            </div>
        </div>
    </div>
</div>
@endsection
