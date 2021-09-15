<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-bus-multiple"></i>
                        <span class="badge rounded-pill bg-danger float-end">9+</span>
                        <span>Dashboards</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                       
                        <li><a href="{{route('main-content.index')}}">dashboard</a></li>
                    </ul>
                </li>

                

                <!-- Calender -->
             


                <li class="menu-title">Components</li>

              

              

               
                <!-- Table -->
                @if(Auth::user()->role == 'admin')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-format-list-bulleted-type"></i>
                        <span>Tables</span>
                    </a>
                    
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('reder.index')}}">Reders</a></li>
                       
                        <li><a href="{{route('category.index')}}">Categories</a></li>

                    </ul>
                </li>
                @endif
                 <!-- Banner -->
                 @if(Auth::user()->role == 'admin')
                 <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-atom-variant"></i>

                        <span>Banners</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                       
                        <li><a href="{{route('banner.index')}}">Banners</a></li>
                    </ul>
                </li>
                @endif
                 <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-antenna"></i>

                        <span>Districts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                       
                        <li><a href="{{route('district.index')}}">Districts</a></li>
                    </ul>
                </li>
                  <!-- Banner -->
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-atom-variant"></i>

                        <span>Locations</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                       
                        <li><a href="{{route('location.index')}}">Locations</a></li>
                    </ul>
                </li>
                <!-- Users -->
                @if(Auth::user()->role == 'admin')
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-account-supervisor-circle"></i>

                        <span>Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                       
                        <li><a href="{{route('user.index')}}">Users</a></li>
                    </ul>
                </li>
                @endif
                @if(Auth::user()->role == 'admin')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-map"></i>
                        <span>Cars sale</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('sale.index')}}">Zip Code</a></li>
                        <li><a href="{{route('sale.create')}}">Add Code</a></li>
                        
                    </ul>
                </li>
                @endif

                <li class="menu-title">More</li>


                

                <!-- Pages -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-cookie-outline"></i>
                        <span>Reviews</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('review.index')}}">Reviews</a></li>
                        
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-briefcase"></i>
                        <span>Bookings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('booking.index')}}">Bookings</a></li>
                        
                    </ul>
                </li>
                @if(Auth::user()->role == 'admin')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-drupal"></i>
                        <span>Wishlists</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('wishlist.index')}}">Wishlists</a></li>
                        
                    </ul>
                </li>
                @endif
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-checkbox-multiple-blank-outline"></i>
                        <span class="badge bg-success float-end">Hot</span>
                        <span>Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <!-- <li><a href="page-tour.html">Settings</a></li> -->
                        <li><a href="{{route('oder.index')}}">Receipts</a></li>
                        <li><a href="{{route('comment.index')}}">Comments</a></li>
                        <li><a href="{{route('history.index')}}">History</a></li>
                        @if(Auth::user()->role == 'admin')
                        <li><a href="{{route('contact.index')}}">Contact</a></li>
                        @endif
                    </ul>
                </li>

              


               
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->