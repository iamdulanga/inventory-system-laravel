<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('user-profile.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p class="username">{{ \Auth::user()->name }}</p>
                <a href="#" class="status"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li class="menu-item">
                <a href="{{ url('/home') }}">
                    <i class="fa fa-dashboard menu-icon"></i> 
                    <span class="menu-text">Dashboard</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-blue">Home</small>
                    </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('products.index') }}">
                    <i class="fa fa-cubes menu-icon"></i> 
                    <span class="menu-text">Products</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">{{ \App\Product::count() }}</span>
                    </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('customers.index') }}">
                    <i class="fa fa-users menu-icon"></i> 
                    <span class="menu-text">Customers</span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right">{{ \App\Customer::count() }}</span>
                    </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('suppliers.index') }}">
                    <i class="fa fa-truck menu-icon"></i> 
                    <span class="menu-text">Suppliers</span>
                    <span class="pull-right-container">
                        <span class="label label-warning pull-right">{{ \App\Supplier::count() }}</span>
                    </span>
                </a>
            </li>

            <li class="header">INVENTORY</li>

            <li class="menu-item">
                <a href="{{ route('productsOut.index') }}">
                    <i class="fa fa-minus menu-icon"></i> 
                    <span class="menu-text">Outgoing Products</span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('productsIn.index') }}">
                    <i class="fa fa-cart-plus menu-icon"></i> 
                    <span class="menu-text">Purchase Products</span>
                </a>
            </li>

            <li class="header">NEEDLE MANAGEMENT</li>

            <li class="menu-item">
                <a href="{{ route('missing-needles.index') }}">
                    <i class="fa fa-scissors menu-icon"></i> 
                    <span class="menu-text">Missing Needles</span>
                    <span class="pull-right-container">
                        <span class="label label-danger pull-right">{{ \App\MissingNeedle::count() }}</span>
                    </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('blunt-needles.index') }}">
                    <i class="fa fa-circle-o-notch menu-icon"></i> 
                    <span class="menu-text">Blunt Needles</span>
                    <span class="pull-right-container">
                        <span class="label label-warning pull-right">{{ \App\BluntNeedle::count() }}</span>
                    </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('broken-needles.index') }}">
                    <i class="fa fa-chain-broken menu-icon"></i> 
                    <span class="menu-text">Broken Needles</span>
                    <span class="pull-right-container">
                        <span class="label label-danger pull-right">{{ \App\BrokenNeedle::count() }}</span>
                    </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('extra-needles.index') }}">
                    <i class="fa fa-plus-square menu-icon"></i> 
                    <span class="menu-text">Extra Needles</span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right">{{ \App\ExtraNeedle::count() }}</span>
                    </span>
                </a>
            </li>

            <li class="header">SYSTEM</li>

            <li class="menu-item">
                <a href="{{ route('users.index') }}">
                    <i class="fa fa-users"></i> 
                    <span class="menu-text">System Users</span>
                    <span class="pull-right-container">
                        <span class="label label-info pull-right">{{ \App\User::count() }}</span>
                    </span>
                </a>
            </li>
        </ul>
    </section>
</aside>

<style>
    .main-sidebar {
        background: #2c3e50;
        background: linear-gradient(to bottom, #34495e, #2c3e50);
    }

    .user-panel {
        padding: 15px;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .user-panel .info {
        padding: 5px 5px 5px 15px;
    }

    .username {
        font-weight: 600;
        color: #ecf0f1;
        margin-bottom: 3px;
    }

    .status {
        color: #b8c7ce;
        font-size: 11px;
    }

    .sidebar-menu {
        padding: 10px 0;
    }

    .sidebar-menu li.header {
        color: #b8c7ce;
        font-size: 12px;
        padding: 10px 25px 10px 15px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .menu-item {
        position: relative;
        margin: 0;
    }

    .menu-item > a {
        color: #b8c7ce;
        padding: 12px 15px;
        display: block;
        transition: all 0.3s;
        border-left: 3px solid transparent;
    }

    .menu-item > a:hover {
        color: #fff;
        background: rgba(0,0,0,0.2);
        border-left-color: #3498db;
    }

    .menu-item.active > a {
        color: #fff;
        background: rgba(0,0,0,0.3);
        border-left-color: #3c8dbc;
    }

    .menu-icon {
        width: 20px;
        margin-right: 10px;
        text-align: center;
    }

    .menu-text {
        font-weight: 500;
    }

    .pull-right-container {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
    }

    .label {
        font-size: 10px;
        font-weight: 600;
        padding: 3px 6px;
    }

    .sidebar-form {
        padding: 10px 15px;
    }

    .search-input {
        background: rgba(255,255,255,0.1);
        border: none;
        color: #fff;
    }

    .search-input::placeholder {
        color: rgba(255,255,255,0.5);
    }

    .treeview-menu {
        padding-left: 20px;
        background: rgba(0,0,0,0.1);
    }

    .treeview-menu li a {
        padding: 8px 15px;
        color: #b8c7ce;
    }

    .treeview-menu li a:hover {
        color: #fff;
    }
</style>

<script>
    // Highlight the active menu item based on current URL
    $(document).ready(function() {
        var currentUrl = window.location.href.split(/[?#]/)[0]; // Strip query/hash

        $('.sidebar-menu li.menu-item a').each(function() {
            if (this.href === currentUrl) {
                $(this).parent().addClass('active');
            }
        });
    });
</script>
