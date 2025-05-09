<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background-color: #4caf50;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .email-header img {
            max-width: 150px;
            height: auto;
            margin-bottom: 10px;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .email-body {
            padding: 20px;
        }
        .email-body p {
            font-size: 16px;
            line-height: 1.5;
            margin: 0 0 20px;
        }
        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .details-table th, .details-table td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }
        .details-table th {
            background-color: #f4f4f9;
            font-weight: bold;
        }
        .email-footer {
            background-color: #f4f4f9;
            text-align: center;
            padding: 10px;
            font-size: 14px;
            color: #555;
        }
        .email-footer a {
            color: #4caf50;
            text-decoration: none;
        }
        @media only screen and (max-width: 600px) {
            .email-body, .email-header {
                padding: 15px;
            }
            .email-header h1 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
<div class="email-container">
    <!-- Header Section -->
    <div class="email-header">
        <!-- Add Logo -->
        <img src="{{ asset('home/img/'.$web->logo) }}" alt="Company Logo">
        <h1>Booking Confirmation</h1>
        <p>Your booking request has been successfully received!</p>
    </div>

    <!-- Body Section -->
    <div class="email-body">
        <p>Dear {{ $booking->name }},</p>
        <p>
            Thank you for choosing our service for your travel needs. We have received your booking request and will process it shortly.
            Below are the details of your booking:
        </p>

        <!-- Booking Details Table -->
        <table class="details-table">
            <tr>
                <th>Trip Type</th>
                <td>{{ ucfirst($booking->trip_type) }}</td>
            </tr>
            <tr>
                <th>Departure Date</th>
                <td>{{ \Carbon\Carbon::parse($booking->departure_date)->format('F j, Y') }}</td>
            </tr>
            @if ($booking->return_date)
                <tr>
                    <th>Return Date</th>
                    <td>{{ \Carbon\Carbon::parse($booking->return_date)->format('F j, Y') }}</td>
                </tr>
            @endif
            <tr>
                <th>Class</th>
                <td>{{ $booking->class }}</td>
            </tr>
            <tr>
                <th>Number of Adults</th>
                <td>{{ $booking->number_of_adults }}</td>
            </tr>
            <tr>
                <th>Number of Children</th>
                <td>{{ $booking->number_of_children }}</td>
            </tr>
            <tr>
                <th>Departure Country</th>
                <td>{{ $booking->departure_country }}</td>
            </tr>
            <tr>
                <th>Destination Country</th>
                <td>{{ $booking->destination_country }}</td>
            </tr>
            <tr>
                <th>Nationality</th>
                <td>{{ $booking->nationality }}</td>
            </tr>
            <tr>
                <th>Contact Email</th>
                <td>{{ $booking->email }}</td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td>{{ $booking->phone }}</td>
            </tr>
        </table>

        <p>
            We will review your request and contact you shortly for any additional information. If you need to make any changes to your booking, please don't hesitate to reach out to us.
        </p>

        <p>Best regards,</p>
        <p>{{$web->name}} Team</p>
    </div>

    <!-- Footer Section -->
    <div class="email-footer">
        <p>For inquiries, please contact us at <a href="mailto:{{$web->email}}">{{$web->email}}</a>.</p>
        <p>&copy; {{ date('Y') }} Your Travel Company. All rights reserved.</p>
    </div>
</div>
</body>
</html>
