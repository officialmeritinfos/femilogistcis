@extends('user.base')

@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Reference</th>
                        <th>Amount</th>
                        <th>Asset</th>
                        <th>Deposit Ref</th>
                        <th>Date Initiated</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($deposits as $deposit)
                        <tr>
                            <td>{{$deposit->reference}}</td>
                            <td>{{number_format($deposit->amount,2)}}</td>
                            <td>{{$deposit->asset}}</td>
                            <td>{{$deposit->paymentRef}}</td>
                            <td>{{$deposit->created_at}}</td>
                            <td>
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
                            </td>
                            <td>
                                <a href="{{route('deposit_detail',['id'=>$deposit->id])}}" class="btn btn-primary">
                                    <i class="fa fa-eye"></i> View Details
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Reference</th>
                            <th>Amount</th>
                            <th>Asset</th>
                            <th>Deposit Ref</th>
                            <th>Date Initiated</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection
