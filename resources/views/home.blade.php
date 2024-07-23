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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection