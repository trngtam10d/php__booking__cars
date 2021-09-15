@extends('backend.dasbroad.index')
@section('main-content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Location List</h4>

                 

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                    
                        <form class="custom-validation" action="{{route('location.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label">Location Name</label>
                                <input type="text" class="form-control" name="locat_name" required="" placeholder="Enter location name">
                                @error('locat_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                           
                            <div class="form-group">
                                <label for="inputPhoto" class="col-form-label">Photo</label>
                                <div class="input-group">
                                <input id="thumbnail" class="form-control" type="file" name="upload"  accept="image/*">
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                @error('photo')
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
@push('scripts') 
<script src="{{asset('backend/backend/assets/libs/dropzone/min/dropzone.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/dropify/js/dropify.min.js')}}"></script>

<script src="{{asset('backend/assets/js/pages/form-fileuploads.init.js')}}"></script>



@endpush