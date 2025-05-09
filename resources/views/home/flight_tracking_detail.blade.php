<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Tracking - {{ $flight->pnr }}</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            padding: 20px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #0047ba;
            color: #fff;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            text-align: center;
            font-size: 1.8rem;
            padding: 20px;
        }

        .flight-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .flight-info div {
            text-align: center;
        }

        .flight-info div h5 {
            margin-bottom: 5px;
            font-size: 1.2rem;
            color: #333;
        }

        .flight-info div p {
            margin: 0;
            color: #555;
            font-size: 0.95rem;
        }

        .status-badge {
            font-size: 14px;
            padding: 8px 20px;
            border-radius: 15px;
            text-transform: capitalize;
        }

        .badge-open {
            background-color: #28a745;
            color: #fff;
        }

        .badge-closed {
            background-color: #6c757d;
            color: #fff;
        }

        .badge-delayed {
            background-color: #ffc107;
            color: #333;
        }

        .badge-cancelled {
            background-color: #dc3545;
            color: #fff;
        }

        .details-section {
            padding: 20px;
        }

        .details-section h6 {
            font-weight: bold;
            color: #333;
        }

        .details-section p {
            margin: 0;
            color: #555;
        }

        .print-btn {
            display: inline-block;
            margin: 30px auto;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: #0047ba;
            color: #fff;
            border-radius: 10px;
        }

        .print-btn:hover {
            background-color: #003088;
        }

        @media print {
            .print-btn {
                display: none;
            }
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <!-- Flight Details Card -->
    <div class="card">
        <div class="card-header">
            Flight Tracking
        </div>
        <div class="card-body">
            <!-- Flight Overview -->
            <div class="flight-info">
                <div>
                    <h5>PNR</h5>
                    <p>{{ $flight->pnr }}</p>
                </div>
                <div>
                    <h5>Flight Number</h5>
                    <p>{{ $flight->flight_number }}</p>
                </div>
                <div>
                    <h5>Airline Number</h5>
                    <p>{{ $flight->airline_number }}</p>
                </div>
            </div>

            <!-- Flight Status -->
            <div class="text-center mb-4">
                    <span class="status-badge
                        {{ $flight->flight_status === 'open' ? 'badge-open' :
                           ($flight->flight_status === 'closed' ? 'badge-closed' :
                           ($flight->flight_status === 'delayed' ? 'badge-delayed' : 'badge-cancelled')) }}">
                        {{ $flight->flight_status }}
                    </span>
            </div>

            <!-- Passenger & Flight Details -->
            <div class="details-section row">
                <div class="col-md-6 mb-3">
                    <h6>Passenger Name:</h6>
                    <p>{{ $flight->passenger_name }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h6>Passenger Email:</h6>
                    <p>{{ $flight->passenger_email }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h6>Departure Airport:</h6>
                    <p>{{ $flight->departure_airport }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h6>Arrival Airport:</h6>
                    <p>{{ $flight->arrival_airport }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h6>Departure Time:</h6>
                    <p>{{ \Carbon\Carbon::parse($flight->departure_time)->format('d M Y, h:i A') }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h6>Arrival Time:</h6>
                    <p>{{ \Carbon\Carbon::parse($flight->arrival_time)->format('d M Y, h:i A') }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h6>Gate Number:</h6>
                    <p>{{ $flight->gate_number ?? 'Check Monitors' }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h6>Seat Number:</h6>
                    <p>{{ $flight->seat_number ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h6>Class:</h6>
                    <p>{{ ucfirst($flight->class) }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h6>Ticket Price:</h6>
                    <p>${{ number_format($flight->ticket_price, 2) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Print Button -->
    <div class="text-center">
        <a href="{{route('flight_tickets.print',['id'=>$flight->flight_number])}}" class="print-btn">Print</a>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    window.onload = function googleTranslateElementInit() {
        new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>
