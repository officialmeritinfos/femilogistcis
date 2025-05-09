@extends('user.base')

@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List</h6>
        </div>
        <div class="card-body">
            @include('templates.notification')
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Reference</th>
                        <th>Amount</th>
                        <th>Address</th>
                        <th>Asset</th>
                        <th>Date Requested</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($withdrawals as $withdrawal)
                        <tr>
                            <td>{{$withdrawal->reference}}</td>
                            <td>{{number_format($withdrawal->amount,2)}}</td>
                            <td>{{$withdrawal->details}}</td>
                            <td>{{$withdrawal->asset}}</td>
                            <td>{{$withdrawal->created_at}}</td>
                            <td>
                                @switch($withdrawal->status)
                                    @case(1)
                                    <span class="text-success">Completed</span>
                                    @break
                                    @case(2)
                                    <span class="text-info">Pending</span>
                                    @break
                                    @case(3)
                                    <span class="text-danger">Cancelled</span>
                                    @break
                                    @default
                                    <span class="text-warning">processing</span>
                                    @break
                                @endswitch
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$withdrawals->links()}}
            </div>
        </div>
    </div>

@endsection
