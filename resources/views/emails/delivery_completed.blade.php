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

        .header img {
            max-width: 150px;
            margin-bottom: 10px;
        }

        .header h1 {
            margin: 0;
            font-size: 20px;
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
        <img src="{{ asset('home/img/'.$web->logo) }}" alt="Company Logo">
        <h1>Delivery Status Update</h1>
    </div>

    <!-- Content Section -->
    <div class="content">
        <h2>
            {{ $recipientType === 'sender'
                ? 'Your Package Has Been Delivered!'
                : 'A Package Has Been Delivered to You!' }}
        </h2>
        <p>
            {{ $recipientType === 'sender'
                ? 'We are pleased to inform you that your package has been successfully delivered to the recipient.'
                : 'We are pleased to inform you that a package addressed to you has been successfully delivered.' }}
        </p>

        <h3>Delivery Details:</h3>
        <ul>
            <li><strong>Reference:</strong> {{ $delivery->reference }}</li>
            <li><strong>Tracking ID:</strong> {{ $delivery->tracking_number }}</li>
            <li><strong>Origin:</strong> {{ $delivery->origin }}</li>
            <li><strong>Destination:</strong> {{ $delivery->destination }}</li>
            <li><strong>Status:</strong> Delivered</li>
        </ul>

        <p>Thank you for choosing our service! If you have any questions, feel free to reach out to our support team.</p>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <p>&copy; {{ date('Y') }} {{config('app.name')}}. All rights reserved.</p>
        <p><a href="{{ url('/') }}">Visit our website</a></p>
    </div>
</div>
</body>
</html>
