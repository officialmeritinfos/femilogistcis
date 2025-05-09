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
                            <img src="{{asset('home/img/visa-prep.webp')}}" alt="service details image">
                        </div>
                        <h2>{{$pageName}}</h2>
                        <p>
                            At <span class="highlight">{{$siteName}}</span>, we understand that navigating visa applications can be complex and time-consuming. That’s why our professional visa preparation services are designed to simplify the process, ensure accuracy, and increase your chances of success. Whether you’re traveling for work, study, or leisure, we’re here to guide you every step of the way.
                        </p>

                        <!-- Why Choose Our Visa Services -->
                        <div class="section">
                            <h2>Why Choose {{$siteName}} for Visa Preparation?</h2>
                            <p>
                                Applying for a visa can be stressful, but not with {{$siteName}}. Here’s what makes us the preferred choice for visa preparation services:
                            </p>
                            <ul>
                                <li><strong>Expert Assistance:</strong> Our visa specialists have in-depth knowledge of visa requirements for various countries.</li>
                                <li><strong>Streamlined Process:</strong> We simplify the process, ensuring all forms and documents are correctly completed and submitted.</li>
                                <li><strong>Tailored Support:</strong> We provide personalized guidance based on your travel purpose and destination.</li>
                                <li><strong>Document Review:</strong> Our team meticulously reviews all your documents to avoid delays or rejections.</li>
                                <li><strong>Fast and Efficient:</strong> We expedite the visa process to ensure you meet your travel deadlines.</li>
                            </ul>
                        </div>

                        <!-- Services Overview -->
                        <div class="section">
                            <h2>Our Visa Preparation Services</h2>
                            <p>We offer comprehensive visa preparation services for various purposes:</p>
                            <ul>
                                <li><strong>Tourist Visas:</strong> Assistance with applications for leisure or holiday travel.</li>
                                <li><strong>Business Visas:</strong> Streamlined processes for corporate travelers attending meetings, conferences, or business events.</li>
                                <li><strong>Student Visas:</strong> Guidance for students pursuing education abroad, including document preparation and application submission.</li>
                                <li><strong>Work Visas:</strong> Expert advice for securing work permits and employment-based visas.</li>
                                <li><strong>Family and Dependent Visas:</strong> Assistance for families joining loved ones abroad.</li>
                                <li><strong>Transit Visas:</strong> Short-term visa solutions for travelers passing through a country.</li>
                            </ul>
                        </div>

                        <!-- How It Works -->
                        <div class="section">
                            <h2>How It Works</h2>
                            <p>Our visa preparation process is designed to be simple and hassle-free:</p>
                            <ol>
                                <li><strong>Consultation:</strong> Share your travel plans, destination, and visa type with our team.</li>
                                <li><strong>Document Checklist:</strong> Receive a customized checklist of required documents based on your visa type.</li>
                                <li><strong>Application Preparation:</strong> We complete your application forms and review all supporting documents for accuracy.</li>
                                <li><strong>Submission:</strong> Our team submits your application to the appropriate embassy or consulate.</li>
                                <li><strong>Follow-Up:</strong> We provide updates on your application status and address any additional requirements promptly.</li>
                            </ol>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
