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
                            <img src="{{asset('home/img/tour.jpg')}}" alt="service details image">
                        </div>
                        <h2>{{$pageName}}</h2>
                        <p>
                            Discover the world with <span class="highlight">{{$siteName}}</span> Tour Services! Whether you dream of exploring breathtaking destinations, immersing yourself in vibrant cultures, or embarking on thrilling adventures, our expertly designed tour packages cater to all your travel needs. Let us take care of every detail so you can focus on creating unforgettable memories.
                        </p>
                        <!-- Why Choose Our Tour Services -->
                        <div class="section">
                            <h2>Why Choose {{$siteName}} for Your Tours?</h2>
                            <p>
                                Planning a tour can be overwhelming, but with {{$siteName}}, it's a breeze! Here's why travelers love our tour services:
                            </p>
                            <ul>
                                <li><strong>Tailored Itineraries:</strong> We customize every tour to match your preferences, interests, and budget.</li>
                                <li><strong>Global Destinations:</strong> Explore iconic landmarks, exotic locales, and hidden gems across the globe.</li>
                                <li><strong>Expert Guidance:</strong> Our experienced tour guides ensure a safe, enriching, and seamless journey.</li>
                                <li><strong>All-Inclusive Packages:</strong> Enjoy convenience with accommodation, transport, meals, and activities covered.</li>
                                <li><strong>24/7 Support:</strong> Count on us for round-the-clock assistance during your trip.</li>
                            </ul>
                        </div>

                        <!-- Popular Tour Packages -->
                        <div class="section">
                            <h2>Our Popular Tour Packages</h2>
                            <p>Explore some of our most sought-after tour packages:</p>
                            <ul>
                                <li><strong>City Escapes:</strong> Immerse yourself in the rich history and vibrant nightlife of global metropolises like Paris, New York, and Dubai.</li>
                                <li><strong>Beach Getaways:</strong> Relax on pristine beaches in the Maldives, Bora Bora, or the Caribbean islands.</li>
                                <li><strong>Adventure Tours:</strong> Satisfy your thrill-seeking spirit with safaris in Africa, hiking in the Alps, or diving in the Great Barrier Reef.</li>
                                <li><strong>Cultural Immersions:</strong> Experience the traditions and heritage of countries like India, Japan, and Egypt.</li>
                                <li><strong>Family-Friendly Vacations:</strong> Fun-filled tours designed for the whole family, with activities for all age groups.</li>
                            </ul>
                        </div>

                        <!-- How It Works -->
                        <div class="section">
                            <h2>How Our Tour Services Work</h2>
                            <p>Booking your dream tour with {{$siteName}} is simple:</p>
                            <ol>
                                <li><strong>Consultation:</strong> Share your travel goals, preferences, and budget with our team.</li>
                                <li><strong>Customization:</strong> We craft a personalized itinerary tailored to your needs.</li>
                                <li><strong>Booking:</strong> We handle all bookings for flights, accommodations, and activities.</li>
                                <li><strong>Travel:</strong> Embark on your journey with everything pre-arranged for a hassle-free experience.</li>
                                <li><strong>Support:</strong> Enjoy 24/7 assistance throughout your trip.</li>
                            </ol>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
