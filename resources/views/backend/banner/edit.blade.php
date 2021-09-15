@extends('backend.dasbroad.index')
@section('main-content')
<style>
.img-update {
    margin-top: 20px;
    width: 500px;
    height: 300px;

    background-size: cover !important;
    background-position: center center !important;
}
</style>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Banners List</h4>

                 

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                     
                        <form class="form-horizontal" action="{{route('banner.update',$banner->id)}}" method="POST"
                            enctype="multipart/form-data">
                            {{csrf_field()}}
                            @method('PATCH')
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="{{$banner->title}}"
                                    required="" placeholder="Title">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>

                                <textarea id="elm1" name="description"
                                    placeholder="Description">{{$banner->description}}</textarea>
                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Photo</label>
                                <input class="form-control" type="file" name="upload" accept="image/*">

                                <div class="img-update"
                                    style="width: 90%;height: 200px;background: url({{asset('backend/uploads/images/banners')}}/{{$banner->photo}})"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label><br>
                                @if($countActive == 0 || $banner->status == "on")
                                <input type="checkbox" id="switch1" name="status" switch="none" <?php if ($banner->status == "on") {
                                                                                                    echo "checked";
                                                                                                } ?> />
                                <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                                @else
                                <input type="checkbox" id="switch1" name="status" switch="none" disabled />
                                <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                                @endif
                                @error('status')
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

<!--tinymce js-->
<script src="{{asset('backend/assets/libs/tinymce/tinymce.min.js')}}"></script>

<script src="{{asset('backend/assets/js/pages/form-editor.init.js')}}"></script>
@endpush