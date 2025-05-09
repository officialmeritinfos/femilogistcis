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

    <!-- About Section Start -->
    <section class="about-section about-style-two pb-100">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5">
                    <div class="about-img">
                        <img src="{{asset('home/img/about/2.jpg')}}" alt="about image">
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
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="section">
                        <div class="section-title">

                            <h2>What We Offer</h2>
                        </div>
                        <p>
                            {{$siteName}} is a one-stop solution for all your logistics, travel, and freight needs. Our wide range of services includes:
                        </p>
                        <ul>
                            <li><strong>Logistics and Freight:</strong> Air, road, ocean, and rail freight solutions tailored to your needs.</li>
                            <li><strong>Travel Services:</strong> Flight booking, vacation planning, and visa assistance to make your journey hassle-free.</li>
                            <li><strong>Tour Packages:</strong> Explore breathtaking destinations with our custom-designed tour packages.</li>
                            <li><strong>Flight Tracking:</strong> Stay updated with real-time flight status and notifications.</li>
                            <li><strong>E-Commerce Logistics:</strong> End-to-end solutions for online businesses, including warehousing and last-mile delivery.</li>
                        </ul>
                    </div>
                    <div class="section">
                        <div class="section-title">
                            <h2>Commitment to Sustainability</h2>
                        </div>
                        <p>
                            At {{$siteName}}, we believe in building a better future. We are committed to implementing sustainable practices in our operations to minimize our environmental impact. From optimizing transportation routes to adopting eco-friendly packaging, we take every step to ensure our services are not just efficient but also environmentally responsible.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection
