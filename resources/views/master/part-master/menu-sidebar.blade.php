<aside class="menu-sidebar2">
    <div class="logo">
        <a href="#" style="text-align: center">
            <img width="70%" src="{{ asset('images/logo-denso3.png') }}" alt="GRAHA RAJASA" />
        </a>
    </div>
    <div class="menu-sidebar2__content js-scrollbar1">
        <div class="account2">
            <div class="image img-cir img-120">
                <img src="{{ asset('template/images/icon/avatar-big-01.jpg') }}" alt="John Doe" />
            </div>
            <h4 class="name">{{Auth::user()->username}}</h4>
            <a href="{{ route('logout') }}">Sign out</a>
        </div>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-bar-chart-o"></i>Transaction
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route('transaction-list') }}">
                                <i class="fas fa-tags"></i>List of Transaction</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-book"></i>Management
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route('user-management') }}">
                                <i class="fas fa-users"></i>User Management</a>
                        </li>
                        <li>
                            <a href="{{ route('mechanic-management') }}">
                                <i class="fas fa-users"></i>Mechanic Management</a>
                        </li>
                        <li>
                            <a href="{{ route('car-management') }}">
                                <i class="fas  fa-folder"></i>Car</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
