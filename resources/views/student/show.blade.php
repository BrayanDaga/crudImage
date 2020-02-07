@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <div class="jumbotron text-center">
                        <div align="right">
                            <a href="/student" class="btn btn-primary">Back</a>
                        </div>

                            <img class="img-thumbnail" src="{{ URL::to('/') }}/images/{{ $student->image }}" alt="{{$student->image }}">
                            <h3>First Name - {{ $student->first_name }} </h3>
                            <h3>Last Name - {{ $student->last_name }} </h3>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
