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
    <div class="terms-section pt-100 pb-100">
        <div class="container">
            <div class="terms-text">

                <p>Welcome to {{$siteName}}! These terms and conditions outline the rules and regulations for the use of our services. By accessing or using our services, you agree to be bound by these terms. Please read them carefully.</p>

                <h2>1. Definitions</h2>
                <p>For the purpose of these terms:</p>
                <ul>
                    <li><strong>"Company"</strong> refers to {{$siteName}}.</li>
                    <li><strong>"Customer"</strong> refers to the individual or business using our services.</li>
                    <li><strong>"Services"</strong> refers to the logistics, freight, travel, and related services provided by {{$siteName}}.</li>
                </ul>

                <h2>2. Eligibility</h2>
                <p>To use our services, you must:</p>
                <ul>
                    <li>Be at least 18 years of age.</li>
                    <li>Provide accurate and complete information during registration or booking.</li>
                    <li>Comply with all applicable laws and regulations.</li>
                </ul>

                <h2>3. Services Provided</h2>
                <p>{{$siteName}} provides the following services:</p>
                <ul>
                    <li>Logistics and freight transportation (air, road, ocean, and rail freight).</li>
                    <li>Tour and vacation planning.</li>
                    <li>Flight booking and tracking.</li>
                    <li>Visa assistance and travel documentation.</li>
                    <li>Warehousing and e-commerce logistics solutions.</li>
                </ul>
                <p>The scope of services may vary depending on availability, location, and other factors.</p>

                <h2>4. Booking and Payment</h2>
                <ul>
                    <li>All bookings must be made through our official website, app, or authorized agents.</li>
                    <li>Payment must be completed before the service is rendered unless otherwise agreed upon.</li>
                    <li>We accept secure payment methods including credit/debit cards, bank transfers, and mobile payments.</li>
                </ul>

                <h2>5. Cancellation and Refund Policy</h2>
                <p>Cancellations are subject to the following conditions:</p>
                <ul>
                    <li>Cancellations made within 24 hours of booking are eligible for a full refund.</li>
                    <li>Cancellations made less than 72 hours before the scheduled service may incur a cancellation fee.</li>
                    <li>Refunds will be processed within 7-10 business days after approval.</li>
                </ul>

                <h2>6. User Responsibilities</h2>
                <p>As a customer, you agree to:</p>
                <ul>
                    <li>Provide accurate and up-to-date information.</li>
                    <li>Ensure that the goods being transported comply with local and international laws.</li>
                    <li>Communicate any changes or cancellations promptly.</li>
                    <li>Refrain from engaging in fraudulent or harmful activities.</li>
                </ul>

                <h2>7. Limitation of Liability</h2>
                <p>{{$siteName}} is not liable for:</p>
                <ul>
                    <li>Delays caused by weather, traffic, or unforeseen circumstances.</li>
                    <li>Loss or damage resulting from inaccurate information provided by the customer.</li>
                    <li>Any indirect or consequential damages arising from the use of our services.</li>
                </ul>

                <h2>8. Confidentiality and Privacy</h2>
                <p>We are committed to protecting your privacy and handling your personal data in compliance with applicable privacy laws. Please review our <a href="/privacy-policy">Privacy Policy</a> for more information.</p>

                <h2>9. Changes to Terms</h2>
                <p>{{$siteName}} reserves the right to modify these terms and conditions at any time. Changes will be effective upon posting on our website. Continued use of our services constitutes acceptance of the updated terms.</p>

                <h2>10. Governing Law</h2>
                <p>These terms and conditions are governed by the laws of Poland. Any disputes arising from the use of our services will be resolved in the courts of [Your Jurisdiction].</p>

                <h2>11. Contact Us</h2>
                <p>If you have any questions or concerns about these terms, please contact us at:</p>
                <p>
                    <strong>Email:</strong> {{$web->email}}<br>
                    <strong>Phone:</strong> {{$web->phone}}<br>
                    <strong>Address:</strong> {{$web->address}}<br/>
                    <strong>Licence:</strong> {{$web->licenseNumber}}<br>
                </p>

                <p>Thank you for choosing {{$siteName}}. We look forward to serving you!</p>

            </div>
        </div>
    </div>

@endsection
