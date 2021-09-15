@include('backend.partials.main')

<head>
    @include('backend.partials.title-meta')
    <!-- DataTables -->
    <link href="backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    @include('backend.partials.head-css')

</head>

@include('backend.partials.body')

<!-- Begin page -->
<div id="layout-wrapper">

    @include('backend.partials.menu')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                @include('backend.partials.page-title')
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
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if(isset($cars))
                                            @foreach($cars as $car)
                                            <tr>
                                                <td>{{$car->id}}</td>
                                                <td>{{$car->name}}</td>
                                                <td>
                                                    <div class="min-carousel"
                                                        style="width: 90%;position: relative;left: 20px;">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div id="carouselExampleIndicators<?=$car->id?>"
                                                                            class="carousel slide"
                                                                            data-bs-ride="carousel">
                                                                            <?php $photo_split = explode("/", $car->photo); ?>
                                                                            <ol class="carousel-indicators">
                                                                                @for($i=0; $i < count($photo_split)-1 ;
                                                                                    $i++) <li
                                                                                    data-bs-target="#carouselExampleIndicators<?= $car->id?>"
                                                                                    data-bs-slide-to="<?php echo $i;?>"
                                                                                    class="<?php if($i==0){echo"active";}?>">
                                                                                    </li>
                                                                                    @endfor
                                                                            </ol>

                                                                            <div class="carousel-inner" role="listbox">
                                                                                @for($i=0; $i < count($photo_split)-1 ;
                                                                                    $i++) <div
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
                                                                            <span
                                                                                class="visually-hidden">Previous</span>
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
                                    <form method="POST" action="{{route('main-content.destroy',[$car->id])}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm nutXoaDayNe" data-id={{$car->id}}
                                            style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                                            data-placement="bottom" title="Delete"><i
                                                class="fas fa-trash-alt"></i></button>
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



            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        @include('backend.partials.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

@include('backend.partials.right-sidebar')

@include('backend.partials.vendor-scripts')

@include('backend.partials.table')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
//Script tạo popup hiện lên khi bấm nút xóa
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.nutXoaDayNe').click(function(e) {
        var form = $(this).closest('form');
        var dataID = $(this).data('id');
        // alert(dataID);
        e.preventDefault();
        swal({
                title: "Confirm!",
                text: "Car that has been deleted cannot be retrieved!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                } else {
                    swal("Oh good luck, not deleted yet!!!");
                }
            });
    })
})
</script>
</body>

</html>