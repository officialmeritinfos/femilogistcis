<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Ticket - {{ $ticket->pnr }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 10px;
        }

        .ticket-container {
            max-width: 850px;
            margin: auto;
            background-color: #fff;
            border: 1px solid #000;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #0047ba;
            color: #fff;
            padding: 15px;
            font-size: 18px;
            flex-wrap: wrap;
        }

        .header img {
            height: 40px;
            margin-bottom: 10px;
        }

        .sub-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            font-size: 14px;
            text-align: right;
            border-bottom: 2px dashed #000;
            background-color: #f9f9f9;
        }


        .main-content {
            padding: 20px;
        }

        .details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }

        .details div {
            width: 30%;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .details div h4 {
            margin: 0;
            font-size: 14px;
            color: #555;
        }

        .details div p {
            margin: 5px 0;
            font-size: 16px;
            color: #000;
            font-weight: bold;
        }

        .barcode {
            text-align: center;
            margin: 20px 0;
        }

        .barcode img,
        #barcode {
            width: 80%;
            height: auto;
        }

        .footer {
            background-color: #f5f5f5;
            padding: 15px;
            font-size: 12px;
            color: #555;
            text-align: center;
        }

        .important-reminders {
            padding: 20px;
            border-top: 2px dashed #000;
        }

        .important-reminders h4 {
            font-size: 16px;
            margin-bottom: 10px;
            color: #0047ba;
        }

        .important-reminders ul {
            list-style: none;
            padding: 0;
            font-size: 12px;
            color: #555;
        }

        .important-reminders ul li {
            margin-bottom: 8px;
        }

        @media screen and (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
            }

            .details {
                flex-direction: column;
            }

            .details div {
                width: 100%;
                text-align: center;
            }

            .barcode img,
            #barcode {
                width: 90%;
            }
        }

        @media screen and (max-width: 480px) {
            .header {
                font-size: 16px;
            }

            .sub-header {
                font-size: 12px;
            }

            .details div p {
                font-size: 14px;
            }

            .important-reminders h4 {
                font-size: 14px;
            }

            .important-reminders ul li {
                font-size: 11px;
            }
        }

        @media print {
            .print-btn {
                display: none;
            }
        }

        .print-btn {
            display: block;
            width: 150px;
            margin: 20px auto;
            padding: 10px;
            background-color: #0047ba;
            color: #fff;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
        }

        .print-btn:hover {
            background-color: #003088;
        }
    </style>
</head>
<body>
<div class="ticket-container">
    <!-- Header -->
    <div class="header">
        <img src="{{asset('home/img/'.$settings->logo)}}" alt="Airline Logo">
        <span>Passenger Copy</span>
    </div>

    <!-- Sub-header -->
    <div class="sub-header">

        <span style="text-align: right">
            Sequence Number: {{str_pad($ticket->id,9,0,2)}}
        </span>

        <span style="text-align: left">
            PNR: {{ $ticket->pnr }}
        </span>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="details">
            <div>
                <h4>Passenger Name:</h4>
                <p>{{ strtoupper($ticket->passenger_name) }}</p>
            </div>
            <div>
                <h4>Flight Number:</h4>
                <p>{{ $ticket->flight_number }}</p>
            </div>
            <div>
                <h4>Class:</h4>
                <p>{{ ucfirst($ticket->class) }}</p>
            </div>
        </div>

        <div class="details">
            <div>
                <h4>From:</h4>
                <p>{{ $ticket->departure_airport }}</p>
            </div>
            <div>
                <h4>To:</h4>
                <p>{{ $ticket->arrival_airport }}</p>
            </div>
            <div>
                <h4>Seat:</h4>
                <p>{{ $ticket->seat_number ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="details">
            <div>
                <h4>Departure:</h4>
                <p>{{ \Carbon\Carbon::parse($ticket->departure_time)->format('d M Y, H:i A') }}</p>
            </div>
            <div>
                <h4>Arrival:</h4>
                <p>{{ \Carbon\Carbon::parse($ticket->arrival_time)->format('d M Y, H:i A') }}</p>
            </div>
            <div>
                <h4>Gate:</h4>
                <p>{{ $ticket->gate_number ?? 'Check Monitors' }}</p>
            </div>
        </div>

        <div class="barcode">
            <svg id="barcode"></svg>
        </div>
    </div>

    <!-- Important Reminders -->
    <div class="important-reminders">
        <h4>Important Reminders</h4>
        <ul>
            <li>Boarding gates close 15 minutes before departure.</li>
            <li>Ensure to check in on time to avoid delays.</li>
            <li>Keep your boarding pass handy for verification.</li>
        </ul>
    </div>
</div>

<!-- Print Button -->
<a href="javascript:void(0);" class="print-btn">Print Ticket</a>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.6/dist/JsBarcode.all.min.js"></script>
<script>
    JsBarcode("#barcode", "{{$ticket->pnr}}");
</script>
<script>
    function handlePrint() {
        // Hide the print button
        const printButton = document.querySelector('.print-btn');
        printButton.style.display = 'none';

        // Trigger the print dialog
        window.print();

        // Optional: Show the button back after printing (comment out if not needed)
        setTimeout(() => {
            printButton.style.display = 'block';
        }, 1000);
    }

    // Attach the `handlePrint` function to the button
    document.querySelector('.print-btn').addEventListener('click', handlePrint);
</script>
</body>
</html>
