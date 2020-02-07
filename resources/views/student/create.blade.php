@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        
                    @endif

                    You are logged in!

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    
                    <div align="right">
                        <a href="/student/" class="btn-primary btn">Back</a>
                    </div>


                    <form action=" {{ route('student.store') }} " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="" class="col-mb-4 text-right">Enter First Name</label>
                            <div class="col-mb-8">
                                    <input type="text" name="first_name" class="form-control input-lg">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-mb-12 text-right">Enter Last Name</label>
                                    <input type="text" name="last_name" class="form-control input-lg">
                        </div>
                        <div class="form-group">
                            <label for="" class="col-mb-4 text-right">Select Profile Image</label>
                            <div class="col-mb-8">
                                    <input type="file" name="image">
                            </div>
                        </div>
                        <div class="form-group text-center">
                                    <input type="submit" name="add" class="btn btn-primary input-lg" value="Add">
                        </div>
                    </form>        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

