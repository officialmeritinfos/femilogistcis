@extends('admin.base')
@section('content')

    <div class="container">
        <div class="card mt-4">
            <div class="card-header text-center">
                <h4 class="mt-2">Edit Delivery Details</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.delivery.edit.process', ['id'=>$delivery->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('templates.notification')

                    <h4 class="mb-3">Sender Information</h4>
                    <div class="form-group">
                        <label for="sender_name">Sender Name</label>
                        <input type="text" name="sender_name" id="sender_name" class="form-control" value="{{ $delivery->sender_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="sender_address">Sender Address</label>
                        <input type="text" name="sender_address" id="sender_address" class="form-control" value="{{ $delivery->sender_address }}">
                    </div>
                    <div class="form-group">
                        <label for="sender_phone">Sender Phone</label>
                        <input type="text" name="sender_phone" id="sender_phone" class="form-control" value="{{ $delivery->sender_phone }}">
                    </div>
                    <div class="form-group">
                        <label for="sender_email">Sender Email</label>
                        <input type="email" name="sender_email" id="sender_email" class="form-control" value="{{ $delivery->sender_email }}">
                    </div>

                    <h4 class="mt-4 mb-3">Receiver Information</h4>
                    <div class="form-group">
                        <label for="receiver_name">Receiver Name</label>
                        <input type="text" name="receiver_name" id="receiver_name" class="form-control" value="{{ $delivery->receiver_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="receiver_address">Receiver Address</label>
                        <input type="text" name="receiver_address" id="receiver_address" class="form-control" value="{{ $delivery->receiver_address }}">
                    </div>
                    <div class="form-group">
                        <label for="receiver_phone">Receiver Phone</label>
                        <input type="text" name="receiver_phone" id="receiver_phone" class="form-control" value="{{ $delivery->receiver_phone }}">
                    </div>
                    <div class="form-group">
                        <label for="receiver_email">Receiver Email</label>
                        <input type="email" name="receiver_email" id="receiver_email" class="form-control" value="{{ $delivery->receiver_email }}">
                    </div>

                    <div class="form-group">
                        <label for="origin">Origin</label>
                        <input type="text" name="origin" id="origin" class="form-control" value="{{ $delivery->origin }}" required>
                    </div>
                    <div class="form-group">
                        <label for="destination">Destination</label>
                        <input type="text" name="destination" id="destination" class="form-control" value="{{ $delivery->destination }}" required>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo (optional)</label>
                        <input type="file" name="photo" id="photo" class="form-control">
                        @if($delivery->photo)
                            <img src="{{ asset(  $delivery->photo) }}" alt="Delivery Photo" class="img-thumbnail mt-2" style="max-height: 100px;">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="service">Service</label>
                        <input type="text" name="service" id="service" class="form-control" value="{{ $delivery->service }}" required>
                    </div>
                    <div class="form-group">
                        <label for="package_description">Package Description</label>
                        <textarea name="package_description" id="package_description" class="form-control" rows="3" required>{{ $delivery->package_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="package_fee">Package Fee</label>
                        <input type="number" step="0.01" name="package_fee" id="package_fee" class="form-control" value="{{ $delivery->package_fee }}">
                    </div>
                    <div class="form-group">
                        <label for="total_weight">Total Weight</label>
                        <input type="number" step="0.01" name="total_weight" id="total_weight" class="form-control" value="{{ $delivery->total_weight }}">
                    </div>
                    <div class="form-group">
                        <label for="shipment_date">Shipment Date</label>
                        <input type="date" name="shipment_date" id="shipment_date" class="form-control" value="{{ $delivery->shipment_date }}">
                    </div>
                    <div class="form-group">
                        <label for="delivery_date">Delivery Date</label>
                        <input type="date" name="delivery_date" id="delivery_date" class="form-control" value="{{ $delivery->delivery_date }}">
                    </div>
                    <div class="form-group">
                        <label for="shipment_mode">Shipment Mode</label>
                        <input type="text" name="shipment_mode" id="shipment_mode" class="form-control" value="{{ $delivery->shipment_mode }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="pending" {{ $delivery->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in-transit" {{ $delivery->status === 'in-transit' ? 'selected' : '' }}>In-Transit</option>
                            <option value="in-transit" {{ $delivery->status === 'on-hold' ? 'selected' : '' }}>On-Hold</option>
                            <option value="delivered" {{ $delivery->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                            <option value="cancelled" {{ $delivery->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success btn-lg w-100">Update Delivery</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
