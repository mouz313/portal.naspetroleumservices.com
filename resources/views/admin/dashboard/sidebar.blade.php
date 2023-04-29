<nav class="sidebar sidebar-offcanvas" id="sidebar" style="border: 0.5px solid #392C70">
    <ul class="nav" style="overflow: auto" >
        <li class="nav-item nav-profile" style="border-bottom: 0.2px solid;">
            <div class="nav-link">
                <div class="profile-image">
                    <img src="{{ asset('admindashboard/images/faces/face5.jpg') }}" alt="image" />
                </div>
                <div class="profile-name">
                    <p class="name">
                        {{ Auth::user()->name }}
                    </p>
                    {{-- <p class="designation">
                        Super Admin
                    </p> --}}
                </div>
            </div>
        </li>
        <li class="nav-item" style="border-bottom: 0.2px solid;">
            <a class="nav-link" href="{{ Auth::user()->role == 2 ? route('admin.home') :route('manager.home') }}" aria-expanded="false"
                aria-controls="page-layouts" style="border-bottom: 0.2px solid;">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title" style="font-size: 10px">Dashboard</span>
                {{-- <i class="menu-arrow"></i> --}}
            </a>
        </li>
        <li class="nav-item" style="border-bottom: 0.2px solid;">
            <a class="nav-link" href="{{route('reminders.list')}}" aria-expanded="false"
                aria-controls="page-layouts" style="border-bottom: 0.2px solid;">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title" style="font-size: 10px">Reminder List</span>
                {{-- <i class="menu-arrow"></i> --}}
            </a>
        </li>
        <li class="nav-item" style="border-bottom: 0.2px solid;">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                aria-controls="page-layouts" style="border-bottom: 0.2px solid;">
                <i class="fa fa-users menu-icon"></i>
                <span class="menu-title" style="font-size: 10px">Customers</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-lg-block"> <a class="nav-link" href="{{ Auth::user()->role == 2 ? route('users') :route('manager.users') }}" style="font-size: 10px">All Customers</a></li>
                    {{-- <li class="nav-item"> <a class="nav-link" href="#"style="font-size: 10px">Add User</a></li> --}}
                </ul>
            </div>
        </li>
        <li class="nav-item d-lg-block" style="border-bottom: 0.2px solid">
            <a class="nav-link" href="#sidebar-layouts" data-toggle="collapse" aria-expanded="false">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title" style="font-size: 10px">Stores</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sidebar-layouts" style="border-bottom: 0.2px solid;">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ Auth::user()->role == 2 ? route('shop') : route('manager.shop') }}">Store List</a></li>
                    {{-- <li class="nav-item"> <a class="nav-link" href="{{route('shop.edit')}}">Edit Store</a></li> --}}
                    {{-- <li class="nav-item"> <a class="nav-link" href="{{route('add')}}">Add Shop</a></li> --}}
                </ul>
            </div>
{{--            <div class="collapse" id="sidebar-layouts" style="border-bottom: 0.2px solid;">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('shop')}}">Store List</a></li>--}}
{{--                    --}}{{-- <li class="nav-item"> <a class="nav-link" href="{{route('shop.edit')}}">Edit Store</a></li> --}}
{{--                    --}}{{-- <li class="nav-item"> <a class="nav-link" href="{{route('add')}}">Add Shop</a></li> --}}
{{--                </ul>--}}
{{--            </div>--}}
        </li>

        @if(Auth::user()->role==2)
        <li class="nav-item  d-lg-block" style="border-bottom: 0.2px solid">
            <a class="nav-link" data-toggle="collapse" href="#sidebar-manager" aria-expanded="false"
                aria-controls="sidebar-manager">
                <i class="fa fa-user-secret menu-icon"></i>
                <span class="menu-title" style="font-size: 10px">Manager</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sidebar-manager" style="border-bottom: 0.2px solid;">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('manager.index')}}">All Manager</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('addmanager')}}">Add Manager</a></li>
                </ul>
            </div>
        </li>
        @endif
        @if(\Illuminate\Support\Facades\Auth::user()->role == '2')
        <li class="nav-item  d-lg-block" style="border-bottom: 0.2px solid">
            <a class="nav-link"  href=" {{ route('editprofile')}}" aria-expanded="false"
                aria-controls="sidebar-manager">
                <i class="fa fa-user menu-icon"></i>
                <span class="menu-title" style="font-size: 10px">Profile</span>
            </a>
        </li>
        @endif
        @if(\Illuminate\Support\Facades\Auth::user()->role == '1')
        <li class="nav-item  d-lg-block" style="border-bottom: 0.2px solid">
            <a class="nav-link"  href="{{route('manager.edit_profile')}}" aria-expanded="false"
                aria-controls="sidebar-manager">
                <i class="fa fa-user menu-icon"></i>
                <span class="menu-title" style="font-size: 10px"> Manager Profile</span>
            </a>
        </li>
        @endif
        <li class="nav-item  d-lg-block" style="border-bottom: 0.2px solid">
            <a class="nav-link" data-toggle="collapse" href="{{ route('logout') }}"
                aria-controls="sidebar-manager"
                onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">

                <i class="fas fa-power-off text-primary menu-icon"></i>
                <span class="menu-title" style="font-size: 10px">Logout</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
            </a>

        </li>
    </ul>
</nav>