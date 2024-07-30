@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                <h5>Product List</h5>
                    <a href="{{route('pro.create')}}" class="btn btn-outline-secondary">Add Product</a>
                    
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
                                <th scope="col">Description</th>
                                <th scope="col">Created </th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $pro)
                            <tr>
                                <th scope="row">{{$pro->id}}</th>
                                <td>{{$pro->title}}</td>
                                <td>{{$pro->description}}</td>
                                <td>{{$pro->created_at }}</td>
                                <td>
                                    <div>
                                    <a href="{{route('pro.edit', $pro->id)}}" class="btn btn-primary btn-sm" >Edit </a>
                                    <a href="{{route('pro.delete', $pro->id)}}" class="btn btn-secondary btn-sm">Delete</a>
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
</div>
@endsection