@extends('layouts.master')

@section('top')
    <style>
        /* Custom Dashboard Styles */
        .dashboard-card {
            border-radius: 18px !important;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
        }

        .dashboard-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: rgba(255, 255, 255, 0.3);
        }

        .dashboard-card .icon {
            transition: all 0.4s ease;
            opacity: 0.85;
        }

        .dashboard-card:hover .icon {
            transform: scale(1.1);
            opacity: 1;
        }

        .stat-value {
            font-weight: 700;
            font-size: 2.2rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .stat-label {
            font-size: 1.1rem;
            letter-spacing: 0.5px;
            opacity: 0.9;
        }

        .card-footer {
            background: rgba(0, 0, 0, 0.08) !important;
            border-top: none !important;
        }

        /* Color Adjustments */
        .bg-aqua {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
        }

        .bg-green {
            background: linear-gradient(135deg, #2eb82e, #33cc33);
        }

        .bg-yellow {
            background: linear-gradient(135deg, #ffcc00, #ff9900);
        }

        .bg-red {
            background: linear-gradient(135deg, #ff4d4d, #cc0000);
        }

        .bg-purple {
            background: linear-gradient(135deg, #bf80ff, #9933ff);
        }

        .bg-maroon {
            background: linear-gradient(135deg, #cc0066, #990033);
        }

        .bg-primary {
            background: linear-gradient(135deg, #0066cc, #003366);
        }

        .bg-teal {
            background: linear-gradient(135deg, #00cc99, #009973);
        }

        .bg-orange {
            background: linear-gradient(135deg, #ff9933, #ff6600);
        }

        .bg-pink {
            background: linear-gradient(135deg, #ff66b3, #ff3399);
        }

        .bg-indigo {
            background: linear-gradient(135deg, #6666ff, #3333cc);
        }

        .bg-lime {
            background: linear-gradient(135deg, #99cc00, #669900);
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Cards Grid -->
        <div class="row">
            <!-- Row 1 -->
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                <div class="small-box dashboard-card bg-aqua">
                    <div class="inner p-4">
                        <h3 class="stat-value">{{ \App\User::count() }}</h3>
                        <p class="stat-label">System Users</p>
                    </div>
                    <div class="icon p-4">
                        <i class="fa fa-user-secret fa-3x"></i>
                    </div>
                    <a href="/user" class="small-box-footer p-3">
                        More info <i class="fa fa-arrow-circle-right ml-2"></i>
                    </a>
                </div>
            </div>

            {{-- <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
            <div class="small-box dashboard-card bg-green">
                <div class="inner p-4">
                    <h3 class="stat-value">{{ \App\Category::count() }}</h3>
                    <p class="stat-label">Categories</p>
                </div>
                <div class="icon p-4">
                    <i class="fa fa-list fa-3x"></i>
                </div>
                <a href="{{ route('categories.index') }}" class="small-box-footer p-3">
                    More info <i class="fa fa-arrow-circle-right ml-2"></i>
                </a>
            </div>
        </div> --}}

            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                <div class="small-box dashboard-card bg-yellow">
                    <div class="inner p-4">
                        <h3 class="stat-value">{{ \App\Product::count() }}</h3>
                        <p class="stat-label">Products</p>
                    </div>
                    <div class="icon p-4">
                        <i class="fa fa-cubes fa-3x"></i>
                    </div>
                    <a href="{{ route('products.index') }}" class="small-box-footer p-3">
                        More info <i class="fa fa-arrow-circle-right ml-2"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                <div class="small-box dashboard-card bg-red">
                    <div class="inner p-4">
                        <h3 class="stat-value">{{ \App\Customer::count() }}</h3>
                        <p class="stat-label">Customers</p>
                    </div>
                    <div class="icon p-4">
                        <i class="fa fa-users fa-3x"></i>
                    </div>
                    <a href="{{ route('customers.index') }}" class="small-box-footer p-3">
                        More info <i class="fa fa-arrow-circle-right ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- Row 2 -->
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                <div class="small-box dashboard-card bg-purple">
                    <div class="inner p-4">
                        <h3 class="stat-value">{{ \App\Supplier::count() }}</h3>
                        <p class="stat-label">Suppliers</p>
                    </div>
                    <div class="icon p-4">
                        <i class="fa fa-signal fa-3x"></i>
                    </div>
                    <a href="{{ route('suppliers.index') }}" class="small-box-footer p-3">
                        More info <i class="fa fa-arrow-circle-right ml-2"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                <div class="small-box dashboard-card bg-maroon">
                    <div class="inner p-4">
                        <h3 class="stat-value">{{ \App\ProductMasuk::count() }}</h3>
                        <p class="stat-label">Total Purchases</p>
                    </div>
                    <div class="icon p-4">
                        <i class="fa fa-cart-plus fa-3x"></i>
                    </div>
                    <a href="{{ route('productsIn.index') }}" class="small-box-footer p-3">
                        More info <i class="fa fa-arrow-circle-right ml-2"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                <div class="small-box dashboard-card bg-primary">
                    <div class="inner p-4">
                        <h3 class="stat-value">{{ \App\ProductKeluar::count() }}</h3>
                        <p class="stat-label">Total Outgoing</p>
                    </div>
                    <div class="icon p-4">
                        <i class="fa fa-minus-circle fa-3x"></i>
                    </div>
                    <a href="{{ route('productsOut.index') }}" class="small-box-footer p-3">
                        More info <i class="fa fa-arrow-circle-right ml-2"></i>
                    </a>
                </div>
            </div>

            {{-- <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
            <div class="small-box dashboard-card bg-teal">
                <div class="inner p-4">
                    <h3 class="stat-value">0</h3>
                    <p class="stat-label">Inventory Value</p>
                </div>
                <div class="icon p-4">
                    <i class="fa fa-calculator fa-3x"></i>
                </div>
                <a href="#" class="small-box-footer p-3">
                    More info <i class="fa fa-arrow-circle-right ml-2"></i>
                </a>
            </div>
        </div> --}}

            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                <div class="small-box dashboard-card bg-orange">
                    <div class="inner p-4">
                        <h3 class="stat-value">{{ \App\MissingNeedle::count() }}</h3>
                        <p class="stat-label">Missing Needles</p>
                    </div>
                    <div class="icon p-4">
                        <i class="fa fa-search-minus fa-3x"></i>
                    </div>
                    <a href="{{ route('missing-needles.index') }}" class="small-box-footer p-3">
                        More info <i class="fa fa-arrow-circle-right ml-2"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                <div class="small-box dashboard-card bg-green">
                    <div class="inner p-4">
                        <h3 class="stat-value">{{ \App\BluntNeedle::count() }}</h3>
                        <p class="stat-label">Blunt Needles</p>
                    </div>
                    <div class="icon p-4">
                        <i class="fa fa-wrench fa-3x"></i>
                    </div>
                    <a href="{{ route('blunt-needles.index') }}" class="small-box-footer p-3">
                        More info <i class="fa fa-arrow-circle-right ml-2"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                <div class="small-box dashboard-card bg-teal">
                    <div class="inner p-4">
                        <h3 class="stat-value">{{ \App\BrokenNeedle::count() }}</h3>
                        <p class="stat-label">Broken Needles</p>
                    </div>
                    <div class="icon p-4">
                        <i class="fa fa-times-circle fa-3x"></i>
                    </div>
                    <a href="{{ route('broken-needles.index') }}" class="small-box-footer p-3">
                        More info <i class="fa fa-arrow-circle-right ml-2"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                <div class="small-box dashboard-card bg-lime">
                    <div class="inner p-4">
                        <h3 class="stat-value">{{ \App\ExtraNeedle::count() }}</h3>
                        <p class="stat-label">Extra Needles</p>
                    </div>
                    <div class="icon p-4">
                        <i class="fa fa-plus-circle fa-3x"></i>
                    </div>
                    <a href="{{ route('extra-needles.index') }}" class="small-box-footer p-3">
                        More info <i class="fa fa-arrow-circle-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
