<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Notification</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: #4CAF50;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }

        .header img {
            max-width: 150px;
            margin-bottom: 10px;
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

        .footer {
            text-align: center;
            background: #f1f1f1;
            padding: 15px;
            font-size: 12px;
            color: #777777;
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

            .header {
                padding: 15px;
            }

            .content {
                padding: 15px;
            }

            .footer {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
<div class="email-container">
    <!-- Header Section -->
    <div class="header">
        <img src="{{ asset('home/img/'.$web->logo) }}" alt="Company Logo">
        <h1>{{ $recipientType === 'sender' ? 'Delivery Confirmation' : 'Delivery Notification' }}</h1>
    </div>

    <!-- Content Section -->
    <div class="content">
        <h2>Dear {{ $recipientType === 'sender' ? $delivery->sender_name : $delivery->receiver_name }},</h2>
        <p>
            {{ $recipientType === 'sender'
            ? 'Thank you for using our delivery service! Your package details are as follows:'
            : 'We are pleased to inform you that a package is on its way to you. The details are as follows:' }}
        </p>

        <h3>Delivery Details:</h3>
        <ul>
            <li><strong>Reference:</strong> {{ $delivery->reference }}</li>
            <li><strong>Sender:</strong> {{ $delivery->sender_name }}</li>
            <li><strong>Receiver:</strong> {{ $delivery->receiver_name }}</li>
            <li><strong>Origin:</strong> {{ $delivery->origin }}</li>
            <li><strong>Destination:</strong> {{ $delivery->destination }}</li>
            <li><strong>Service:</strong> {{ $delivery->service }}</li>
            <li><strong>Package Description:</strong> {{ $delivery->package_description }}</li>
            <li><strong>Shipment Date:</strong> {{ $delivery->shipment_date ?? 'N/A' }}</li>
            <li><strong>Delivery Date:</strong> {{ $delivery->delivery_date ?? 'N/A' }}</li>
            <li><strong>Tracking Number:</strong> {{ $delivery->tracking_number ?? 'N/A' }}</li>
        </ul>

        <p>
            @if ($recipientType === 'sender')
                You can track your package using the tracking number provided above. If you have any questions, feel free to contact us.
            @else
                You can track your package using the tracking number provided above. If you have any questions, feel free to contact us.<br/>
                Please be available to receive your package at the destination. If you have any questions, feel free to contact us.
            @endif
        </p>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <p>Thank you for trusting us with your delivery needs.</p>
        <p>&copy; {{ date('Y') }} {{config('app.name')}}. All rights reserved.</p>
        <p><a href="{{ url('/') }}">Visit our website</a></p>
    </div>
</div>
</body>
</html>
