@extends('home.base')
@section('content')


    <!-- Banner Section Start -->
    <div class="banner-slider owl-carousel owl-theme">
        <div class="banner-item banner-bg-one">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="banner-text">
                            <h1>Your Gateway to Seamless Travel Experiences</h1>
                            <p>
                                From planning your dream vacation to booking flights and logistics, {{$siteName}} is here to
                                make your journey effortless and memorable. Your adventure starts with us.
                            </p>

                            <div class="banner-btn">
                                <a href="{{url('contact')}}" class="default-btn">Book a Quote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="banner-item banner-bg-two">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="banner-text">
                            <h1>Logistics Made Simple</h1>
                            <p>
                                From small packages to large freight, {{$siteName}} ensures secure and timely delivery. Your
                                business deserves reliable logistics—trust the experts.
                            </p>

                            <div class="banner-btn">
                                <a href="{{url('contact')}}" class="default-btn">Get a Free Quote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-item banner-bg-three">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="banner-text">
                            <h1>Your Partner in Hassle-Free Travel</h1>
                            <p>
                                At {{$siteName}}, we don’t just offer services; we craft experiences. From tours to logistics,
                                every detail is handled with care and precision.
                            </p>

                            <div class="banner-btn">
                                <a href="{{url('contact')}}" class="default-btn">Get a Free Quote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Features Section Start -->
    <div class="features-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6 wow animate__animated animate__fadeInUp" data-wow-duration="1s">
                    <div class="feature-card">
                        <i class="icofont-fast-delivery"></i>
                        <span>87,357 KM</span>
                        <h3>Total Delivered</h3>
                        <p>
                            We’ve covered over 87,000 kilometers delivering excellence. From packages to logistics, our commitment
                            to efficiency and reliability knows no bounds.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 wow animate__animated animate__fadeInUp" data-wow-duration="1s">
                    <div class="feature-card">
                        <i class="icofont-location-pin"></i>
                        <span>120</span>
                        <h3>Countries Served</h3>
                        <p>
                            Our global reach spans 120 countries, connecting businesses and individuals across the globe with
                            timely and secure delivery solutions.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 wow animate__animated animate__fadeInUp" data-wow-duration="1s">
                    <div class="feature-card">
                        <i class="icofont-users-alt-3"></i>
                        <span>3.2K</span>
                        <h3>Customers Served</h3>
                        <p>
                            Join the 3,200+ satisfied customers who trust {{$siteName}} for their logistics, travel, and vacation
                            needs. Your satisfaction drives us forward.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 wow animate__animated animate__fadeInUp" data-wow-duration="1s">
                    <div class="feature-card">
                        <i class="icofont-thumbs-up"></i>
                        <span>27</span>
                        <h3>Years Experience</h3>
                        <p>
                            With 27 years of industry expertise, we’ve honed our skills to deliver unparalleled services in
                            travel, logistics, and beyond.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features Section End -->

    <!-- Why Choose Section Start -->
    <section class="why-choose-section">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6 p-0" id="tracking-package">
                    <div class="why-choose-img">
                        <div class="shipping-text">
                            <h3>Know Shipping Location</h3>
                            <p>Track ID will be on your document file.</p>
                            <form method="post" action="{{route('tracking.package.process')}}">
                                @include('templates.notification')
                                @csrf
                                <div class="form-group">
                                    <input type="text"  class="form-control" placeholder="Enter Track ID" name="tracking_id">
                                </div>

                                <button type="submit" class="shipping-btn">
                                    Track Now
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 p-0">
                    <div class="why-choose-text">
                        <div class="section-title">
                            <h2>Why People Choose {{$siteName}}?</h2>
                        </div>

                        <div class="accordions">
                            <div class="accordion-item">
                                <div class="accordion-title" data-tab="item1">
                                    <i class="icofont-fast-delivery"></i>
                                    <h2>Fast & Safe Delivery <i class="icofont-stylish-right down-arrow"></i></h2>
                                </div>
                                <div class="accordion-content" id="item1">
                                    <p>
                                        At {{$siteName}}, speed and safety are our top priorities. We ensure your parcels and
                                        goods are delivered promptly and securely to their destination, no matter the size or distance.
                                    </p>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <div class="accordion-title" data-tab="item2">
                                    <i class="icofont-ssl-security"></i>
                                    <h2>Product Security <i class="icofont-stylish-right down-arrow"></i></h2>
                                </div>
                                <div class="accordion-content" id="item2">
                                    <p>
                                        Your goods are precious, and we treat them as such. Our logistics team uses cutting-edge
                                        technology and robust protocols to safeguard your shipments throughout the journey.
                                    </p>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <div class="accordion-title" data-tab="item3">
                                    <i class="icofont-diamond"></i>
                                    <h2>Price Oriented <i class="icofont-stylish-right down-arrow"></i></h2>
                                </div>
                                <div class="accordion-content" id="item3">
                                    <p>
                                        Affordable and transparent pricing is at the core of our services. We offer competitive
                                        rates without compromising on quality, making us the best choice for cost-effective logistics solutions.
                                    </p>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <div class="accordion-title" data-tab="item4">
                                    <i class="icofont-ui-browser"></i>
                                    <h2>Secured Payment <i class="icofont-stylish-right down-arrow"></i></h2>
                                </div>
                                <div class="accordion-content" id="item4">
                                    <p>
                                        Trust is essential, and our payment systems are designed to provide maximum security.
                                        With multiple secure payment options, you can transact with confidence and ease.
                                    </p>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <div class="accordion-title" data-tab="item5">
                                    <i class="icofont-live-support"></i>
                                    <h2>24/7 Support <i class="icofont-stylish-right down-arrow"></i></h2>
                                </div>
                                <div class="accordion-content" id="item5">
                                    <p>
                                        Need help at any hour? Our dedicated customer support team is available 24/7 to assist
                                        you with tracking, inquiries, or resolving issues swiftly.
                                    </p>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <div class="accordion-title" data-tab="item6">
                                    <i class="icofont-like"></i>
                                    <h2>Well Experienced <i class="icofont-stylish-right down-arrow"></i></h2>
                                </div>
                                <div class="accordion-content" id="item6">
                                    <p>
                                        With over two decades of expertise in logistics, freight, and travel, {{$siteName}} has
                                        the knowledge and resources to handle your needs with unmatched professionalism and reliability.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Choose Section End -->

    <!-- Get Quote Section Start -->
    <div class="get-quote-section quote-bg pt-100 pb-100">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6" id="tracking-flight">
                    <div class="quote-text">

                        <h2>Track & Verify Flight Tickets</h2>
                        <p>
                            With our system you can track any flight, and be sure that the ticket shown to you is real!
                        </p>

                    </div>
                </div>

                <div class="col-lg-6 wow animate__animated animate__bounceInUp" data-wow-duration="1s" >
                    <div class="quote-form">
                        <h2>Track & Verify Flight Ticket </h2>

                        <form method="post" action="{{route('tracking.flight.process')}}">
                            @csrf
                            @include('templates.notification')
                            <div class="row justify-content-center">
                                <div class="col-md-12 col-12 pr-0">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="PNR" required minlength="6" maxlength="6"
                                               name="pnr">
                                    </div>
                                </div>
                            </div>

                            <button type="submit">Submit </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </div>
    <!-- Get Quote Section End -->

    <!-- About Section Start -->
    <section class="about-section pt-100">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5 wow animate__animated animate__fadeInUp" data-wow-duration="1s">
                    <div class="about-img">
                        <img src="{{asset('home/img/about/1.jpg')}}" alt="about image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>About Us</span>
                            <h2>We Provide Fast & Safe Service to Our Customer</h2>
                        </div>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="about-tab" data-bs-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="mission-tab" data-bs-toggle="tab" href="#mission" role="tab" aria-controls="mission" aria-selected="false">Our Mission</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="goal-tab" data-bs-toggle="tab" href="#goal" role="tab" aria-controls="goal" aria-selected="false">Our Goal</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                                <p>
                                    At {{$siteName}}, we believe in creating exceptional experiences through reliable and efficient services.
                                    For over two decades, we’ve been a trusted partner for logistics, travel, and vacation solutions.
                                    Our team is committed to meeting your needs with precision, ensuring your journey or delivery is smooth and stress-free.
                                </p>
                                <p>We pride ourselves on:</p>
                                <ul>
                                    <li>Delivering packages and goods with utmost care.</li>
                                    <li>Connecting people across the globe through seamless travel.</li>
                                    <li>Providing tailored vacation and tour services that leave lasting memories.</li>
                                </ul>
                                <p>
                                    At {{$siteName}}, we turn challenges into opportunities and strive to exceed expectations with every interaction.
                                </p>
                            </div>
                            <div class="tab-pane fade" id="mission" role="tabpanel" aria-labelledby="mission-tab">
                                <p>
                                    Our mission is simple: to simplify travel, logistics, and vacation planning for individuals and businesses worldwide. We are dedicated to:
                                </p>
                                <ul>
                                    <li>Providing safe, reliable, and efficient services.</li>
                                    <li>Building lasting relationships with our customers based on trust and excellence.</li>
                                    <li>Leveraging technology to enhance every aspect of the customer experience.</li>
                                </ul>
                                <p>
                                    {{$siteName}} is here to redefine convenience and reliability across all our services.
                                </p>
                            </div>
                            <div class="tab-pane fade" id="goal" role="tabpanel" aria-labelledby="goal-tab">
                                <p>Our goal is to be the go-to partner for all your logistics and travel needs. By 2030, we aim to:</p>
                                <ul>
                                    <li>Expand our network to over 200 countries.</li>
                                    <li>Serve over 10,000 satisfied customers annually.</li>
                                    <li>Innovate and lead in sustainable logistics and travel solutions.</li>
                                </ul>
                                <p>
                                    With {{$siteName}}, your satisfaction is not just a promise—it’s a guarantee.
                                </p>
                            </div>
                        </div>

                        <div class="theme-btn">
                            <a href="{{url('about')}}" class="default-btn">Know More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Transport System Section Start -->
    <section class="transport-section pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span>Our Services</span>
                <h2>We Provide Products All over The World</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6 wow animate__animated animate__fadeInUp" data-wow-duration="1s">
                    <div class="transport-card">
                        <div class="transport-img">
                            <img src="{{asset('home/img/tour.jpg')}}" alt="transport image">
                        </div>
                        <div class="transport-text">
                            <i class="icofont-airplane-alt"></i>
                            <h3> Tour Services</h3>
                            <p>
                                Explore the world with {{$siteName}}’s premium tour services. We offer guided tours, adventure
                                expeditions, and cultural experiences tailored to your preferences.
                            </p>
                            <ul>
                                <li>Customizable itineraries for solo and group travelers</li>
                                <li>Expert local guides to enrich your journey</li>
                                <li>All-inclusive packages covering transport, meals, and activities</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 wow animate__animated animate__fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                    <div class="transport-card">
                        <div class="transport-img">
                            <img src="{{asset('home/img/vacation.jpg')}}" alt="transport image">
                        </div>
                        <div class="transport-text">
                            <i class="icofont-truck-loaded"></i>
                            <h3>Vacation Services</h3>
                            <p class="card-text">
                                Escape the ordinary with our exclusive vacation packages. From tropical retreats to luxury cruises, we create experiences that rejuvenate and inspire.
                            </p>
                            <ul>
                                <li>Beach, mountain, and city vacations</li>
                                <li>Luxury accommodations and exclusive activities</li>
                                <li>Family, couple, or solo-friendly options</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6   wow animate__animated animate__fadeInUp" data-wow-duration="1s"  data-wow-delay=".6s">
                    <div class="transport-card">
                        <div class="transport-img">
                            <img src="{{asset('home/img/services/3.jpg')}}" alt="transport image">
                        </div>
                        <div class="transport-text">
                            <i class="icofont-sail-boat-alt-1"></i>
                            <h3>Travel Agency Service</h3>
                            <p class="card-text">
                                Simplify your travel plans with {{$siteName}}’s full-service travel agency. From booking flights to hotel reservations, we handle all the details for a seamless journey.
                            </p>
                            <ul>
                                <li>Personalized travel planning for any destination</li>
                                <li>Special packages for business and leisure travelers</li>
                                <li>24/7 support for last-minute changes</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6   wow animate__animated animate__fadeInUp" data-wow-duration="1s"  data-wow-delay=".6s">
                    <div class="transport-card">
                        <div class="transport-img">
                            <img src="{{asset('home/img/visa-prep.webp')}}" alt="transport image">
                        </div>
                        <div class="transport-text">
                            <i class="icofont-sail-boat-alt-1"></i>
                            <h3>Visa Preparation Service</h3>
                            <p class="card-text">
                                Let {{$siteName}} assist with all your visa needs. From application guidance to document verification, we ensure a smooth visa process for your travel.
                            </p>
                            <ul>
                                <li>Step-by-step visa application support</li>
                                <li>Expert advice on document requirements</li>
                                <li>Visa processing for tourism, work, and study</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6   wow animate__animated animate__fadeInUp" data-wow-duration="1s"  data-wow-delay=".6s">
                    <div class="transport-card">
                        <div class="transport-img">
                            <img src="{{asset('home/img/Flight_Tracking_Solution_Map.jpg')}}" alt="transport image">
                        </div>
                        <div class="transport-text">
                            <i class="icofont-sail-boat-alt-1"></i>
                            <h3>Flight Tracking</h3>
                            <p class="card-text">
                                Stay updated with real-time flight tracking by {{$siteName}}. Monitor your flight’s status, delays, and changes at your fingertips.
                            </p>
                            <ul>
                                <li>Real-time updates on departures and arrivals</li>
                                <li>Notifications for schedule changes</li>
                                <li>Accessible on any device, anytime</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6   wow animate__animated animate__fadeInUp" data-wow-duration="1s"  data-wow-delay=".6s">
                    <div class="transport-card">
                        <div class="transport-img">
                            <img src="{{asset('home/img/banner/1.jpg')}}" alt="transport image">
                        </div>
                        <div class="transport-text">
                            <i class="icofont-sail-boat-alt-1"></i>
                            <h3>Logistics and Freight</h3>
                            <p class="card-text">
                                At {{$siteName}}, we specialize in providing reliable and efficient logistics and freight solutions. Whether you're shipping small parcels or large cargo, we ensure your goods are handled with care and delivered on time.
                            </p>
                            <ul>
                                <li><strong>Air Freight:</strong> Fast and secure delivery for time-sensitive shipments.</li>
                                <li><strong>Road Freight:</strong> Affordable and flexible solutions for domestic and regional transport.</li>
                                <li><strong>Ocean Freight:</strong> Cost-effective shipping for large volumes of goods across international waters.</li>
                                <li><strong>Rail Freight:</strong> Eco-friendly transportation for bulk goods over long distances.</li>
                                <li><strong>Warehouse Solutions:</strong> Secure storage and inventory management tailored to your needs.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Transport System Section End -->



    <!-- Feedback Section Strat -->
    <section class="feedback-section feedback-bg pt-100">
        <div class="container">
            <div class="section-title text-center">
                <span>Feedbacks</span>
                <h2>Feedback From Our Clients</h2>
                <p>Do not take our words for it, read what others say.</p>
            </div>

            <div class="feedback-slider owl-carousel owl-theme">
                <div class="feedback-items">
                    <i class="icofont-quote-right"></i>
                    <p>
                        {{$web->name}} has completely transformed the way we handle logistics. Their speed and reliability are unmatched,
                        and their customer service is always available to assist with any questions. I highly recommend their
                        services for both businesses and individuals!
                    </p>

                    <img src="{{asset('home/img/feedback/client-1.png')}}" alt="client image">
                    <h3>J. Johnson</h3>
                    <span>Entrepreneur</span>
                </div>

                <div class="feedback-items">
                    <i class="icofont-quote-right"></i>
                    <p>
                        I used {{$web->name}} for my vacation planning, and they exceeded all my expectations. From flight bookings
                        to hotel reservations, everything was seamless. They took the stress out of my travel plans, and I couldn’t be happier.
                    </p>

                    <img src="{{asset('home/img/feedback/client-2.png')}}" alt="client image">
                    <h3>Mr. McMachman</h3>
                    <span>Photographer</span>
                </div>

                <div class="feedback-items">
                    <i class="icofont-quote-right"></i>
                    <p>I was amazed by the level of care and attention given to my shipment. The real-time tracking feature kept me informed
                        every step of the way, and my package arrived on time and in perfect condition. {{$web->name}} is my go-to for all my logistics needs!
                    </p>

                    <img src="http://ui-avatars.com/api/?name=Anton Sławosz" alt="client image">
                    <h3>Anton Sławosz</h3>
                    <span>Botanist</span>
                </div>
            </div>
        </div>
    </section>
    <!-- Feedback Section End -->

    <!-- Company Section Start -->
    <div class="company-section">
        <div class="container">
            <div class="company-slider owl-carousel owl-theme">
                <div class="company-logo">
                    <a href="index"><img src="{{asset('home/img/company/1.png')}}" alt="logo"></a>
                </div>
                <div class="company-logo">
                    <a href="index"><img src="{{asset('home/img/company/2.png')}}" alt="logo"></a>
                </div>
                <div class="company-logo">
                    <a href="index"><img src="{{asset('home/img/company/3.png')}}" alt="logo"></a>
                </div>
                <div class="company-logo">
                    <a href="index"><img src="{{asset('home/img/company/4.png')}}" alt="logo"></a>
                </div>
                <div class="company-logo">
                    <a href="index"><img src="{{asset('home/img/company/5.png')}}" alt="logo"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Company Section End -->

    <!-- Blog Section Start -->
    <section class="blog-section pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span>Latest News</span>
                <h2>News of Our Transportation</h2>
                <p></p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6 wow animate__animated animate__fadeInUp" data-wow-duration="1s">
                    <div class="blog-card">
                        <div class="blog-img">
                            <a href="#">
                                <img src="{{asset('home/img/blog/1.png')}}" alt="blog image">
                            </a>
                        </div>
                        <div class="blog-text">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Blog Section End -->


@endsection
