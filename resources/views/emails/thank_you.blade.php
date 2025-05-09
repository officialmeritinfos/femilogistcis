<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Flying with Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
            background-color: #28a745;
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
        .footer {
            text-align: center;
            background-color: #f8f9fa;
            color: #6c757d;
            font-size: 12px;
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="header">
        <h1>Thank You for Flying with Us!</h1>
    </div>
    <div class="content">
        <h2>Dear {{ $ticket->passenger_name }},</h2>
        <p>We are delighted to inform you that your journey with us has been successfully completed. Thank you for choosing us as your travel partner!</p>

        <h3>Flight Details</h3>
        <ul>
            <li><strong>PNR:</strong> {{ $ticket->pnr }}</li>
            <li><strong>Flight Number:</strong> {{ $ticket->flight_number }}</li>
            <li><strong>Departure:</strong> {{ $ticket->departure_airport }}</li>
            <li><strong>Arrival:</strong> {{ $ticket->arrival_airport }}</li>
            <li><strong>Class:</strong> {{ ucfirst($ticket->class) }}</li>
        </ul>

        <p>We hope you had a pleasant experience. We look forward to serving you again in the future.</p>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} {{config('app.name')}}. All rights reserved.
    </div>
</div>
</body>
</html>
