@extends('admin.base')
@section('content')

    <div class="card">
        <div class="card-header">
            <h4>Create Flight Ticket</h4>
        </div>
        <div class="card-body">
            @include('templates.notification')
            <form action="{{ route('admin.flight_tickets.store') }}" method="POST">
                @csrf

                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="airline_number">Airline Number</label>
                            <input type="text" name="airline_number" id="airline_number" class="form-control" value="{{ old('airline_number') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="departure_airport">Departure Airport</label>
                            <input type="text" name="departure_airport" id="departure_airport" class="form-control" value="{{ old('departure_airport') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="arrival_airport">Arrival Airport</label>
                            <input type="text" name="arrival_airport" id="arrival_airport" class="form-control" value="{{ old('arrival_airport') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="departure_time">Departure Time</label>
                            <input type="datetime-local" name="departure_time" id="departure_time" class="form-control" value="{{ old('departure_time') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="arrival_time">Arrival Time</label>
                            <input type="datetime-local" name="arrival_time" id="arrival_time" class="form-control" value="{{ old('arrival_time') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="class">Class</label>
                            <select name="class" id="class" class="form-control" required>
                                <option value="economy" {{ old('class') == 'economy' ? 'selected' : '' }}>Economy</option>
                                <option value="business" {{ old('class') == 'business' ? 'selected' : '' }}>Business</option>
                                <option value="first" {{ old('class') == 'first' ? 'selected' : '' }}>First</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ticket_price">Ticket Price</label>
                            <input type="number" step="0.01" name="ticket_price" id="ticket_price" class="form-control" value="{{ old('ticket_price') }}" required>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="passenger_name">Passenger Name</label>
                            <input type="text" name="passenger_name" id="passenger_name" class="form-control" value="{{ old('passenger_name') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="passenger_email">Passenger Email</label>
                            <input type="email" name="passenger_email" id="passenger_email" class="form-control" value="{{ old('passenger_email') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="passenger_phone">Passenger Phone</label>
                            <input type="text" name="passenger_phone" id="passenger_phone" class="form-control" value="{{ old('passenger_phone') }}">
                        </div>

                        <div class="form-group">
                            <label for="seat_number">Seat Number</label>
                            <input type="text" name="seat_number" id="seat_number" class="form-control" value="{{ old('seat_number') }}">
                        </div>

                        <div class="form-group">
                            <label for="gate_number">Gate Number</label>
                            <input type="text" name="gate_number" id="gate_number" class="form-control" value="{{ old('gate_number') }}">
                        </div>

                        <div class="form-group">
                            <label for="flight_status">Flight Status</label>
                            <select name="flight_status" id="flight_status" class="form-control" required>
                                <option value="open" {{ old('flight_status') == 'open' ? 'selected' : '' }}>Open</option>
                                <option value="closed" {{ old('flight_status') == 'closed' ? 'selected' : '' }}>Closed</option>
                                <option value="delayed" {{ old('flight_status') == 'delayed' ? 'selected' : '' }}>Delayed</option>
                                <option value="cancelled" {{ old('flight_status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="booked" {{ old('status') == 'booked' ? 'selected' : '' }}>Booked</option>
                                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Create Ticket</button>
                </div>
            </form>
        </div>
    </div>

@endsection
