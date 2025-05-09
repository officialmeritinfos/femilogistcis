<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Ticket Details</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: #4CAF50;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 22px;
        }

        .content {
            padding: 20px;
        }

        .content h2 {
            color: #333333;
            margin-top: 0;
        }

        .content p {
            margin: 10px 0;
            color: #555555;
        }

        .content ul {
            list-style: none;
            padding: 0;
        }

        .content ul li {
            margin: 5px 0;
            color: #333333;
        }

        .content ul li strong {
            color: #000000;
        }

        .button {
            display: inline-block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .button:hover {
            background-color: #45a049;
        }

        .footer {
            background: #f9f9f9;
            color: #777777;
            text-align: center;
            padding: 10px;
            font-size: 12px;
        }

        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }

        @media (max-width: 600px) {
            .email-container {
                width: 100%;
                border-radius: 0;
            }

            .header, .content, .footer {
                padding: 15px;
            }

            .header h1 {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
<div class="email-container">
    <!-- Header Section -->
    <div class="header">
        <h1>Flight Ticket Details</h1>
        <img src="{{ asset('home/img/'.$web->logo) }}" alt="Company Logo">
    </div>

    <!-- Content Section -->
    <div class="content">
        <h2>Dear {{ $ticket->passenger_name }},</h2>
        <p>Your flight ticket has been successfully {{ $ticket->wasRecentlyCreated ? 'booked' : 'updated' }}. Below are the details:</p>

        <h3>Ticket Information</h3>
        <ul>
            <li><strong>PNR:</strong> {{ $ticket->pnr }}</li>
            <li><strong>Flight Number:</strong> {{ $ticket->flight_number }}</li>
            <li><strong>Class:</strong> {{ ucfirst($ticket->class) }}</li>
            <li><strong>Seat Number:</strong> {{ $ticket->seat_number ?? 'Not assigned' }}</li>
            <li><strong>Gate Number:</strong> {{ $ticket->gate_number ?? 'Not assigned' }}</li>
            <li><strong>Ticket Price:</strong> ${{ number_format($ticket->ticket_price, 2) }}</li>
        </ul>

        <h3>Flight Information</h3>
        <ul>
            <li><strong>Departure Airport:</strong> {{ $ticket->departure_airport }}</li>
            <li><strong>Arrival Airport:</strong> {{ $ticket->arrival_airport }}</li>
            <li><strong>Departure Time:</strong> {{ \Carbon\Carbon::parse($ticket->departure_time)->format('d M Y, H:i') }}</li>
            <li><strong>Arrival Time:</strong> {{ \Carbon\Carbon::parse($ticket->arrival_time)->format('d M Y, H:i') }}</li>
            <li><strong>Flight Status:</strong> {{ ucfirst($ticket->flight_status) }}</li>
            <li><strong>Ticket Status:</strong> {{ ucfirst($ticket->status) }}</li>
        </ul>

        <p>You can view more details by logging into your account.</p>

        <a href="{{ route('admin.flight_tickets.show', $ticket->id) }}" class="button">View Ticket</a>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <p>&copy; {{ date('Y') }} {{config('app.name')}}. All rights reserved.</p>
        <p><a href="{{ url('/') }}">Visit our website</a></p>
    </div>
</div>
</body>
</html>
