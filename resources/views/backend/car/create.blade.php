@extends('backend.dasbroad.index')
@section('main-content')
<style>
    input[type=time] {
        border: none;
        color: #2a2c2d;
        font-size: 14px;
        font-family: helvetica;
        width: 190px;
    }

    input[type=time]::-webkit-datetime-edit-fields-wrapper {
        display: flex;
    }

    input[type=time]::-webkit-datetime-edit-text {
        padding: 19px 4px;
    }


    /* Hour */
    input[type=time]::-webkit-datetime-edit-hour-field {
        background-color: #f2f4f5;
        border-radius: 15%;
        color: black;
        padding: 19px 13px;
    }

    /* Minute */
    input[type=time]::-webkit-datetime-edit-minute-field {
        background-color: #f2f4f5;
        border-radius: 15%;
        padding: 19px 13px;
    }

    /* AM/PM */
    input[type=time]::-webkit-datetime-edit-ampm-field {
        background-color: #7155d3;
        border-radius: 15%;
        color: #fff;
        padding: 19px 13px;
    }

    /* 'X' button for resetting/clearing time */
    input[type=time]::-webkit-clear-button {
        display: none;
    }

    /* Up/Down arrows for incrementing/decrementing the value */
    input[type=time]::-webkit-inner-spin-button {
        display: none;
    }
