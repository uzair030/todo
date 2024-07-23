@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Todos List</h5>
                    <a href="{{route('todo.create')}}" class="btn btn-primary">Add</a>

                </div>

                <div class="card-body">
                    @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong></strong> {{Session::get('success')}}!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>  
                    @endif

                    @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong></strong> {{Session::get('error')}}!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <table class="table table-sm table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Created </th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($todos as $todo)
                            <tr>
                                <th scope="row">{{$todo->id}}</th>
                                <td>{{$todo->name}}</td>
                                <td>{{$todo->created_at }}</td>
                                <td>
                                    <div>
                                        <a href="{{route('todo.edit',$todo->id)}}" class="btn btn-primary btn-sm">Edit </a>
                                        <a href="{{route('todo.delete',$todo->id)}}"
                                            class="btn btn-secondary btn-sm">Delete</a>
                                    </div>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection