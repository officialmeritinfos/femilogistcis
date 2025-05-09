<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Tracking - {{ $package->tracking_number }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="icon" type="image/png" href="{{asset('home/img/'.$web->logo)}}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #0047ba;
            color: #fff;
            text-align: center;
            font-size: 1.5rem;
        }

        .status-badge {
            font-size: 14px;
            padding: 5px 15px;
            border-radius: 15px;
        }

        .badge-pending {
            background-color: #ffc107;
            color: #000;
        }

        .badge-in-transit {
            background-color: #17a2b8;
        }

        .badge-delivered {
            background-color: #28a745;
        }

        .badge-cancelled {
            background-color: #dc3545;
        }

        .badge-on-hold {
            background-color: #6c757d;
        }

        .timeline {
            margin: 20px 0;
        }

        .timeline-item {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .timeline-item:not(:last-child)::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: -20px;
            width: 2px;
            height: 20px;
            background-color: #0047ba;
            transform: translateX(-50%);
        }

        .timeline-item h5 {
            font-size: 16px;
            margin: 0;
            color: #0047ba;
        }

        .timeline-item small {
            font-size: 12px;
            color: #555;
        }

        .timeline-item p {
            font-size: 14px;
            margin: 5px 0;
            color: #333;
        }

        .print-btn {
            display: inline-block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: #0047ba;
            color: #fff;
            border-radius: 5px;
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
    <!-- Package Details -->
    <div class="card">
        <div class="card-header text-center">
            <h4>Package Tracking Details</h4>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h6><strong>Tracking Number:</strong> {{ $package->tracking_number }}</h6>
                    <h6><strong>Reference:</strong> {{ $package->reference }}</h6>
                    <h6><strong>Sender Name:</strong> {{ $package->sender_name }}</h6>
                    <h6><strong>Sender Email:</strong> {{ $package->sender_email ?? 'N/A' }}</h6>
                    <h6><strong>Receiver Name:</strong> {{ $package->receiver_name }}</h6>
                    <h6><strong>Receiver Email:</strong> {{ $package->receiver_email ?? 'N/A' }}</h6>
                </div>
                <div class="col-md-6">
                    <h6><strong>Origin:</strong> {{ $package->origin }}</h6>
                    <h6><strong>Destination:</strong> {{ $package->destination }}</h6>
                    <h6><strong>Service:</strong> {{ ucfirst($package->service) }}</h6>
                    <h6><strong>Status:</strong>
                        <span class="status-badge
                                {{ $package->status === 'pending' ? 'badge-pending' :
                                   ($package->status === 'in-transit' ? 'badge-in-transit' :
                                   ($package->status === 'delivered' ? 'badge-delivered' :
                                   ($package->status === 'cancelled' ? 'badge-cancelled' : 'badge-on-hold'))) }}">
                                {{ ucfirst($package->status) }}
                            </span>
                    </h6>
                    <h6><strong>Shipment Mode:</strong> {{ $package->shipment_mode ?? 'N/A' }}</h6>
                    <h6><strong>Shipment Date:</strong> {{ $package->shipment_date ?? 'N/A' }}</h6>
                    <h6><strong>Delivery Date:</strong> {{ $package->delivery_date ?? 'N/A' }}</h6>
                </div>
            </div>
            @if($package->photo)
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8">
                        <img src="{{ asset($package->photo) }}" alt="Delivery Photo" class="img-fluid rounded shadow">
                    </div>
                </div>

            @endif
        </div>
    </div>


    <!-- Timeline Section -->
    <div class="card mt-4">
        <div class="card-header">
            <h4>Delivery Timeline</h4>
        </div>
        <div class="card-body">
            <div class="timeline">
                @forelse($stages as $stage)
                    <div class="timeline-item">
                        <h5>{{ ucfirst($stage->status) }}</h5>
                        <small>{{ $stage->created_at->format('d M Y, h:i A') }}</small>
                        <p><strong>Location:</strong> {{ $stage->location }}</p>
                        <p><strong>Remarks:</strong> {{ $stage->remark ?? 'No remarks' }}</p>
                    </div>
                @empty
                    <p class="text-center">No delivery stages available for this package.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Print Button -->
    <div class="text-center">
        <a href="{{route('delivery.print',['id'=>$package->reference])}}" class="print-btn" >Print</a>
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
