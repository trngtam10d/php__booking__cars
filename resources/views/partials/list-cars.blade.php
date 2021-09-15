<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">What we offer</span>
                <h2 class="mb-2">Feeatured Vehicles</h2>
                <p>
                <h3><b>Self-driving car</b></h3>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-car owl-carousel">
                    @foreach($drivingCar as $driving)
                    @if(isset($driving))
                    @php
                    $photo=explode('/',$driving->photo);
                    @endphp
                    <div class="item">
                        <div class="car-wrap rounded ftco-animate">
                            <div class="img rounded d-flex align-items-end"
                                style="background-image: url('backend/uploads/images/cars/<?= $photo[0]?>');">
                            </div>
                            <div class="text">
                                <h2 class="mb-0"><a href="{{route('car.detail',$driving->id)}}">{{$driving->name}}</a>
                                </h2>
                                <div class="d-flex mb-3">
                                    <span class="cat">{{$driving->render->manu_name}}</span>
                                    <p class="price ml-auto"><?= number_format($driving->price, 0, ',', '.') . " VNĐ"; ?> <span>/day</span></p>
                                </div>
                                <!-- Tính tổng rate trung bình  -->
                                @php
                                $numberRate =DB::table('reviews')->where('car_id',$driving->id)->count();
                                $sumRating = DB::table('reviews')->where('car_id',$driving->id)->sum('rate');
                                $itemAge = 0;
                                if($numberRate!=0){
                                $itemAge = round($sumRating / $numberRate, 2);
                                }
                                @endphp
                            
                                <div class="wrapper">
                                    @for($i = 1; $i <= 5; $i ++) <i
                                        class="ion-ios-star {{ $i <= $itemAge ? 'active' : ''}}"></i>
                                        @endfor
                                </div>
                                <!-- Số chuyến đi -->
                                @php
                                $icheck = false;

                                $count = DB::table('bookings')->where('status' , 'active')->where('car_id' ,
                                $driving->id)->count();
                                @endphp


                                <span class="add-wapper">

                                    <?=str_pad($count, 2, '0', STR_PAD_LEFT); ?> trip

                                </span>

                              
                                <!-- địa chỉ -->
                                @php
                                $boolbs = false;
                                $districts = DB::table('districts')->join('locations', 'locations.id',
                                '=', 'districts.locat_id')
                                ->join('cars', 'cars.id',
                                '=', 'districts.car_id')->get();

                                foreach($locations as $location) {
                                $boolbs = true;
                                }
                                @endphp
                                @foreach($districts as $district)
                                @if($district->car_id == $driving->id && $boolbs == true)
                                <div class="location">
                                    <div class=located>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i> {{$district->city_address}},
                                        {{$district->locat_name}}
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                <p class="d-flex mb-0 d-block"><a href="{{route('car.booking',$driving->id)}}"
                                        class="btn btn-orange py-2 mr-1">Rent now</a> <a
                                        href="{{route('car.detail',$driving->id)}}"
                                        class="btn btn-gray py-2 ml-1">Details</a></p>
                            </div>
                        </div>
                    </div>

                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <p>
                <h3><b>Car with driver</b></h3>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-car owl-carousel">
                    @foreach($driverCar as $driver)
                    @if(isset($driver))
                    @php
                    $photo=explode('/',$driver->photo);
                    @endphp
                    <div class="item">
                        <div class="car-wrap rounded ftco-animate">
                            <div class="img rounded d-flex align-items-end"
                                style="background-image:  url('backend/uploads/images/cars/<?= $photo[0]?>');">
                            </div>
                            <div class="text">
                                <h2 class="mb-0"><a href="{{route('car.detail',$driver->id)}}">{{$driver->name}}</a>
                                </h2>
                                <div class="d-flex mb-3">
                                    <span class="cat">{{$driver->render->manu_name}}</span>
                                    <p class="price ml-auto"><?= number_format($driver->price, 0, ',', '.') . " VNĐ"; ?> <span>/day</span></p>
                                </div>
                                <!-- Tính tổng rate trung bình  -->
                                @php
                                $numberRate =DB::table('reviews')->where('car_id',$driver->id)->count();
                                $sumRating = DB::table('reviews')->where('car_id',$driver->id)->sum('rate');
                                $itemAge = 0;
                                if($numberRate!=0){
                                $itemAge = round($sumRating / $numberRate, 2);
                                }
                                @endphp
                              
                                <div class="wrapper">
                                    @for($i = 1; $i <= 5; $i ++) <i
                                        class="ion-ios-star {{ $i <= $itemAge ? 'active' : ''}}"></i>
                                        @endfor
                                </div>
                                <!-- Số chuyến đi -->
                                @php
                                $icheck = false;

                                $count = DB::table('bookings')->where('status' , 'active')->where('car_id' ,
                                $driver->id)->count();
                                @endphp


                                <span class="add-wapper">

                                    <?=str_pad($count, 2, '0', STR_PAD_LEFT); ?> trip

                                </span>

                                <!-- địa chỉ -->
                                @php
                                $boolbs = false;
                                $districts = DB::table('districts')->join('locations', 'locations.id',
                                '=', 'districts.locat_id')
                                ->join('cars', 'cars.id',
                                '=', 'districts.car_id')->get();

                                foreach($locations as $location) {
                                $boolbs = true;
                                }
                                @endphp
                                @foreach($districts as $district)
                                @if($district->car_id == $driver->id && $boolbs == true)
                                <div class="location">
                                    <div class=located>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i> {{$district->city_address}},
                                        {{$district->locat_name}}
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                <p class="d-flex mb-0 d-block"><a href="{{route('car.booking',$driver->id)}}"
                                        class="btn btn-orange py-2 mr-1">Rent now</a> <a
                                        href="{{route('car.detail',$driver->id)}}"
                                        class="btn btn-gray py-2 ml-1">Details</a></p>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<style>
.located {
    position: relative;
    font-size: .8125rem;
    top: -12px;
    bottom: 0;
    left: -2px;
    right: 0;
}

.located i {
    width: 20px;
    height: 20px;
    border: 1px solid;
    text-align: center;
    padding: 3px;
    margin-left: 1px;
    border-radius: 50px;
}

.located i:before {
    color: black;
}

/* tổng rate */
.wrapper .active {
    color: #FFC107 !important;
    position: relative;
}

.wrapper {
    position: relative;
    bottom: 15px;
    left: 0;
    right: 0;
    display: inline-block;
    border: none;
    font-size: 20px;
    padding-top: -74px;
    margin-left: -2px;
}

.add-wapper {
    position: relative;
    top: -16px;
    left: 100px;
    font-size: 14px;
    bottom: 0;
    right: 0;

}
</style>