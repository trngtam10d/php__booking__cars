@extends('backend.dasbroad.index')
@section('main-content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Location List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Amezia</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Form Validation</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <!-- <h5 class="card-title">Validation type</h5>
                        <p class="card-title-desc">Parsley is a javascript form validation
                            library. It helps you provide your users with feedback on their form
                            submission before sending it to your server.</p> -->

                        <form class="custom-validation" action="{{route('review.update',$reviews->id)}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <input class="form-control" type="text" id="subject2" name="review" placeholder="Subject" value="{{$reviews->review}}">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="mb-3">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"
                                    placeholder="Your message" name="reply">{{$reviews->reply}}</textarea>
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
<script src="{{asset('backend/assets/libs/dropzone/min/dropzone.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/dropify/js/dropify.min.js')}}"></script>

<script src="{{asset('backend/assets/js/pages/form-fileuploads.init.js')}}"></script>
<script src="{{asset('backend/assets/js/app.js')}}"></script>
@endpush