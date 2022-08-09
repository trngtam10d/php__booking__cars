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
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Tổng quát</h5>
                            <div class="row">
                                <div class="col-lg-12 border-right">
                                    <div class="card shadow-none mb-0">
                                        <div class="border-top">
                                            <div class="card-body border-bottom">
                                                <div class="">
                                                    <div class="row align-items-center">
                                                        <div class="col-4">
                                                            <div class="overview-content">
                                                                <div class="title-name">
                                                                    <p class="text-muted font-size-13 mb-1">Đang online</p>
                                                                    <p class="text-muted font-size-13 mb-1">Đang online</p>
                                                                    <p class="text-muted font-size-13 mb-1">Đang online</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-8 text-end">
                                                            <p class="text-muted font-size-13 mb-1">Đang online</p>
                                                            <h4 class="mb-0 font-size-20"></h4>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
