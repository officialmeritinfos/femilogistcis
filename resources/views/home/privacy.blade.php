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
                <p>Your privacy is important to us. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website or use our services. Please read this policy carefully to understand our practices regarding your data.</p>

                <h2>1. Information We Collect</h2>
                <p>We collect the following types of information:</p>
                <ul>
                    <li><strong>Personal Information:</strong> Name, email address, phone number, address, payment information, and identification documents (for visa services).</li>
                    <li><strong>Service-Related Information:</strong> Flight details, booking history, shipment details, and travel preferences.</li>
                    <li><strong>Device Information:</strong> IP address, browser type, operating system, and device identifiers.</li>
                    <li><strong>Cookies and Tracking Technologies:</strong> Information collected via cookies, web beacons, and similar technologies to enhance your user experience.</li>
                </ul>

                <h2>2. How We Use Your Information</h2>
                <p>We use your information for the following purposes:</p>
                <ul>
                    <li>To provide and manage our services, including logistics, freight, travel bookings, and visa preparations.</li>
                    <li>To process payments and send you invoices or receipts.</li>
                    <li>To personalize your experience and offer tailored services.</li>
                    <li>To communicate with you regarding updates, promotions, and customer support.</li>
                    <li>To analyze website usage and improve our services.</li>
                    <li>To comply with legal obligations or resolve disputes.</li>
                </ul>

                <h2>3. How We Share Your Information</h2>
                <p>We do not sell or rent your personal information. However, we may share your data with:</p>
                <ul>
                    <li><strong>Service Providers:</strong> Third-party vendors who assist in service delivery, such as airlines, shipping companies, and payment processors.</li>
                    <li><strong>Legal Authorities:</strong> When required to comply with legal obligations or to protect our rights and safety.</li>
                    <li><strong>Business Partners:</strong> Trusted partners for joint promotions or collaborations, with your consent.</li>
                </ul>

                <h2>4. Cookies and Tracking Technologies</h2>
                <p>We use cookies and similar technologies to improve your experience on our website. Cookies help us:</p>
                <ul>
                    <li>Remember your preferences and settings.</li>
                    <li>Understand how you interact with our website.</li>
                    <li>Deliver relevant advertisements.</li>
                </ul>
                <p>You can manage your cookie preferences through your browser settings. However, disabling cookies may affect your user experience.</p>

                <h2>5. Data Security</h2>
                <p>We implement industry-standard security measures to protect your personal information. These include encryption, firewalls, and secure payment gateways. However, no system is completely secure, and we cannot guarantee absolute security.</p>

                <h2>6. Your Data Rights</h2>
                <p>You have the following rights regarding your personal data:</p>
                <ul>
                    <li>Access: Request a copy of the information we hold about you.</li>
                    <li>Correction: Update or correct your personal information.</li>
                    <li>Deletion: Request the deletion of your data, subject to legal or contractual obligations.</li>
                    <li>Opt-Out: Unsubscribe from marketing communications at any time.</li>
                </ul>
                <p>To exercise your rights, please contact us at <a href="mailto:{{$web->email}}">{{$web->email}}</a>.</p>

                <h2>7. Third-Party Links</h2>
                <p>Our website may contain links to third-party websites. We are not responsible for the privacy practices of these websites. Please review their privacy policies before sharing your information.</p>

                <h2>8. Changes to This Privacy Policy</h2>
                <p>We may update this policy from time to time to reflect changes in our practices or legal requirements. We encourage you to review this page periodically for the latest updates.</p>

                <h2>9. Contact Us</h2>
                <p>If you have any questions or concerns about this Privacy Policy, please contact us:</p>
                <p>
                    <strong>Email:</strong> <a href="mailto:{{$web->email}}">{{$web->email}}</a><br>
                    <strong>Phone:</strong> {{$web->phone}}<br>
                    <strong>Address:</strong> {{$web->address}}
                </p>

                <p>Thank you for trusting {{$web->name}} with your information.</p>

            </div>
        </div>
    </div>


@endsection
