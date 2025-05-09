@extends('user.base')

@section('content')

    <div class="card">
        <div class="card-body">
            @include('templates.notification')
            <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <p style="color: #7e8d9f;font-size: 20px;">Invoice <strong>ID: #{{$deposit->reference}}</strong></p>
                    </div>
                    <hr>
                </div>

                <div class="container">
                    <div class="col-md-12">
                        <div class="text-center">
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-xl-8">
                            <ul class="list-unstyled">
                                <li class="text-muted">To: <span style="color:#5d9fc5 ;">{{$user->name}}</span></li>
                                <li class="text-muted">{{$web->address}}</li>
                                <li class="text-muted"><i class="fas fa-phone"></i> {{$web->phone}}</li>
                            </ul>
                        </div>
                        <div class="col-xl-4">
                            <p class="text-muted">Invoice</p>
                            <ul class="list-unstyled">
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">ID:</span>#{{$deposit->reference}}</li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">Creation Date: </span>{{$deposit->created_at}}</li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i>
                                    <span class="me-1 fw-bold">Status:</span>
                                    @switch($deposit->status)
                                        @case(1)
                                        <span class="badge badge-success">Completed</span>
                                        @break
                                        @case(2)
                                        <span class="badge badge-info">Pending</span>
                                        @break
                                        @case(3)
                                        <span class="badge badge-danger">Cancelled</span>
                                        @break
                                        @default
                                        <span class="badge badge-dark">Partial Payment</span>
                                        @break
                                    @endswitch
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row justify-content-center table-responsive">
                        <table class="table table-striped table-borderless ">
                            <thead style="background-color:#84B0CA ;" class="text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Description</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Asset</th>
                                <th scope="col">Address</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Account Funding</td>
                                    <td>${{number_format($deposit->amount,2)}}</td>
                                    <td>{{$deposit->asset}}</td>
                                    <td>{{$deposit->details}}</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-xl-12 text-center text-info alert alert-primary">
                            @if($deposit->paymentMethod ==1)
                                <p>
                                    You are to send <b>{{number_format($deposit->cryptoAmount,5)}} {{$deposit->asset}}</b>
                                    to the address <b style="font-size:20px;" id="address">{{$deposit->details}}</b>.<br>
                                    Your account will be credited immediately your payment is received. Ensure you do not
                                    send less than tha above stated amount.
                                </p>
                            @else
                                <p>
                                    You are to send <b>${{number_format($deposit->amount,2)}} of {{$deposit->asset}}</b>
                                    to the address <b style="font-size:20px;" id="address">{{$deposit->details}}</b>.<br>
                                    After making payment, contact support for instant crediting.
                                </p>
                            @endif
                            <button class="btn btn-primary copy" data-clipboard-target="#address">Copy</button>
                        </div>
                    </div>
                    <hr>
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class=" text-center">--}}
{{--                                <a href="{{route('deposit.cancel',['id'=>$deposit->id])}}" class="btn btn-danger">Cancel</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>

@endsection
