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

                            <h5 class="card-title">List of suppliers</h5>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Tên xe</th>
                                            <th>Tên xe</th>
                                            <th>Tên xe</th>
                                            <th>Tên xe</th>
                                            <th>Tên xe</th>
                                            <th>Trạng thái</th>
                                            <th>Cập nhập</th>
                                            <th>Xóa bỏ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <h2>Null</h2>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
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
