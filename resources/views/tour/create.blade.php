@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Visit Your Favourite Country!</h5>
                    <a href="{{route('home')}}" class="btn btn-primary">Back</a>
                </div>

                <div class="card-body">
                    <form action="{{route('tour.store')}}" method="post">
                        @csrf
                        <div class="col-md-8 form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-8 form-group">
                            <label for="visit">Choose Your Visa_Category:</label>
                            <select class="form-control" id="visit" name="visa_category">
                                <option value="tourist">Tourist</option>
                                <option value="visit">Visit</option>
                                <option value="permanent">Permanent</option>
                            </select>
                        </div>
                        <div class="col-md-8 form-group">
                            <label for="name">Country</label>
                            <input type="text" class="form-control @error('country') is-invalid @enderror" id="name" name="country">
                            @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-8 form-group">
                            <label for="name">Costing</label>
                            <input type="text" class="form-control  @error('costing') is-invalid @enderror" id="name" name="costing">
                            @error('costing')
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