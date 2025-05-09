@extends('admin.base')
@section('content')

    <div class="container">
        <!-- Delivery Details Section -->
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="text-center">Delivery Details</h4>
                <a href="{{ route('delivery.print', $delivery->reference) }}" target="_blank" class="btn btn-outline-success btn-sm">
                    <i class="fa fa-print"></i> Print
                </a>
            </div>
            <div class="card-body">
                @include('templates.notification')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6><strong>Reference:</strong> {{ $delivery->reference }}</h6>
                        <h6><strong>Tracking ID:</strong> {{ $delivery->tracking_number }}</h6>
                        <h6><strong>Sender Name:</strong> {{ $delivery->sender_name }}</h6>
                        <h6><strong>Sender Email:</strong> {{ $delivery->sender_email }}</h6>
                        <h6><strong>Receiver Name:</strong> {{ $delivery->receiver_name }}</h6>
                        <h6><strong>Receiver Email:</strong> {{ $delivery->receiver_email }}</h6>
                    </div>
                    <div class="col-md-6">
                        <h6><strong>Origin:</strong> {{ $delivery->origin }}</h6>
                        <h6><strong>Destination:</strong> {{ $delivery->destination }}</h6>
                        <h6><strong>Service:</strong> {{ $delivery->service }}</h6>
                        <h6><strong>Status:</strong> <span class="badge badge-info">{{ ucfirst($delivery->status) }}</span></h6>
                        <h6><strong>Package Description:</strong> {{ $delivery->package_description }}</h6>
                    </div>
                </div>
                @if($delivery->photo)
                    <div class="text-center mb-3">
                        <img src="{{ asset($delivery->photo) }}" alt="Delivery Image" class="img-thumbnail" style="max-height: 200px;">
                    </div>
                @endif
            </div>
        </div>

        <!-- Delivery Stages Section -->
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="text-center">Delivery Stages</h4>
                <a href="{{ route('admin.delivery.stage.new', $delivery->id) }}" class="btn btn-outline-primary btn-sm">
                    <i class="fa fa-plus"></i> Add Stage
                </a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($stages as $stage)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $stage->location }}</td>
                            <td>
                                @switch($stage->status)
                                    @case('picked-up')
                                        <span class="badge badge-primary">Picked Up</span>
                                        @break
                                    @case('in-transit')
                                        <span class="badge badge-info">In Transit</span>
                                        @break
                                    @case('out-for-delivery')
                                        <span class="badge badge-warning">Out for Delivery</span>
                                        @break
                                    @case('delivered')
                                        <span class="badge badge-success">Delivered</span>
                                        @break
                                    @default
                                        <span class="badge badge-secondary">Unknown</span>
                                @endswitch
                            </td>

                            <td>{{ $stage->remark }}</td>
                            <td>{{ $stage->created_at->format('d M Y, H:i') }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.delivery.stage.edit', $stage->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.delivery.stage.delete', $stage->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this stage?');">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No stages available</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
