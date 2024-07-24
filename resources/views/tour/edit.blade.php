@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Country</h5>
                    <a href="{{route('home')}}" class="btn btn-primary">Back</a>
                </div>

                <div class="card-body">
                    <form action="{{route('tour.update',$tour->id)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="col-md-8 form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" value="{{$tour->name}}" id="name" name="name">
                        </div>
                        <label for="visit">Choose Your Visa_Category:</label>
                        <select class="form-control" id="visit" name="visa_category">
                            <option value="tourist" {{$tour->visa_category == 'tourist' ? 'selected' : '' }}>Tourist</option>
                            <option value="visit" {{$tour->visa_category == 'visit' ? 'selected' : '' }}>Visit</option>
                            <option value="permanent" {{$tour->visa_category == 'permanent' ? 'selected' : '' }}>Permanent</option>
                        </select>
                        <div class="col-md-8 form-group">
                            <label for="name">Country</label>
                            <input type="text" class="form-control" value="{{$tour->country}}" id="name" name="country">
                        </div>
                        <div class="col-md-8 form-group">
                            <label for="name">Costing</label>
                            <input type="text" class="form-control" value="{{$tour->costing}}" id="name" name="costing">
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection