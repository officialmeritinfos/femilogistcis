<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - Delivery Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #333333;
        }

        .header p {
            margin: 5px 0;
            color: #666666;
        }

        .details-section, .stages-section {
            margin-bottom: 20px;
        }

        .details-section table, .stages-section table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .details-section table th, .stages-section table th,
        .details-section table td, .stages-section table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .details-section table th, .stages-section table th {
            background-color: #f2f2f2;
        }

        .photo {
            text-align: center;
            margin: 20px 0;
        }

        .photo img {
            max-width: 100%;
            height: auto;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #777777;
        }

        .btn {
            display: inline-block;
            margin: 10px auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        @media print {
            .btn {
                display: none;
            }
        }
    </style>
</head>
<body>
<div class="invoice-container">
    <!-- Header -->
    <div class="header">
        <h1>Delivery Invoice</h1>
        <p>Invoice for Delivery Reference: <strong>{{ $delivery->reference }}</strong></p>
    </div>

    <!-- Delivery Details -->
    <div class="details-section">
        <h3>Delivery Details</h3>
        <table>
            <tr>
                <th>Tracking ID</th>
                <td>{{ $delivery->tracking_number }}</td>
            </tr>
            <tr>
                <th>Sender Name</th>
                <td>{{ $delivery->sender_name }}</td>
            </tr>
            <tr>
                <th>Sender Email</th>
                <td>{{ $delivery->sender_email }}</td>
            </tr>
            <tr>
                <th>Receiver Name</th>
                <td>{{ $delivery->receiver_name }}</td>
            </tr>
            <tr>
                <th>Receiver Email</th>
                <td>{{ $delivery->receiver_email }}</td>
            </tr>
            <tr>
                <th>Origin</th>
                <td>{{ $delivery->origin }}</td>
            </tr>
            <tr>
                <th>Destination</th>
                <td>{{ $delivery->destination }}</td>
            </tr>
            <tr>
                <th>Service</th>
                <td>{{ $delivery->service }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ ucfirst($delivery->status) }}</td>
            </tr>
            <tr>
                <th>Package Description</th>
                <td>{{ $delivery->package_description }}</td>
            </tr>
        </table>
    </div>

    <!-- Delivery Stages -->
    <div class="stages-section">
        <h3>Delivery Stages</h3>
        <div class="table table-responsive">
            <table>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @forelse($stages as $index => $stage)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $stage->location }}</td>
                        <td>{{ ucfirst($stage->status) }}</td>
                        <td>{{ $stage->remark }}</td>
                        <td>{{ $stage->created_at->format('d M Y, H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No stages available</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delivery Image -->
    @if($delivery->photo)
        <div class="photo">
            <img src="{{ asset($delivery->photo) }}" alt="Delivery Image">
        </div>
    @endif

    <!-- Print Button -->
    <div class="text-center">
        <a href="javascript:void(0);" class="btn" onclick="printPage()">Print</a>
    </div>
</div>

<!-- Footer -->
<div class="footer">
    <p>&copy; {{ date('Y') }} {{$settings->name}}. All rights reserved.</p>
</div>

<script>
    function printPage() {
        window.print();
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
