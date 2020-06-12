    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" navigation-header"><span>General</span><i class=" feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>
                </li>
                
                @if(auth()->user()->role != 'superadmin')
                <li class=" nav-item"><a href="{{route('home')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Email Application">Dashboard</span></a>
                </li>
                <li class=" nav-item"><a href="{{route('customer.index')}}"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Chat Application">Customers</span></a>
                </li>
                <li class=" nav-item"><a href="{{route('product.index')}}"><i class="feather icon-check-square"></i><span class="menu-title" data-i18n="Todo Application">Products</span></a>
                </li>
                @else
                <li class=" nav-item"><a href="{{route('home')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Email Application">Dashboard</span></a>
                </li>
                <li class=" nav-item"><a href="{{route('admin-subsidiary.index')}}"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Chat Application">Subsidiaries</span></a>
                </li>
                <li class=" nav-item"><a href="{{route('admin-customer.index')}}"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Chat Application">Customers</span></a>
                </li>
                <li class=" nav-item"><a href="{{route('admin-product.index')}}"><i class="feather icon-check-square"></i><span class="menu-title" data-i18n="Todo Application">Products</span></a>
                </li>
                @endif
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->