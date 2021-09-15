@extends('layouts.app')
@section('content')
<style>
.favorite i {
    background: #FBBB4A;
    color: #fff;
    position: absolute;
    top: 15px;
    right: 30px;
    cursor: pointer;
    font-size: 18px;
    padding: 9px;
    padding-left: 9px;
    border: 1px solid #FBBB4A;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    text-align: center;
}
</style>
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12" style="margin-bottom: 80px;">
                <div class="row payment-visa mt-4">
                    <div class="col">
                        <nav>
                            <div class="nav nav-pills nav-underline mb-5 animated" data-animation="fadeInUpShorter"
                                data-animation-delay="0.5s" id="myTab" role="tablist">
                                <a href="#ico" class="nav-item nav-link active" id="ico-tab" data-toggle="tab"
                                    aria-controls="ico" aria-selected="false" role="tab">Self-driving car</a>
                                <a href="#biswap" class="nav-item nav-link" id="biswap-tab" data-toggle="tab"
                                    aria-controls="biswap" aria-selected="false" role="tab">Car with driver</a>

                            </div>
                        </nav>
                        <div class="tab-content" id="myTabContent">
                            <!--Bitcoin-->
                            <div class="tab-pane fade" id="biswap" role="tabpanel" aria-labelledby="biswap-tab">
                                <div id="token-accordion" class="collapse-icon accordion-icon-rotate">
                                    <div class="card">
                                        <div class="row">
                                            @foreach($cars as $car)
                                            @if($car->book_status == 1)
                                            @php
                                            $photo=explode('/',$car->photo);
                                            @endphp
                                            <div class="col-md-4">
                                                <div class="car-wrap rounded ftco-animate">
                                                    <div class="img rounded d-flex align-items-end"
                                                        style="background-image:  url('../backend/uploads/images/cars/<?= $photo[0]?>');">

                                                        <a href="{{route('wishlist.remove',$car->id)}}"
                                                            class="favorite">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                    <div class="text">
                                                        <h2 class="mb-0"><a
                                                                href="{{route('car.detail',$car->id)}}">{{$car->name}}</a>
                                                        </h2>
                                                        <div class="d-flex mb-3">
                                                            <span class="cat">{{$car->render->manu_name}}</span>
                                                            <p class="price ml-auto">
                                                                ${{number_format($car->price)}}
                                                                <span>/day</span>
                                                            </p>
                                                        </div>
                                                        <div class="wrapper">
                                                            <input name="ratingRadio" type="radio" id="st1" value="1" />
                                                            <label for="st1"></label>
                                                            <input name="ratingRadio" type="radio" id="st2" value="2" />
                                                            <label for="st2"></label>
                                                            <input name="ratingRadio" type="radio" id="st3" value="3" />
                                                            <label for="st3"></label>
                                                            <input name="ratingRadio" type="radio" id="st4" value="4" />
                                                            <label for="st4"></label>
                                                            <input name="ratingRadio" type="radio" id="st5" value="5" />
                                                            <label for="st5"></label>
                                                        </div>
                                                        <p class="d-flex mb-0 d-block"><a
                                                                href="{{route('car.booking',$car->id)}}"
                                                                class="btn btn-orange py-2 mr-1">Book now</a> <a
                                                                href="{{route('car.detail',$car->id)}}"
                                                                class="btn btn-gray py-2 ml-1">Details</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col text-center">
                                                <div class="block-27">
                                                    <ul>
                                                        {{$cars->links()}}
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="ico" role="tabpanel" aria-labelledby="ico-tab">
                                <div id="ico-accordion" class="collapse-icon accordion-icon-rotate">
                                    <div class="card">
                                        <div class="row">
                                            @foreach($cars as $car)
                                            @if($car->book_status == 2)
                                            @php
                                            $photo=explode('/',$car->photo);

                                            @endphp
                                            <div class="col-md-4">
                                                <div class="car-wrap rounded ftco-animate">
                                                    <div class="img rounded d-flex align-items-end"
                                                        style="background-image:  url('../backend/uploads/images/cars/<?= $photo[0]?>');">
                                                        <a href="{{route('wishlist.remove',$car->id)}}" class="favorite">
                                                            <i class="fa fa-trash"
                                                                style="background: #FBBB4A;color: #fff;"></i>
                                                        </a>
                                                    </div>
                                                    <div class="text">
                                                        <h2 class="mb-0"><a
                                                                href="{{route('car.detail',$car->id)}}">{{$car->name}}</a>
                                                        </h2>
                                                        <div class="d-flex mb-3">
                                                            <span class="cat">{{$car->render->manu_name}}</span>
                                                            <p class="price ml-auto">
                                                                ${{number_format($car->price)}}
                                                                <span>/day</span>
                                                            </p>
                                                        </div>
                                                        <div class="wrapper">
                                                            <input name="ratingRadio" type="radio" id="st1" value="1" />
                                                            <label for="st1"></label>
                                                            <input name="ratingRadio" type="radio" id="st2" value="2" />
                                                            <label for="st2"></label>
                                                            <input name="ratingRadio" type="radio" id="st3" value="3" />
                                                            <label for="st3"></label>
                                                            <input name="ratingRadio" type="radio" id="st4" value="4" />
                                                            <label for="st4"></label>
                                                            <input name="ratingRadio" type="radio" id="st5" value="5" />
                                                            <label for="st5"></label>
                                                        </div>
                                                        <p class="d-flex mb-0 d-block"><a
                                                                href="{{route('car.booking',$car->id)}}"
                                                                class="btn btn-orange py-2 mr-1">Book now</a> <a
                                                                href="{{route('car.detail',$car->id)}}"
                                                                class="btn btn-gray py-2 ml-1">Details</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach

                                        </div>
                                        <div class="row mt-5">
                                            <div class="col text-center">
                                                <div class="block-27">
                                                    <ul>
                                                        {{$cars->links()}}
                                                    </ul>
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
</section>


<!-- Footer -->
@include('partials.footer')

@endsection
@push('scripts')
<script>
//Xóa style:display:none; trong select;
$('.pagination').remove();
</script>
@endpush