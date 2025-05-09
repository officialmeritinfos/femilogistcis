@extends('admin.base')
@section('content')

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Flight Tickets</h4>
            <a href="{{ route('admin.flight_tickets.create') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> Add Ticket
            </a>
        </div>
        <div class="card-body">
            @include('templates.notification')
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>PNR</th>
                        <th>Passenger Name</th>
                        <th>Airline Number</th>
                        <th>Flight Number</th>
                        <th>Departure</th>
                        <th>Arrival</th>
                        <th>Class</th>
                        <th>Status</th>
                        <th>Flight Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($tickets as $ticket)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ticket->pnr }}</td>
                            <td>{{ $ticket->passenger_name }}</td>
                            <td>{{ $ticket->airline_number }}</td>
                            <td>{{ $ticket->flight_number }}</td>
                            <td>{{ $ticket->departure_airport }}</td>
                            <td>{{ $ticket->arrival_airport }}</td>
                            <td>{{ ucfirst($ticket->class) }}</td>
                            <td>
                            <span class="badge {{ $ticket->status === 'booked' ? 'badge-success' : ($ticket->status === 'cancelled' ? 'badge-danger' : 'badge-secondary') }}">
                                {{ ucfirst($ticket->status) }}
                            </span>
                            </td>
                            <td>
                            <span class="badge
                            {{ $ticket->flight_status === 'open' ? 'badge-info' :
                               ($ticket->flight_status === 'closed' ? 'badge-dark' :
                               ($ticket->flight_status === 'delayed' ? 'badge-warning' : 'badge-danger')) }}">
                                {{ ucfirst($ticket->flight_status) }}
                            </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.flight_tickets.show', $ticket->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i> View
                                </a>
                                <a href="{{ route('admin.flight_tickets.edit', $ticket->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <!-- Delete Button -->
                                <form action="{{ route('admin.flight_tickets.destroy', $ticket->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this ticket?');">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center">No tickets found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            {{ $tickets->links() }}
        </div>
    </div>

@endsection
