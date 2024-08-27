@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Create Products</h5>
                    <a href="{{route('home')}}" class="btn btn-primary">Back</a>
                </div>

                <div class="card-body">
                    <form action="{{route('pro.store')}}" method="post">
                        @csrf
                        <div class="col-md-8 form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="title">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-8 form-group mt-3">
                            <label for="description">Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"" id="
                                description" name="description">
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection