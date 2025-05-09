<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Delayed Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
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
            background-color: #dc3545;
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
            color: #333;
            margin-top: 0;
        }
        .content ul {
            list-style: none;
            padding: 0;
        }
        .content ul li {
            margin: 10px 0;
        }
        .content ul li strong {
            color: #000;
        }
        .button {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #dc3545;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }
        .footer {
            text-align: center;
            background-color: #f8f9fa;
            color: #6c757d;
            font-size: 12px;
            padding: 10px;
        }
        @media (max-width: 600px) {
            .email-container {
                width: 100%;
                border-radius: 0;
            }
            .header, .content {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="header">
        <img src="{{ asset('home/img/'.$web->logo) }}" alt="Company Logo">
        <h1>Flight Delayed Notification</h1>

    </div>
    <div class="content">
        <h2>Dear {{ $ticket->passenger_name }},</h2>
        <p>We regret to inform you that your flight has been delayed. Below are the details:</p>

        <h3>Flight Details</h3>
        <ul>
            <li><strong>PNR:</strong> {{ $ticket->pnr }}</li>
            <li><strong>Flight Number:</strong> {{ $ticket->flight_number }}</li>
            <li><strong>Departure Airport:</strong> {{ $ticket->departure_airport }}</li>
            <li><strong>Arrival Airport:</strong> {{ $ticket->arrival_airport }}</li>
            <li><strong>Original Departure Time:</strong> {{ $ticket->departure_time }}</li>
            <li><strong>Status:</strong> Delayed</li>
        </ul>

        <p>We apologize for the inconvenience. Please contact our support team for further assistance.</p>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} {{config('app.name')}}. All rights reserved.
    </div>
</div>
</body>
</html>
