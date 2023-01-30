@php
    $auth_user=auth()->user();
@endphp
<div class="side-nav">
    <div class="side-nav-inner">
        @if($auth_user->hasRole('superadmin') || ($auth_user->hasRole('employee') && $auth_user->hasPermissionTo('View Data')) )
        <ul class="side-nav-menu scrollable">
            <li class="nav-item {{url()->current() == route('backend.dashboard') ? 'active' :''}}">
                <a href="{{route('backend.dashboard')}}">
                    <span class="icon-holder">
                        <i class="fas fa-home"></i>
                    </span>
                    <span class="title">Home</span>
                </a>
            </li>

            <li class="nav-item {{url()->current() == route('backend.category.index') ? 'active' :''}}">
                <a href="{{route('backend.category.index')}}">
                    <span class="icon-holder">
                        <i class="fas fa-list-alt"></i>
                    </span>
                    <span class="title">Category </span>
                </a>
            </li>
            {{-- <li class="nav-item {{url()->current() == route('backend.orders.index') ? 'active' :''}}">
                <a href="{{route('backend.orders.index')}}">
                    <span class="icon-holder">
                        <i class="fas fa-tasks"></i>
                    </span>
                    <span class="title">Orders</span>
                </a>

            </li> --}}
            <hr>
            <li class="nav-item dropdown {{\Route::is('backend.contract.*') ? 'active' :''}}">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fas fa-building"></i>
                    </span>
                    <span class="title">Contracts</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{route('backend.contract.index')}}">All Contracts</a>
                    </li>
                    <li>
                        <a href="{{route('backend.contract.index')}}?type=customer">Customer Contracts</a>
                    </li>
                    <li>
                        <a href="{{route('backend.contract.index')}}?type=vendor">Vendor Contracts</a>
                    </li>
                    <li>
                        <a href="{{route('backend.contract.create')}}">Add Contract</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{\Route::is('backend.user.*') ? 'active' :''}}">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fas fa-briefcase"></i>
                    </span>
                    <span class="title">Users & Admins</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{route('backend.user.index')}}">All Users</a>
                    </li>
                    <li>
                        <a href="{{route('backend.user.index')}}?type=customer">Customer</a>
                    </li>
                    <li>
                        <a href="{{route('backend.user.index')}}?type=vendor">Vendor</a>
                    </li>
                    <li>
                        <a href="{{route('backend.user.index')}}?type=employee">Admin</a>
                    </li>
                    <li>
                        <a href="{{route('backend.user.create')}}">Add Contract</a>
                    </li>
                </ul>
            </li>
            
           {{-- <li class="nav-item {{\Route::is('backend.blog.index') ? 'active' :''}}">
                <a href="{{route('backend.blog.index')}}">
                    <span class="icon-holder">
                        <i class="fas fa-blog"></i>
                    </span>
                    <span class="title">Blogs </span>
                </a>
            </li>
             <li class="nav-item">
                <a href="{{route('backend.backend-pages','support')}}">
                    <span class="icon-holder">
                        <i class="fas fa-cog"></i>
                    </span>
                    <span class="title">Support </span>
                </a>
            </li> 
            <li class="nav-item">
                <a href="{{url('/')}}/chatify">
                    <span class="icon-holder">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <span class="title">Chat </span>
                </a>
            </li>--}}
        </ul>
        @endif
    </div>
</div>