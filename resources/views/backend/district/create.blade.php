@extends('backend.dasbroad.index')
@section('main-content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">District List</h4>


                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12 col-xl-6">
                <div class="card">
                    <div class="card-body">


                        <form class="custom-validation" action="{{route('district.store')}}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">City Address</label>
                                <input type="text" class="form-control" name="city_address" required=""
                                    placeholder="Address">
                                @error('city_address')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Location</label>
                                <select class="select2 form-control mb-3 custom-select" name="location"
                                    style="width: 100%; height:36px;">
                                    <option>Select</option>
                                    @foreach($locations as $location)
                                    <option value="{{$location->id}}">{{$location->locat_name}}</option>
                                    @endforeach
                                </select>
                                @error('render')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Car</label>
                                <select class="select2 form-control mb-3 custom-select" name="car"
                                    style="width: 100%; height:36px;">
                                    <option>Select</option>
                                    @foreach($cars as $car)
                                    <option value="{{$car->id}}">{{$car->name}}</option>
                                    @endforeach
                                </select>
                                @error('car')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-0">
                                <div>
                                    <button type="reset" class="btn btn-danger waves-effect ms-1">
                                        Cancel
                                    </button>
                                    <button type="submit" class="btn btn-light waves-effect waves-light">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- end form -->
                    </div>
                    <!-- end cardbody -->
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>
@endsection
@push('script')

@endpush