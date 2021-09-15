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
                     

                        <form class="form-horizontal" action="{{route('main-content.update',$car->id)}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$car->name}}" required="" placeholder="Name">
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>

                                        <textarea id="elm1" name="description" placeholder="Description">{{$car->description}}</textarea>
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
                                        <?php $photo_split = explode("/", $car->photo); ?>
                                        @for($i =0 ;$i < count($photo_split)-1 ;$i++) <img src="{{asset('backend/uploads/images/cars')}}/<?= $photo_split[$i] ?>" alt="" style="width: 60px;margin-top: 10px;">
                                            @endfor
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Seat</label>
                                        <input type="number" class="form-control" name="seat" value="{{$car->seat}}" required="" placeholder="Seat">
                                        @error('seat')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Color</label>
                                        <input type="text" class="form-control" name="color" value="{{$car->color}}" required="" placeholder="Color">
                                        @error('color')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">User</label>
                                        <select class="select2 form-control mb-3 custom-select" name="user" style="width: 100%; height:36px;">
                                            <option>Select</option>
                                            @foreach($suppliers as $supplier)
                                            @if($supplier->id == $car->user->id)
                                            <option value="{{$supplier->id}}" selected>{{$supplier->name}}</option>
                                            @endif
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
                                            @if($category->id == $car->catagory->id)
                                            <option value="{{$category->id}}" selected>{{$category->cate_name}}</option>
                                            @endif
                                            <option value="{{$category->id}}">{{$category->cate_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Make</label>
                                        <input type="text" class="form-control" name="make" value="{{$car->make}}" required="" placeholder="Make">
                                        @error('make')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Price</label>
                                        <input type="number" class="form-control" name="price" value="{{$car->price}}" required="" placeholder="Price">
                                        @error('price')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" class="form-control" name="city" value="{{$car->city}}" required="" placeholder="City">
                                        @error('city')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Insurance</label>
                                        <input type="number" class="form-control" name="insurance" value="{{$car->insurance}}" required="" placeholder="Insurance">
                                        @error('insurance')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Range of vehicle</label>
                                        <input type="number" class="form-control" name="book_status" value="{{$car->book_status}}" required="" placeholder="Range of vehicle">
                                        @error('book_status')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Rules</label>
                                        <input type="text" class="form-control" name="rules" value="{{$car->rules}}" required="" placeholder="Rules">
                                        @error('rules')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Render</label>
                                        <select class="select2 form-control mb-3 custom-select" name="render" style="width: 100%; height:36px;">
                                            <option>Select</option>
                                            @foreach($renders as $render)
                                            @if($render->id == $car->render->id)
                                            <option value="{{$render->id}}" selected>{{$render->manu_name}}</option>
                                            @endif
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
                                            @if($location->id == $car->location->id)
                                            <option value="{{$location->id}}" selected>{{$location->locat_name}}
                                            </option>
                                            @endif
                                            <option value="{{$location->id}}">{{$location->locat_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('render')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Start Date</label>
                                                <input class="form-control" type="date" value="{{$car->start_date}}" name="start_date" value="<?= date("Y-m-d"); ?>" id="example-date-input">
                                                @error('time_start')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">End Date</label>
                                                <input class="form-control" type="date"  value="{{$car->end_date}}" name="end_date" value="<?= date("Y-m-d", strtotime('+1 day', strtotime(date("Y-m-d")))) ?>" id="example-date-input">
                                                @error('time_end')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3" style="margin-top: 10px;">
                                                <label class="form-label">Start Time</label>
                                                <input type="time" name="start_time"  value="{{$car->start_time}}">
                                            </div>
                                            <div class="mb-3" style="margin-top: 10px;">
                                                <label class="form-label" style="margin-right: 10px;">End Time</label>
                                                <input type="time" name="end_time"  value="{{$car->end_time}}">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Price 1-3 date</label>
                                                <input type="number" class="form-control price" name="onetothree" value="{{$costdate['onetothree']}}" required="" placeholder="Price">
                                                @error('price')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <label class="form-label">Price 5-9 date</label>
                                                <input type="number" class="form-control price" name="fiveonline" value="{{$costdate['fiveonline']}}" required="" placeholder="Price">
                                                @error('price')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Price 10-14 date</label>
                                                <input type="number" class="form-control price" name="tentofourteen" value="{{$costdate['tentofourteen']}}" required="" placeholder="Price">
                                                @error('price')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <label class="form-label">Price more 15 date</label>
                                                <input type="number" class="form-control price" name="morefifteen" value="{{$costdate['morefifteen']}}" required="" placeholder="Price">
                                                @error('price')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Status</label><br>
                                        @if($car->status == "active")
                                        <input type="checkbox" id="switch1" name="status" switch="none" checked />
                                        <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                                        @else
                                        <input type="checkbox" id="switch1" name="status" switch="none" />
                                        <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                                        @endif

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

<!--tinymce js-->
<script src="{{asset('backend/assets/libs/tinymce/tinymce.min.js')}}"></script>

<script src="{{asset('backend/assets/js/pages/form-editor.init.js')}}"></script>
@endpush