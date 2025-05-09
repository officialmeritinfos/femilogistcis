@extends('user.base')
@section('content')
@inject('injected','App\Defaults\Custom')


    @foreach($promos as $promo)
        <div class="ui-kit-card mb-24">
            <h3>{{$promo->title}}</h3>
            <div class="alert alert-primary" role="alert">
                <h4 class="alert-heading">{{$promo->title}}</h4>
                {!! $promo->content !!}
                <div class="mt-3">
                    <a href="{{route('user.enrollPromo',['id'=>$promo->id])}}" class="btn btn-primary">Enroll</a>
                </div>
            </div>
        </div>
    @endforeach

@foreach($notifications as $notification)
    <div class="ui-kit-card mb-24">
        <h3>{{$notification->title}}</h3>
        <div class="alert alert-primary" role="alert">
            <h4 class="alert-heading">{{$notification->title}}</h4>
            {!! $notification->content !!}
        </div>
    </div>
@endforeach
    

    <div class="today-card-area pt-24" style="margin-top:-3rem;">
        <div class="container-fluid">
            @include('templates.notification')
            <div class="row justify-content-between">
                <div class="col-lg-3 col-sm-6 text-start col-6">
                    <div class="single-today-card d-flex align-items-center">
                        <a href="{{route('new_investment')}}" class="default-btn">Deposit</a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 text-end col-6">
                    <div class="single-today-card d-flex align-items-center">
                         <a href="{{route('new_withdrawal')}}" class="btn btn-primary rounded-pill">Withdraw</a>
                    </div>
                </div>
                
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-today-card d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="today">Account Balance</span>
                            <h6>${{number_format($user->profit,2)}}</h6>
                        </div>

                        <div class="flex-shrink-0 align-self-center">
                            <img src="{{asset('dashboard/user/images/icon/user.png')}}" alt="Images">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-3">
                    <div class="active-single-item single-today-card d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p>
                                <img src="{{asset('dashboard/user/images/icon/user-2.png')}}" alt="Images">
                                Ongoing Investments
                            </p>
                            <h6>
                                ${{number_format($ongoingInvestments,2)}}
                            </h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-3">
                    <div class="active-single-item single-today-card d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p>
                                <img src="{{asset('dashboard/user/images/icon/discount-2.png')}}" alt="Images">
                                Pending Deposits
                            </p>
                            <h6>${{number_format($pendingDeposit,2)}}</h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-3">
                    <div class="active-single-item single-today-card d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p>
                                <img src="{{asset('dashboard/user/images/icon/curser.png')}}" alt="Images">
                                Completed Investments
                            </p>

                            <h6>${{number_format($completedInvestments,2)}}</h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-3">
                    <div class="active-single-item single-today-card d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p>
                                <img src="{{asset('dashboard/user/images/icon/discount-2.png')}}" alt="Images">
                                Pending Withdrawals
                            </p>
                            <h6>${{number_format($pendingWithdrawal,2)}}</h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-3">
                    <div class="active-single-item single-today-card d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p>
                                <img src="{{asset('dashboard/user/images/icon/items.png')}}" alt="Images">
                                Completed Withdrawals
                            </p>
                            <h6> ${{number_format($withdrawals,2)}}</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-today-card d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="today">Today's Earning</span>
                            <h6>${{number_format($injected->userDailyEarning($user->id),2)}}</h6>
                        </div>

                        <div class="flex-shrink-0 align-self-center">
                            <img src="{{asset('dashboard/user/images/icon/discount.png')}}" alt="Images">
                        </div>
                    </div>
                </div>

                


                <!--<div class="col-lg-3 col-sm-6">-->
                <!--    <div class="single-today-card d-flex align-items-center">-->
                <!--        <div class="flex-grow-1">-->
                <!--            <span class="today">Bonus</span>-->
                <!--            <h6>${{number_format($user->bonus,2)}}</h6>-->
                <!--        </div>-->

                <!--        <div class="flex-shrink-0 align-self-center">-->
                <!--            <img src="{{asset('dashboard/user/images/icon/groop.png')}}" alt="Images">-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->

                <div class="col-lg-3 col-sm-6">
                    <div class="single-today-card d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="today">Referral Balance</span>
                            <h6>${{number_format($user->refBal,2)}}</h6>
                        </div>

                        <div class="flex-shrink-0 align-self-center">
                            <img src="{{asset('dashboard/user/images/icon/groop.png')}}" alt="Images">
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="single-today-card d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="today">Total Withdrawal</span>
                            <h6>${{number_format($user->withdrawals,2)}}</h6>
                        </div>

                        <div class="flex-shrink-0 align-self-center">
                            <img src="{{asset('dashboard/user/images/icon/discount.png')}}" alt="Images">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="overview-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7">
                    <div class="chart-wrap">
                        <div class="sales-overview d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h6 class="overview-content">
                                    Earning Overview
                                    <i class="ri-arrow-up-line"></i>
                                </h6>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <ul>
                                    <li>
                                        <span>This Month</span>
                                        <h6 class="this-month">${{number_format($injected->userCurrentMonthEarning($user->id),2)}}</h6>
                                    </li>
                                    <li>
                                        <span>Last Month</span>
                                        <h6>${{number_format($injected->userPreviousMonthEarning($user->id),2)}}</h6>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div id="ana_dash_1"></div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="active-user">
                        <div id="stacked-column-chart-2"></div>

                        <div class="active-user-content-wrap">
                            <h6 class="active-user-content">
                                Investment Overview
                                <i class="ri-arrow-up-line"></i>
                            </h6>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="latest-transaction-area">
        <div class="container-fluid">
            <div class="table-responsive" data-simplebar>
                <h5 class="mb-2">Most Recent Transactions</h5>
                <table class="table align-middle mb-0">
                    <thead>
                    <tr>
                        <th width="25%">ID</th>
                        <th width="25%">AMOUNT</th>
                        <th width="25%">DATE</th>
                        <th width="25%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($latests as $latest)
                        <tr>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        #{{$latest->reference}}
                                    </label>
                                </div>
                            </td>
                            <td>
                                {{number_format($latest->amount,2)}}
                            </td>
                            <td>
                                {{strtoupper(date('d M, Y - h:i a',strtotime($latest->created_at)))}}
                            </td>
                            <td>
                                <a href="{{route('invest_detail',['id'=>$latest->id])}}" class="read-more">
                                    View Details
                                    <i class="ri-arrow-right-s-line"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Link
            </h6>
        </div>
        <div class="card-body row">
            <div class="col-md-12 mx-auto">

                <div class="form-row">
                    <div class="form-group col-md-6 mx-auto">
                        <label for="inputEmail4">Referral Link</label>
                        <input type="text" class="form-control" id="inputEmail4"
                               value="{{route('register',['referral'=>$user->username])}}" readonly>
                    </div>
                </div>
                <div class="text-center mt-2">
                    <button  class="btn btn-primary copy"
                             data-clipboard-target="#inputEmail4">copy</button>
                </div>
            </div>
        </div>
    </div>
    <br><br>

    @push('js')
        <script>
            // Assuming you have a route named 'earnings.chart' that returns JSON data
            const earningsUrl = "{{ route('earnings.chart', ['userId' => $user->id]) }}";
            const withdrawalsUrl = "{{ route('withdrawals.chart', ['userId' => $user->id]) }}";

            // Fetch earnings data using AJAX
            Promise.all([fetch(earningsUrl), fetch(withdrawalsUrl)])
                .then(responses => Promise.all(responses.map(response => response.json())))
                .then(data => {
                    const earningsData = data[0];
                    const withdrawalsData = data[1];
                    // Create ApexCharts instance
                    const chart = new ApexCharts(document.querySelector("#ana_dash_1"), {
                        chart: {
                            height: 395,
                            type: "area",
                            stacked: !0,
                            toolbar: {
                                show: !1,
                                autoSelected: "zoom"
                            }
                        },
                        colors: [
                            "#7f26c6",
                            "#7f26c6"
                        ],
                        dataLabels: {
                            enabled: !1
                        },
                        stroke: {
                            curve: "smooth",
                            width: [1.5, 1.5],
                            dashArray: [0, 4],
                            lineCap: "round"
                        },
                        grid: {
                            padding: {
                                left: 0,
                                right: 0
                            },
                            strokeDashArray: 3
                        },
                        markers: {
                            size: 0,
                            hover: {
                                size: 0
                            }
                        },
                        series: [
                            {
                                name: "Earnings",
                                data: earningsData,
                            },
                            {
                                name: "Withdrawals",
                                data: withdrawalsData,
                            },
                        ],
                        xaxis: {
                            type: "datetime",
                            axisTicks: {
                                show: !0
                            }
                        },
                        fill: {
                            type: "gradient",
                            gradient: {
                                shadeIntensity: 1,
                                opacityFrom: 0,
                                opacityTo: 0,
                                stops: [0, 90, 100]
                            }
                        },
                        tooltip: {
                            x: {
                                format: "dd/MM/yy HH:mm"
                            }
                        },
                        legend: {
                            position: "bottom",
                            horizontalAlign: "right",
                            show: false
                        },
                    });

                    // Render the chart
                    chart.render();
                });

        </script>

        <script>
            // Assuming you have a route named 'earnings.chart' that returns JSON data
            const investmentUrl = "{{ route('investments.chart', ['userId' => $user->id]) }}";

            // Fetch earnings data using AJAX
            Promise.all([fetch(investmentUrl)])
                .then(responses => Promise.all(responses.map(response => response.json())))
                .then(data => {
                    const earningsData = data[0];
                    // Create ApexCharts instance
                    const chart = new ApexCharts(document.querySelector("#stacked-column-chart-2"), {
                        chart: {
                            height: 385,
                            type: "bar",
                            stacked: !0,
                            toolbar: {
                                show: !1
                            },
                            zoom: {
                                enabled: !0
                            }
                        },
                        plotOptions: {
                            bar: {
                                horizontal: !1,
                                columnWidth: "15%",
                                endingShape: "rounded"
                            }
                        },
                        dataLabels: {
                            enabled: !1
                        },
                        series: [
                            {
                                name: "Investments",
                                data: earningsData,
                            },
                        ],
                        xaxis: {
                            type: "datetime",
                            axisTicks: {
                                show: !0
                            }
                        },
                        colors: ["#ff9f43"],
                        legend: { position: "top"},
                        fill: { opacity: 1 },
                    });

                    // Render the chart
                    chart.render();
                });

        </script>

    @endpush
@endsection
