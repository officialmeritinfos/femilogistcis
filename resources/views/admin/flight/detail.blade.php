@extends('admin.base')
@section('content')

    <div class="card mt-4">
        <div class="card-header">
            <h4>View Ticket - {{ $ticket->pnr }}</h4>
        </div>
        <div class="card-body">
            @include('templates.notification')

            <div class="row">
                <!-- Passenger Information -->
                <div class="col-md-6">
                    <h5>Passenger Information</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Name:</strong> {{ $ticket->passenger_name }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $ticket->passenger_email }}</li>
                        <li class="list-group-item"><strong>Phone:</strong> {{ $ticket->passenger_phone ?? 'N/A' }}</li>
                    </ul>
                </div>

                <!-- Flight Details -->
                <div class="col-md-6">
                    <h5>Flight Details</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Airline Number:</strong> {{ $ticket->airline_number }}</li>
                        <li class="list-group-item"><strong>Flight Number:</strong> {{ $ticket->flight_number }}</li>
                        <li class="list-group-item"><strong>Class:</strong> {{ ucfirst($ticket->class) }}</li>
                        <li class="list-group-item"><strong>Seat Number:</strong> {{ $ticket->seat_number ?? 'N/A' }}</li>
                        <li class="list-group-item"><strong>Gate Number:</strong> {{ $ticket->gate_number ?? 'N/A' }}</li>
                    </ul>
                </div>
            </div>

            <div class="row mt-4">
                <!-- Departure and Arrival Information -->
                <div class="col-md-6">
                    <h5>Departure Information</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Airport:</strong> {{ $ticket->departure_airport }}</li>
                        <li class="list-group-item"><strong>Time:</strong> {{ \Carbon\Carbon::parse($ticket->departure_time)->format('d M Y, H:i') }}</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5>Arrival Information</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Airport:</strong> {{ $ticket->arrival_airport }}</li>
                        <li class="list-group-item"><strong>Time:</strong> {{ \Carbon\Carbon::parse($ticket->arrival_time)->format('d M Y, H:i') }}</li>
                    </ul>
                </div>
            </div>

            <!-- Ticket Status -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <h5>Status</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Ticket Status:</strong>
                            <span class="badge {{ $ticket->status === 'booked' ? 'badge-success' : ($ticket->status === 'cancelled' ? 'badge-danger' : 'badge-secondary') }}">
                            {{ ucfirst($ticket->status) }}
                        </span>
                        </li>
                        <li class="list-group-item"><strong>Flight Status:</strong>
                            <span class="badge {{ $ticket->flight_status === 'open' ? 'badge-info' : ($ticket->flight_status === 'delayed' ? 'badge-warning' : 'badge-danger') }}">
                            {{ ucfirst($ticket->flight_status) }}
                        </span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Print Button -->
            <div class="text-center mt-4">
                <a href="{{ route('flight_tickets.print', $ticket->flight_number) }}" class="btn btn-primary" target="_blank">
                    <i class="fa fa-print"></i> Print Ticket
                </a>
            </div>
        </div>
    </div>

@endsection
