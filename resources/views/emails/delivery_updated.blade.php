<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Update Notification</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #4CAF50;
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
            font-size: 18px;
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
            background-color: #f1f1f1;
            color: #777777;
            text-align: center;
            padding: 10px 20px;
            font-size: 12px;
        }

        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }

        @media (max-width: 600px) {
            .email-container {
                width: 100%;
            }

            .content {
                padding: 15px;
            }

            .footer {
                font-size: 10px;
            }
        }
    </style>
</head>
<body>
<div class="email-container">
    <!-- Header Section -->
    <div class="header">
        <img src="{{ asset('home/img/'.$web->logo) }}" alt="Company Logo">
        <h1>Delivery Update Notification</h1>
    </div>

    <!-- Content Section -->
    <div class="content">
        <h2>Dear {{ $recipientType === 'sender' ? $delivery->sender_name : $delivery->receiver_name }},</h2>
        <p>
            {{ $recipientType === 'sender'
            ? 'We wanted to let you know that your delivery details have been updated.'
            : 'The package being sent to you has updated details.' }}
        </p>

        <h3>Updated Delivery Details:</h3>
        <ul>
            <li><strong>Reference:</strong> {{ $delivery->reference }}</li>
            <li><strong>Tracking ID:</strong> {{ $delivery->tracking_number }}</li>
            <li><strong>Sender:</strong> {{ $delivery->sender_name }}</li>
            <li><strong>Receiver:</strong> {{ $delivery->receiver_name }}</li>
            <li><strong>Origin:</strong> {{ $delivery->origin }}</li>
            <li><strong>Destination:</strong> {{ $delivery->destination }}</li>
            <li><strong>Status:</strong> {{ ucfirst($delivery->status) }}</li>
        </ul>

        <p>
            If you have any questions, feel free to reach out to our support team. Thank you for choosing our delivery service.
        </p>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <p>&copy; {{ date('Y') }} {{config('app.name')}}. All rights reserved.</p>
        <p><a href="{{url('/')}}">Visit our website</a></p>
    </div>
</div>
</body>
</html>
