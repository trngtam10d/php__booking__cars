<section class="ftco-section testimony-section bg-light" id="location">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Booking</span>
                <h2 class="mb-3">Location</h2>
            </div>
        </div>
        <div class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach($locations as $location)
                        @if(isset($location))
                        <li style="background: url(./backend/uploads/images/<?= $location->image ?>) no-repeat center;" class="splide__slide snip0019">
                            <a href="{{route('car.location',$location->id)}}">
                                <figcaption>
                                    <div>
                                        <h2></h2>
                                    </div>
                                    <div>
                                        <p>{{$location->locat_name}}</p>
                                    </div>
                                    <a href="{{route('car.location',$location->id)}}"></a>
                                </figcaption>
                            </a>
                        </li>
                        @endif
                    @endforeach
                   
                </ul>
            </div>
        </div>
    </div>
</section>