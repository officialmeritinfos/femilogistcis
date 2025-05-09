@extends('admin.base')
@section('content')

    <div class="card">

        <div class="card-body">
            @include('templates.notification')
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Passenger Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Trip Type</th>
                        <th>Departure Date</th>
                        <th>Return Date</th>
                        <th>Departure Country</th>
                        <th>Destination Country</th>
                        <th>Class</th>
                        <th>Adults</th>
                        <th>Children</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $booking->name }}</td>
                            <td>{{ $booking->email }}</td>
                            <td>{{ $booking->phone }}</td>
                            <td>{{ ucfirst($booking->trip_type) }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->departure_date)->format('F j, Y') }}</td>
                            <td>{{ $booking->return_date ? \Carbon\Carbon::parse($booking->return_date)->format('F j, Y') : 'N/A' }}</td>
                            <td>{{ $booking->departure_country }}</td>
                            <td>{{ $booking->destination_country }}</td>
                            <td>{{ ucfirst($booking->class) }}</td>
                            <td>{{ $booking->number_of_adults }}</td>
                            <td>{{ $booking->number_of_children }}</td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="14" class="text-center">No Bookings found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            {{ $bookings->links() }}
        </div>
    </div>

@endsection
