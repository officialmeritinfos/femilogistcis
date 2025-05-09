@extends('admin.base')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Deliveries</h6>
            <a href="{{ route('admin.delivery.new') }}" class="btn btn-outline-primary btn-sm">
                <i class="fa fa-plus-square"></i> Add New
            </a>
        </div>
        <div class="card-body">
            @include('templates.notification')
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Reference</th>
                        <th>Tracking ID</th>
                        <th>Sender</th>
                        <th>Receiver</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->reference }}</td>
                            <td>{{ $order->tracking_number }}</td>
                            <td>
                                {{ $order->sender_name }}<br>
                                <small>{{ $order->sender_email }}</small>
                            </td>
                            <td>
                                {{ $order->receiver_name }}<br>
                                <small>{{ $order->receiver_email }}</small>
                            </td>
                            <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                            <td>
                                @switch($order->status)
                                    @case('pending')
                                        <span class="badge badge-warning">Pending</span>
                                        @break
                                    @case('in-transit')
                                        <span class="badge badge-info">In Transit</span>
                                        @break
                                    @case('delivered')
                                        <span class="badge badge-success">Delivered</span>
                                        @break
                                    @case('cancelled')
                                        <span class="badge badge-secondary">Cancelled</span>
                                        @break
                                    @case('on-hold')
                                        <span class="badge badge-secondary">On Hold</span>
                                        @break
                                    @default
                                        <span class="badge badge-danger">Unknown</span>
                                @endswitch
                            </td>

                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.delivery.detail', ['reference' => $order->reference]) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.delivery.edit', $order->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.delivery.delete', $order->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this delivery?');">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