</style>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Cars List</h4>

                  

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">


                        <form class="form-horizontal" action="{{route('main-content.store')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" required="" placeholder="Name">
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>

                                        <textarea id="elm1" name="description" placeholder="Description"></textarea>
                                        @error('description')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Photo</label>
                                        <!-- <input type="file" name="upload[]" multiple id=""> -->
                                        <input class="form-control" type="file" name="upload[]" accept="image/*" multiple="multiple">
                                        @error('upload')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Seat</label>
                                        <input type="number" class="form-control" name="seat" required="" placeholder="Seat">
                                        @error('seat')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Color</label>
                                        <input type="text" class="form-control" name="color" required="" placeholder="Color">
                                        @error('color')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">User</label>
                                        <select class="select2 form-control mb-3 custom-select" name="user" style="width: 100%; height:36px;">
                                            <option>Select</option>
                                            @foreach($suppliers as $supplier)
                                            
                                            
                                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                          
                                            @endforeach
                                        </select>
                                        @error('user')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Category</label>
                                        <select class="select2 form-control mb-3 custom-select" name="category" style="width: 100%; height:36px;">
                                            <option>Select</option>
                                            @foreach($categorys as $category)
                                            <option value="{{$category->id}}">{{$category->cate_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Make</label>
                                        <input type="text" class="form-control" name="make" required="" placeholder="Make">
                                        @error('make')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <label class="form-label">Price</label>
                                        <input type="number" class="form-control price" name="price" required="" placeholder="Price">
                                        @error('price')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Discount</label>
                                        <input type="number" class="form-control discount" name="discount" placeholder="Discount">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" class="form-control" name="city" required="" placeholder="City">
                                        @error('city')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Insurance</label>
                                        <input type="number" class="form-control" name="insurance" required="" placeholder="Insurance">
                                        @error('insurance')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Range of vehicle</label>
                                        <input type="number" class="form-control" name="book_status" required="" placeholder="Range of vehicle">
                                        @error('book_status')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Rules</label>


                                        <input type="text" class="form-control" name="rules" required="" placeholder="rules">
                                        @error('rules')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Render</label>
                                        <select class="select2 form-control mb-3 custom-select" name="render" style="width: 100%; height:36px;">
                                            <option>Select</option>
                                            @foreach($renders as $render)
                                            <option value="{{$render->id}}">{{$render->manu_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('render')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Location</label>
                                        <select class="select2 form-control mb-3 custom-select" name="location" style="width: 100%; height:36px;">
                                            <option>Select</option>
                                            @foreach($locations as $location)
                                            <option value="{{$location->id}}">{{$location->locat_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('render')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-0 row">

                                        <div class="col-md-9">

                                            <div class="form-check-inline my-2">
                                                <div class="form-check">
                                                    <input type="checkbox" name="sensors" class="form-check-input" id="customCheck6" data-parsley-multiple="groups" data-parsley-mincheck="2" value="sensors">
                                                    <label class="form-check-label" for="customCheck6">Sensors</label>
                                                </div>

                                            </div>

                                            <div class="form-check-inline my-2">
                                                <div class="form-check">
                                                    <input type="checkbox" name="control_parking" class="form-check-input" id="customCheck7" data-parsley-multiple="groups" data-parsley-mincheck="2" value="control_parking">

                                                    <label class="form-check-label" for="customCheck7">Remote Control
                                                        Parking</label>
                                                </div>
                                            </div>
                                            <div class="form-check-inline my-2">
                                                <div class="form-check">
                                                    <input type="checkbox" name="auto_temp" class="form-check-input" id="customCheck8" data-parsley-multiple="groups" data-parsley-mincheck="2" value="auto_temp">
                                                    <label class="form-check-label" for="customCheck8">Auto Temp</label>
                                                </div>
                                            </div>
                                            <div class="form-check-inline my-2">
                                                <div class="form-check">
                                                    <input type="checkbox" name="wireless_co" class="form-check-input" id="customCheck9" data-parsley-multiple="groups" data-parsley-mincheck="2" value="wireless_co">
                                                    <label class="form-check-label" for="customCheck9">Wireless
                                                        co</label>
                                                </div>
                                            </div>
                                            <div class="form-check-inline my-2">
                                                <div class="form-check">
                                                    <input type="checkbox" name="conditioner" class="form-check-input" id="customCheck4" data-parsley-multiple="groups" data-parsley-mincheck="2" value="conditioner">
                                                    <label class="form-check-label" for="customCheck4">Condltioner</label>
                                                </div>
                                            </div>
                                            <div class="form-check-inline my-2">
                                                <div class="form-check">
                                                    <input type="checkbox" name="navigator" class="form-check-input" id="customCheck5" data-parsley-multiple="groups" data-parsley-mincheck="2" value="navigator">
                                                    <label class="form-check-label" for="customCheck5">Navigator</label>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Start Date</label>
                                                <input class="form-control" type="date" name="start_date" value="<?= date("Y-m-d"); ?>" id="example-date-input">
                                                @error('time_start')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">End Date</label>
                                                <input class="form-control" type="date" name="end_date" value="<?= date("Y-m-d", strtotime('+1 day', strtotime(date("Y-m-d")))) ?>" id="example-date-input">
                                                @error('time_end')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3" style="margin-top: 10px;">
                                                <label class="form-label">Start Time</label>
                                                <input type="time" name="start_time">
                                            </div>
                                            <div class="mb-3" style="margin-top: 10px;">
                                                <label class="form-label" style="margin-right: 10px;">End Time</label>
                                                <input type="time" name="end_time">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Price 1-3 date</label>
                                                <input type="number" class="form-control price" name="onetothree" required="" placeholder="Price">
                                                @error('price')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <label class="form-label">Price 5-9 date</label>
                                                <input type="number" class="form-control price" name="fiveonline" required="" placeholder="Price">
                                                @error('price')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Price 10-14 date</label>
                                                <input type="number" class="form-control price" name="tentofourteen" required="" placeholder="Price">
                                                @error('price')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <label class="form-label">Price more 15 date</label>
                                                <input type="number" class="form-control price" name="morefifteen" required="" placeholder="Price">
                                                @error('price')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Status</label><br>
                                        <input type="checkbox" id="switch1" name="status" switch="none" />
                                        <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                                        @error('status')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
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

<script>
    var price = document.querySelector('.price');
    var discount = document.querySelector('.discount');
    price.addEventListener('change', e => {
        var price1 = document.querySelector('.price').value;
        discount.setAttribute('max', price1);

    });
</script>
<!--tinymce js-->
<script src="{{asset('backend/assets/libs/tinymce/tinymce.min.js')}}"></script>

<script src="{{asset('backend/assets/js/pages/form-editor.init.js')}}"></script>
@endpush