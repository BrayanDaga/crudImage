@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        
                    @endif

                    You are logged in!

                    <div align="right">
                        <a href="/student/create" class="btn btn-success btn-lg">Add</a>
                    </div>

                    <div>
                        <p> Pagina {{ $data->currentPage() }} - de {{ $data->lastPage() }} </p>
                    </div>

                    <br>
                    
                    @if ( session('success') )
                    <div class="alert alert-success">
                        <p> {{ session('success') }} </p>
                    </div>                 
                    @endif


                    <table class="table table-striped table-bordered">
                        <thead>
                            <th width="10%"></th>
                            <th width="35%">First Name</th>
                            <th width="35%">Last Name </th>
                            <th width="30%">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                
                            <td> <img src="{{ URL::to('/') }}/images/{{ $item->image }}" alt="{{$item->image }} " class="img-thumbnail" width="90"> </td>
                                <td> {{ $item->first_name }} </td>
                                <td> {{ $item->last_name }} </td>
                                <td> 
                                <a href="{{ route('student.show',$item)}}" class="btn btn-primary btn-sm">Show</a>
                                
                                <a href="{{ route('student.edit',$item)}}" class="btn btn-warning btn-sm">Edit</a>

                                <form action=" {{ route('student.delete',$item) }}" class="d-inline" method="post">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                </form>
                                </td>
                            </tr
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
