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
                            <img src="{{asset('home/img/travel.png')}}" alt="service details image">
                        </div>
                        <h2>{{$pageName}}</h2>
                        <p>
                            At <span class="highlight">{{$siteName}}</span>, we specialize in creating seamless and unforgettable travel experiences. Whether you’re planning a business trip, a family vacation, or a romantic getaway, our dedicated travel agency services ensure every aspect of your journey is perfectly organized and stress-free.
                        </p>

                        <!-- Why Choose Our Travel Agency Services -->
                        <div class="section">
                            <h2>Why Choose {{$siteName}} for Travel Planning?</h2>
                            <p>
                                As a trusted travel agency, {{$siteName}} offers unparalleled expertise and personalized service. Here’s why our clients choose us:
                            </p>
                            <ul>
                                <li><strong>Tailored Travel Plans:</strong> We create customized itineraries based on your preferences and budget.</li>
                                <li><strong>Global Partnerships:</strong> Access exclusive deals and discounts with our network of airlines, hotels, and tour operators.</li>
                                <li><strong>Comprehensive Services:</strong> From flight bookings to car rentals and accommodations, we handle it all.</li>
                                <li><strong>Visa Assistance:</strong> Smooth and hassle-free visa processing for international travel.</li>
                                <li><strong>24/7 Travel Support:</strong> Our team is available round the clock to assist with any issues or changes.</li>
                            </ul>
                        </div>

                        <!-- Services Overview -->
                        <div class="section">
                            <h2>Our Travel Agency Services</h2>
                            <p>Explore the full range of services we provide to make your journey unforgettable:</p>
                            <ul>
                                <li><strong>Flight Booking:</strong> Book domestic and international flights at competitive rates with flexible options.</li>
                                <li><strong>Hotel Reservations:</strong> Stay in top-rated hotels that match your comfort and budget preferences.</li>
                                <li><strong>Car Rentals:</strong> Convenient and affordable car hire services to explore destinations at your own pace.</li>
                                <li><strong>Corporate Travel:</strong> Streamlined travel solutions for businesses, including group bookings and meeting arrangements.</li>
                                <li><strong>Travel Insurance:</strong> Comprehensive coverage to protect you during your journey.</li>
                                <li><strong>Luxury Travel:</strong> Exclusive packages for luxurious and indulgent travel experiences.</li>
                            </ul>
                        </div>

                        <!-- How It Works -->
                        <div class="section">
                            <h2>How It Works</h2>
                            <p>Planning your trip with {{$siteName}} is simple:</p>
                            <ol>
                                <li><strong>Consultation:</strong> Share your travel requirements and preferences with our experts.</li>
                                <li><strong>Planning:</strong> We curate a personalized itinerary and present the best options for flights, hotels, and more.</li>
                                <li><strong>Booking:</strong> Confirm your selections, and we handle all the bookings and payments.</li>
                                <li><strong>Travel Support:</strong> Enjoy peace of mind with our 24/7 support throughout your trip.</li>
                            </ol>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
