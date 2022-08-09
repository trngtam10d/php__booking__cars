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

                            <h5 class="card-title">List of Ads</h5>
                            <p class="card-title-desc">
                                <a href="{{ route('ads.add') }}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip"
                                    data-placement="bottom" title="More Cover">
                                    <i class="fas fa-plus"></i>
                                    More Ads Cover
                                </a>
                            </p>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Act</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ads as $cover)
                                            <tr>
                                                <td>{{ $cover->id }}</td>
                                                <td>{{ $cover->title }}</td>
                                                <td>{!! $cover->description !!}</td>
                                                <td>
                                                    <div class="img-banner"><img src="{{ $cover->photo }}"></div>
                                                </td>
                                                <td>
                                                    @if ($cover->type == 1)
                                                        <span class="badge bg-success">Mobile</span>
                                                    @else
                                                        <span class="badge bg-warning">Website</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($cover->status == 'on')
                                                        <span class="badge bg-success">{{ $cover->status }}</span>
                                                    @else
                                                        <span class="badge bg-warning">{{ $cover->status }}</span>
                                                    @endif
                                                </td>
                                                <td class="html__act--display">
                                                    <a href="" class="btn btn-primary btn-sm "data-toggle="tooltip"
                                                        title="edit" data-placement="bottom">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form method="POST" action="">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm btnDelete"
                                                            data-id={{ $cover->id }} data-toggle="tooltip"
                                                            data-placement="bottom" title="Delete">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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

