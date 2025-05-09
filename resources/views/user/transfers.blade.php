@extends('user.base')
@section('content')
    @inject('injected','App\Defaults\Custom')

    <div class="today-card-area pt-24">
        <div class="container-fluid">
            @include('templates.notification')
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-today-card d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="today">Account Balance</span>
                            <h6>${{number_format($user->balance,2)}}</h6>
                        </div>

                        <div class="flex-shrink-0 align-self-center">
                            <img src="{{asset('dashboard/user/images/icon/discount.png')}}" alt="Images">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 mx-auto">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">{{$pageName}}</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="post"  action="{{route('transfer.new')}}">
                        @csrf
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Recipient username</label>
                            <input type="text" class="form-control" id="inputAddress2"
                                   placeholder="Enter Recipient username" name="username">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Amount ($)</label>
                            <input type="number" class="form-control" id="inputAddress2"
                                   placeholder="Enter Amount to Deposit" name="amount">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Account Password</label>
                            <input type="password" class="form-control" id="inputAddress2"
                                   placeholder="Enter Amount to Deposit" name="password">
                        </div>
                        <div class="form-group col-md-12">
                            <p>Transfer Charges: {{$web->transferCharge}}%</p>
                        </div>
                        @if($user->canLoan==1)
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Proceed</button>
                        </div>
                        @else
                        <div class="text-center text-danger">
                            <p>Transfer is disabled. Please contact support for more information.</p>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid mt-5">
        <div class="ui-kit-cards grid mb-24">
            <h3>Basic Table</h3>

            <div class="latest-transaction-area">
                <div class="table-responsive h-auto" data-simplebar>
                    <table class="table align-middle mb-0">
                        <thead>
                        <tr>
                            <th scope="col">RECIPIENT USERNAME</th>
                            <th scope="col">SENDER USERNAME</th>
                            <th scope="col">AMOUNT</th>
                            <th scope="col">SENT AT</th>
                            <th scope="col">STATUS</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transfers as $account)
                            <tr>
                                <td>{{$account->recipientHolder}}</td>
                                <td>{{$injected->getInvestorUsername($account->sender)}}</td>
                                <td>${{number_format($account->amount,2)}}</td>
                                <td>{{$account->created_at}}</td>
                                <td>
                                    @switch($account->status)
                                        @case(1)
                                            <span class="badge bg-success">Completed</span>
                                            @break
                                        @case(2)
                                            <span class="badge bg-info">Pending</span>
                                            @break
                                        @case(4)
                                            <span class="badge bg-primary">Ongoing</span>
                                            @break
                                        @default
                                            <span class="badge bg-danger">Cancelled</span>
                                            @break
                                    @endswitch
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
