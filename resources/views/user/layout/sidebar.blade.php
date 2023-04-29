<nav class="sidebar sidebar-offcanvas" id="sidebar" style="border: 0.5px solid #392C70">
    <ul class="nav">
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
            <a class="nav-link" href="{{ route('home') }}" aria-expanded="false" aria-controls="page-layouts"
                style="border-bottom: 0.2px solid;">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title" style="font-size: 10px">Dashboard</span>
                {{-- <i class="menu-arrow"></i> --}}
            </a>
        </li>
        <li class="nav-item" style="border-bottom: 0.2px solid;">
            <a class="nav-link" href="{{ route('userprofile') }}" aria-expanded="false" aria-controls="page-layouts"
                style="border-bottom: 0.2px solid;">
                <i class="fa fa-user menu-icon"></i>
                <span class="menu-title" style="font-size: 10px">Profile View</span>
                {{-- <i class="menu-arrow"></i> --}}
            </a>
        </li>
        <li class="nav-item" style="border-bottom: 0.2px solid;">
            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();
                {{ __('Logout') }}">
               <i class="fa fa-times-circle menu-icon" ></i>
                <span> Logout</span>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
                {{-- <i class="menu-arrow"></i> --}}
            </a>
        </li>
        
        <!--<li class="nav-item" style="border-bottom: 0.2px solid;">-->
        <!--    <a class="dropdown-item" href="{{ route('logout') }}"-->
        <!--        onclick="event.preventDefault();-->
        <!--                         document.getElementById('logout-form').submit();">-->
        <!--        {{ __('Logout') }}-->
        <!--    </a>-->
        <!--    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">-->
        <!--        @csrf-->
        <!--    </form>-->
        <!--    </a>-->
        <!--</li>-->

    </ul>
</nav>
