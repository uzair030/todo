@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Create Todos</h5>
                    <a href="{{route('home')}}" class="btn btn-primary">Back</a>
                </div>

                <div class="card-body">
                    <form action="{{route('pet.update',$pet->id)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="col-md-8 form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" value="{{$pet->title}}" id="name" name="title">
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection