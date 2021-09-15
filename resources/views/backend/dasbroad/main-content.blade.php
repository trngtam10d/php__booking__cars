@extends('backend.dasbroad.index')
@section('main-content')
<div class="page-content">
    <div class="container-fluid">

        @include('backend.partials.page-title')

        <div class="row">
            <div class="col-sm-6 col-xl-3">
                <div class="card card-content">
                    <div class="card-body row justify-content-center">
                        @php
                        $countCar=DB::table('cars')->count();
                        @endphp
                        <div class="col-5 align-self-center">
                            <h4 class="mb-2 font-size-20">{{$countCar}}<h4>
                                    <p class="mb-2 text-muted font-size-13 text-nowrap">All Cars</p>
                                    <span class="badge bg-soft-success text-success mt-1 shadow-none"><i
                                            class="mdi mdi-menu-up font-size-16"></i>20.15%</span>
                        </div>
                        <div class="col-7 align-self-center">
                           
                            <!-- 0,1,1,2,3,6,3,5,3,3,4,2 -->
                            <span class="peity-line" data-width="100%"
                                data-peity='{ "fill": ["#b5f1e0"],"stroke": ["#0acf97"]}'
                                data-height="80">
                                @if($countCar >= 0 || $countCar <= 3)
                                    0,1,1,1,2
                                @elseif($countCar >= 9 || $countCar <= 19)
                                    0,1,1,2,3,6,3
                                @elseif($countCar >= 9 || $countCar <= 19)
                                    0,1,1,2,3,6,3,5,3,3,4,2
                                @endif
                            
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
            <div class="col-sm-6 col-xl-3">
                <div class="card card-content">
                    <div class="card-body row justify-content-center">
                        <div class="col-5 align-self-center">
                            @php
                            $countUser=DB::table('users')->count();
                            @endphp
                            <h4 class="mb-2 font-size-20">{{$countUser}}</h4>
                            <p class="mb-2 text-muted font-size-13 text-nowrap">New Users</p>
                            <span class="badge bg-soft-danger text-danger mt-1 shadow-none"><i
                                    class="mdi mdi-menu-down font-size-16"></i>7.15%</span>
                        </div>
                        <div class="col-7 align-self-center text-end">
                            <span class="peity-line" data-width="100%"
                                data-peity='{ "fill": ["#d6d8f5"],"stroke": ["#777edd"]}'
                                data-height="80">0,3,6,3,4,2,6,1,8,4,4,2</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
            <div class="col-sm-6 col-xl-3">
                <div class="card card-content">
                    <div class="card-body row justify-content-center">
                        <div class="col-5 align-self-center">
                            @php
                                $count=DB::table('bookings')->count();
                            @endphp
                            <h4 class="mb-2 font-size-20">{{$count}}</h4>
                            <p class="mb-2 text-muted font-size-13 text-nowrap">New Orders</p>
                            <span class="badge bg-soft-danger text-danger mt-1 shadow-none"><i
                                    class="mdi mdi-menu-down font-size-16"></i>6.05%</span>
                        </div>
                        <div class="col-7 align-self-center">
                            <span class="peity-line" data-width="100%"
                                data-peity='{ "fill": ["#fdebb5"],"stroke": ["#f9bc0b"]}'
                                data-height="80">2,4,7,3,5,3,6,3,4,3,2,1,2</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
            <div class="col-sm-6 col-xl-3">
                <div class="card card-content">
                    <div class="card-body row justify-content-center">
                        <div class="col-5 align-self-center">
                            @php
                                $countRender = DB::table('reders')->count();
                            @endphp
                            <h4 class="mb-2 font-size-20">{{$countRender}}</h4>
                            <p class="mb-2 text-muted font-size-13 text-nowrap">New Renders</p>
                            <span class="badge bg-soft-success text-success mt-1 shadow-none"><i
                                    class="mdi mdi-menu-up font-size-16"></i>8.97%</span>
                        </div>
                        <div class="col-7 align-self-center">
                            <span class="peity-bar" data-peity='{ "fill": ["#ffd1e1", "#ffd1e1"]}' data-width="100%"
                                data-height="80">5,6,2,8,9,4,7,10,11,12,10,4,7,10</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Overview</h5>
                        <div class="row">
                            <div class="col-lg-9 border-right">
                                <div class="card shadow-none mb-0 ">
                                    <div class="card-body">
                                        <div id="morris-line-chart" class="morris-charts overview-chart" dir="ltr">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-3">
                                <div class="card mb-0 overview shadow-none">
                                    <div class="card-body border-bottom">
                                        <div class="">
                                            <div class="row align-items-center">
                                                <div class="col-4">
                                                    <div class="overview-content">
                                                        <i class="mdi mdi-share-variant  text-success"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 text-end">
                                                    <p class="text-muted font-size-13 mb-1">Shares</p>
                                                    <h4 class="mb-0 font-size-20">7,503</h4>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                    <div class="card-body border-bottom">
                                        <div class="">
                                            <div class="row  align-items-center">
                                                <div class="col-4">
                                                    <div class="overview-content">
                                                        <i class="mdi mdi-gesture-double-tap  text-purple"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 text-end">
                                                    <p class="text-muted font-size-13 mb-1">Clicks</p>
                                                    <h4 class="mb-0 font-size-20">3,503</h4>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                    <div class="card-body border-bottom">
                                        <div class="">
                                            <div class="row align-items-center">
                                                <div class="col-4">
                                                    <div class="overview-content">
                                                        <i class="mdi mdi-earth text-warning"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 text-end">
                                                    <p class="text-muted font-size-13 mb-1">Countries</p>
                                                    <h4 class="mb-0 font-size-20">51</h4>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="">
                                            <div class="row  align-items-center">
                                                <div class="col-4">
                                                    <div class="overview-content">
                                                        <i class="mdi mdi-access-point text-pink"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 text-end">
                                                    <p class="text-muted font-size-13 mb-1">Virality</p>
                                                    <h4 class="mb-0 font-size-20">4.55%</h4>
                                                </div>
                                                <div class="col-12">
                                                    <div class="progress mt-4" style="height:6px;">
                                                        <div class="progress-bar progress-animated bg-pink"
                                                            role="progressbar"
                                                            style="max-width: 85%; border-radius:5px;"
                                                            aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
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
        <!--end row-->

        <div class="row">
            <div class="col-lg-6 col-xl-3">
                <div class="card">
                    <div class="card-body donut">
                        <h5>Summary</h5>
                        <div id="animating-donut" class="ct-chart ct-golden-section mb-3 summary-chart"
                            style="height: 235px;"></div>
                        <ul class="list-unstyled list-inline text-center">
                            <li class="list-inline-item mt-2">
                                <span class="text-muted font-size-13"><i
                                        class="mdi mdi-checkbox-blank-circle me-2 text-info"></i>In-Store
                                </span>
                            </li>
                            <li class="list-inline-item mt-2">
                                <span class="text-muted font-size-13"><i
                                        class="mdi mdi-checkbox-blank-circle me-2 text-danger"></i>Download</span>
                            </li>
                            <li class="list-inline-item mt-2">
                                <span class="text-muted font-size-13"><i
                                        class="mdi mdi-checkbox-blank-circle me-2 text-success"></i>Mail-Order</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5>By Countries</h5>
                        <div class="row">
                            <div class="col-md-12 col-lg-8">
                                <div id="world-map-markers" class="dashboard-map" style="height: 295px;">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4 align-self-center">
                                <p class="text-muted font-size-13 mb-1"><i
                                        class="mdi mdi-checkbox-blank-circle me-2 text-success"></i>India
                                    <span class="float-end">35%</span>
                                </p>
                                <div class="progress mb-4" style="height:3px;">
                                    <div class="progress-bar progress-animated bg-success" role="progressbar"
                                        style="max-width: 35%; border-radius: 50px;" aria-valuenow="55"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <p class="text-muted font-size-13 mb-1"><i
                                        class="mdi mdi-checkbox-blank-circle me-2 text-success"></i>USA
                                    <span class="float-end">58%</span>
                                </p>
                                <div class="progress mb-4" style="height:3px;">
                                    <div class="progress-bar progress-animated bg-success" role="progressbar"
                                        style="max-width: 58%; border-radius: 50px;" aria-valuenow="58"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <p class="text-muted font-size-13 mb-1"><i
                                        class="mdi mdi-checkbox-blank-circle me-2 text-danger"></i>Russia
                                    <span class="float-end">85%</span>
                                </p>
                                <div class="progress mb-4" style="height:3px;">
                                    <div class="progress-bar progress-animated bg-danger" role="progressbar"
                                        style="max-width: 85%; border-radius: 50px;" aria-valuenow="85"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <p class="text-muted font-size-13 mb-1"><i
                                        class="mdi mdi-checkbox-blank-circle me-2 text-success"></i>Australia
                                    <span class="float-end">71%</span>
                                </p>
                                <div class="progress mb-0" style="height:3px;">
                                    <div class="progress-bar progress-animated bg-success" role="progressbar"
                                        style="max-width: 71%; border-radius: 50px;" aria-valuenow="71"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end col -->
            <div class="col-xl-3">
                <div class="card bg-primary text-white income">
                    <div class="card-body">
                        <h5 class="text-white">This Month Income</h5>
                        @php 
                            $check = false;
                            $bookings = DB::table('bookings')->where('status' , 'active')->sum('total_amount');
                            $countb = DB::table('bookings')->where('status' , 'active')->count();
                         
                           
                            $total = $bookings * $countb;
                          
                        @endphp
                        <div class="">
                           
                          
                            <h1 class="my-4 text-white"><i class="mdi mdi-wallet me-3"></i><?= number_format($total, 0, ',', '.') . " VND"; ?></h1>
                            <!-- <span class="float-end">Last Month : $6500.50</span> -->
                           
                            <a href="#" class="text-white my-4">Read More<i class="mdi mdi-arrow-right ms-2"></i></a>
                            <div class="mt-4">
                                <span class="peity-bar" data-peity='{ "fill": ["#9dcee8", "#9dcee8"]}' data-width="100%"
                                    data-height="162">1,2,3,4,3,6,3,5,3,8,4,2,6,3,5,3,8,4,2,5,2,3,4,3,6</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!--end row-->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Car Lists</h5>
                        <p class="card-title-desc">
                            <a href="{{route('main-content.create')}}" class="btn btn-primary btn-sm float-right"
                                data-toggle="tooltip" data-placement="bottom" title="Add User"><i
                                    class="fas fa-plus"></i> Add
                                Car</a>
                        </p>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Car Name</th>
                                        <th>Photo</th>
                                        <th>Seat</th>
                                        <th>Discount</th>
                                        <th>Color</th>
                                        <th>Price</th>
                                        <th>Render Name</th>
                                        <th>Category</th>
                                        <th>Location</th>
                                        <th>Status</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if(isset($cars))
                                    @foreach($cars as $car)
                                    <tr>
                                        <td>{{$car->id}}</td>
                                        <td>{{$car->name}}</td>
                                        <td>
                                            <div class="min-carousel" >
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card" style="width:200px;">
                                                            <div class="card-body">
                                                                <div id="carouselExampleIndicators<?=$car->id?>"
                                                                    class="carousel slide" data-bs-ride="carousel">
                                                                    <?php $photo_split = explode("/", $car->photo); ?>
                                                                    <ol class="carousel-indicators">
                                                                        @for($i=0; $i < count($photo_split)-1 ; $i++)
                                                                            <li
                                                                            data-bs-target="#carouselExampleIndicators<?= $car->id?>"
                                                                            data-bs-slide-to="<?php echo $i;?>"
                                                                            class="<?php if($i==0){echo"active";}?>">
                                                                            </li>
                                                                            @endfor
                                                                    </ol>

                                                                    <div class="carousel-inner" role="listbox">
                                                                        @for($i=0; $i < count($photo_split)-1 ; $i++)
                                                                            <div
                                                                            class="carousel-item <?php if($i==0){echo"active";}?>">
                                                                            <img class="d-block img-fluid"
                                                                                src="{{asset('backend/uploads/images/cars')}}/<?php echo $photo_split[$i];?>"
                                                                                alt="First slide">
                                                                    </div>
                                                                    @endfor
                                                                </div>

                                                                <a class="carousel-control-prev"
                                                                    href="#carouselExampleIndicators<?= $car->id?>"
                                                                    role="button" data-bs-slide="prev">
                                                                    <span class="carousel-control-prev-icon"
                                                                        aria-hidden="true"></span>
                                                                    <span class="visually-hidden">Previous</span>
                                                                </a>
                                                                <a class="carousel-control-next"
                                                                    href="#carouselExampleIndicators<?= $car->id?>"
                                                                    role="button" data-bs-slide="next">
                                                                    <span class="carousel-control-next-icon"
                                                                        aria-hidden="true"></span>
                                                                    <span class="visually-hidden">Next</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                        </div>

                        </td>
                        <td>{{$car->seat}}</td>
                        <td>{{$car->discount}}%</td>
                        <td>{{$car->color}}</td>
                        <td>{{$car->price}}</td>
                        <td>
                            @if(isset($car->user->name))
                            {{$car->user->name}}
                            @endif
                        </td>
                        <td>
                            @if(isset($car->catagory->cate_name))
                            {{$car->catagory->cate_name}}
                            @endif
                        </td>
                        <td>
                            @if(isset($car->render->manu_name))
                            {{$car->render->manu_name}}
                            @endif
                        </td>
                        <td>
                            @if($car->status=='active')
                            <span class="badge bg-success">{{$car->status}}</span>
                            @else
                            <span class="badge bg-warning">{{$car->status}}</span>
                            @endif
                        </td>


                        <td>
                            <a href="{{route('main-content.edit',$car->id)}}" class="btn btn-primary btn-sm "
                                style="height:30px; width:30px;border-radius:50%;float:left;margin-right:10px"
                                data-toggle="tooltip" title="edit" data-placement="bottom"><i
                                    class="fas fa-edit"></i></a>

                        </td>
                        <td>
                            <form method="POST" action="{{route('main-content.destroy',[$car->id])}}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm nutXoaDayNe" data-id={{$car->id}}
                                    style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                                    data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                        </tr>
                        @endforeach
                        @endif
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>

@endsection