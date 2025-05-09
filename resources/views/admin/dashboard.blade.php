@extends('admin.base')

@section('content')


    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Packages Sent </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{$total_packages}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-gifts fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                               Total Completed Delivery </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                               {{$completed_packages}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-gifts fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total Pending Delivery </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                              {{$pending_packages}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-gifts fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                               Total Flights </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{$total_tickets}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-plane fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Completed Flights </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{$completed_flights}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-plane fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Pending Flights </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{$pending_flights}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-plane fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
