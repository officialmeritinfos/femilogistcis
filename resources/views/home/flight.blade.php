@extends('home.base')
@section('content')
    <!-- Page Title Start -->
    <div class="page-title title-bg-1">
        <div class="container">
            <div class="title-text text-center">
                <h2>{{$pageName}}</h2>
                <ul>
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li>{{$pageName}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Title End -->

    <!-- Service Details Section Start -->
    <section class="service-details-area pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="service-post-area">
                        <div class="service-details-img">
                            <img src="{{asset('home/img/Flight_Tracking_Solution_Map.jpg')}}" alt="service details image">
                        </div>
                        <h2>{{$pageName}}</h2>
                        <p>
                            Stay informed and in control with <span class="highlight">{{$siteName}}</span>'s advanced Flight Tracking Services. Whether you’re a traveler, a family member, or a business awaiting cargo, our real-time flight tracking tools ensure you have accurate and up-to-date information at your fingertips.
                        </p>

                        <!-- Why Choose Our Flight Tracking Services -->
                        <div class="section">
                            <h2>Why Use {{$siteName}} Flight Tracking?</h2>
                            <p>
                                Our Flight Tracking Services are designed to keep you informed and prepared. Here’s what sets us apart:
                            </p>
                            <ul>
                                <li><strong>Real-Time Updates:</strong> Get live information on flight status, departure, arrival, delays, and cancellations.</li>
                                <li><strong>Global Coverage:</strong> Track flights across the globe, whether domestic or international.</li>
                                <li><strong>Easy Access:</strong> Search flights using PNR codes, flight numbers, or airline details for quick and accurate results.</li>
                                <li><strong>Notifications:</strong> Receive instant alerts for changes to flight schedules, delays, or gate assignments.</li>
                                <li><strong>User-Friendly Interface:</strong> Our intuitive platform makes flight tracking simple and stress-free.</li>
                            </ul>
                        </div>

                        <!-- Features and Benefits -->
                        <div class="section">
                            <h2>Features and Benefits</h2>
                            <p>With {{$siteName}} Flight Tracking, you’ll enjoy the following features:</p>
                            <ul>
                                <li><strong>Interactive Map:</strong> Visualize flight paths and locations on an interactive world map.</li>
                                <li><strong>Multi-Flight Tracking:</strong> Monitor multiple flights simultaneously for businesses or families.</li>
                                <li><strong>Cargo and Freight Monitoring:</strong> Track shipments in transit, ensuring timely deliveries and updates.</li>
                                <li><strong>Weather Integration:</strong> Get real-time weather updates that could affect flight schedules.</li>
                                <li><strong>Historical Data:</strong> Access past flight records for planning or analysis.</li>
                            </ul>
                        </div>

                        <!-- How It Works -->
                        <div class="section">
                            <h2>How It Works</h2>
                            <p>Tracking a flight with {{$siteName}} is quick and easy:</p>
                            <ol>
                                <li><strong>Enter Flight Details:</strong> Use your PNR code, flight number, or airline name to search for your flight.</li>
                                <li><strong>View Real-Time Data:</strong> Access live information, including the flight’s current location, status, and estimated arrival time.</li>
                                <li><strong>Set Alerts:</strong> Enable notifications for updates on flight changes, delays, or cancellations.</li>
                                <li><strong>Stay Informed:</strong> Receive regular updates on flight progress and any disruptions.</li>
                            </ol>
                        </div>


                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
