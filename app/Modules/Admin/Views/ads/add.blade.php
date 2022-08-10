@extends('Admin::base')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('main')

    <div class="page-content">
        <div class="container-fluid">
            @include('Admin::parts.title__table')

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Tiêu đề</label>
                                    <input type="text" class="form-control" name="title" required=""
                                        placeholder="Title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Mô tả</label>
                                    <textarea id="elm1" name="description" placeholder="Description"></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Hình ảnh</label>
                                    <input class="form-control" type="file" name="upload" accept="image/*">
                                    @error('upload')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Loại màn hình</label><br>
                                            <input type="checkbox" id="switch1" name="type" switch="none" />
                                            <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Trạng thái</label><br>
                                            <input type="checkbox" id="switch2" name="status" switch="none" />
                                            <label for="switch2" data-on-label="On" data-off-label="Off"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-0">
                                    <div class="ml-10">
                                        <button type="reset" class="btn btn-warning waves-effect ms-1" style="margin-right: 20px;">
                                            Hủy bỏ
                                        </button>
                                        <button type="submit" class="btn btn-danger waves-effect waves-danger">
                                            Gửi đi
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
        </div>
    </div>

@section('footer')
    @parent
@endsection
@endsection

@section('right__bar')
@parent
@endsection

@section('javascripts')
@parent
@endsection
@push('scripts')
<!--tinymce js-->
<script src="{{ asset('public/assets/libs/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('public/assets/js/pages/form-editor.init.js') }}"></script>
@endpush
