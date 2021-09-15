@extends('layouts.app')
@section('content')
<style>

</style>

<link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('backend/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
<section id="promotion" class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2 class="border-bt" style="text-align: center;">GIỚI THIỆU BẠN BÈ</h2>


            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-8">
                <br>
                <h4>
                    Chia sẻ mã giới thiệu với bạn bè để cả hai cùng nhận ưu đãi 50000 VNĐ cho chuyến đi đầu tiên
                </h4>
                <br>
                <h4>Mã giới thiệu</h4>
                <!-- The text field -->
                @foreach($refect as $ref)
                @php
                    
                @endphp
                @if(Auth::user()->id == $ref->id)
                <input type="text" value="<?php echo $ref->country_code  ?>" id="myInput">
                @endif
                @endforeach

                <!-- The button used to copy the text -->
                <button onclick="myFunction();" style="background: #FBBB4A!important;">Copy</button>
                <br>
                <br>
                <div class="button-list btn-social-icon">
                    <button type="button" class="btn btn-facebook">
                        <i class="fab fa-facebook"></i>
                    </button>

                    <button type="button" class="btn btn-twitter ms-1">
                        <i class="fab fa-twitter"></i>
                    </button>

                    <button type="button" class="btn btn-linkedin  ms-1">
                        <i class="fab fa-linkedin"></i>
                    </button>

                   
                    <button type="button" class="btn btn-googleplus  ms-1">
                        <i class="fab fa-google-plus"></i>
                    </button>

                    <button type="button" class="btn btn-instagram ms-1">
                        <i class="fab fa-instagram"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="refect-img">
                    <img src="ui/images/sharecode.cbaa11bf.png" alt="sharecode" style="max-width: 85%;height: auto;">
                </div>
            </div>
        </div>

    </div>
</section>

<script>
function myFunction() {
    /* Get the text field */
    var copyText = document.getElementById("myInput");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    navigator.clipboard.writeText("http://localhost/BookCar/public/ui/register/ref/" + copyText.value);

    /* Alert the copied text */
    alert("Copied the text: " + copyText.value);
}
</script>
<!-- Footer -->
@include('partials.footer')

@endsection