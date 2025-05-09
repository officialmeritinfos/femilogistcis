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
                            <img src="{{asset('home/img/frieght.jpg')}}" alt="service details image">
                        </div>
                        <h2>{{$pageName}}</h2>
                        <p>
                            At <span class="highlight">{{$siteName}}</span>, we are committed to delivering reliable, efficient, and seamless logistics and freight solutions tailored to your needs. With a global network, cutting-edge technology, and over 27 years of industry expertise, we ensure your shipments reach their destinations on time, every time. Whether it’s a small parcel or large-scale cargo, we handle it with utmost care and precision.
                        </p>

                        <!-- Why Choose Our Logistics and Freight Services -->
                        <div class="section">
                            <h2>Why Choose {{$siteName}} for Logistics and Freight?</h2>
                            <p>
                                Logistics and freight are at the core of our business. Here’s why {{$siteName}} is the preferred choice for businesses and individuals:
                            </p>
                            <ul>
                                <li><strong>Global Coverage:</strong> Seamless logistics solutions across over 120 countries.</li>
                                <li><strong>On-Time Delivery:</strong> Punctual and reliable delivery services, ensuring your shipments arrive as scheduled.</li>
                                <li><strong>Customizable Solutions:</strong> Freight options tailored to your needs, whether air, road, ocean, or rail.</li>
                                <li><strong>Advanced Tracking:</strong> Real-time shipment tracking for transparency and peace of mind.</li>
                                <li><strong>Cost Efficiency:</strong> Competitive pricing without compromising on quality and security.</li>
                                <li><strong>Sustainability:</strong> Eco-friendly logistics practices for a greener future.</li>
                            </ul>
                        </div>

                        <!-- Services Overview -->
                        <div class="section">
                            <h2>Our Logistics and Freight Services</h2>
                            <p>We provide end-to-end logistics solutions designed to meet your specific requirements:</p>
                            <ul>
                                <li><strong>Air Freight:</strong> Fast and secure air freight services for time-sensitive shipments.</li>
                                <li><strong>Ocean Freight:</strong> Cost-effective shipping solutions for large-scale international cargo.</li>
                                <li><strong>Road Freight:</strong> Reliable trucking services for domestic and cross-border transportation.</li>
                                <li><strong>Rail Freight:</strong> Efficient rail logistics for bulk goods and long-distance deliveries.</li>
                                <li><strong>Warehousing:</strong> Secure storage facilities with inventory management and distribution services.</li>
                                <li><strong>E-Commerce Logistics:</strong> Comprehensive solutions for online businesses, including last-mile delivery.</li>
                            </ul>
                        </div>

                        <!-- How It Works -->
                        <div class="section">
                            <h2>How It Works</h2>
                            <p>We’ve streamlined our logistics process to make it simple and efficient for you:</p>
                            <ol>
                                <li><strong>Request a Quote:</strong> Share your shipment details, and we’ll provide a customized quote.</li>
                                <li><strong>Booking:</strong> Confirm your shipment and select your preferred freight option.</li>
                                <li><strong>Pickup:</strong> We’ll collect your package or cargo at your convenience.</li>
                                <li><strong>Tracking:</strong> Monitor your shipment in real-time through our advanced tracking system.</li>
                                <li><strong>Delivery:</strong> Receive your shipment on time, securely, and with full satisfaction.</li>
                            </ol>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
