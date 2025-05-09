@extends('home.base')
@section('content')
    @push('css')
        <style>
            .accordion-button:not(.collapsed) {
                background-color: #0047ba;
                color: #fff;
            }

            .accordion-button {
                font-weight: bold;
            }
        </style>
    @endpush
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

    <!-- Faq Section Start -->
    <section class="faq-section pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span>FAQ</span>
                <h2>Frequently Asked Questions</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12 ">
                    <div class="accordion" id="faqAccordion">
                        <!-- Question 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What services does {{$web->name}} offer?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {{$web->name}} offers a range of services including Logistics and Freight, Tour Planning, Vacation Packages, Visa Preparation, Travel Agency Services, and Flight Tracking. We aim to provide seamless and reliable solutions tailored to your needs.
                                </div>
                            </div>
                        </div>

                        <!-- Question 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How can I track my shipment or flight?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    You can easily track your shipment or flight by visiting our <a href="{{route('home')}}#tracking-package" class="text-primary">tracking page</a>. Enter your tracking ID or PNR code, and you will receive real-time updates on your package or flight status.
                                </div>
                            </div>
                        </div>

                        <!-- Question 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    What is the process for visa preparation?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Our visa preparation process involves a consultation to understand your requirements, a checklist of necessary documents, application preparation, submission to the embassy or consulate, and regular updates on your application status. We ensure a hassle-free experience.
                                </div>
                            </div>
                        </div>

                        <!-- Question 4 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    How do I book a tour or vacation package?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Booking a tour or vacation package is simple! Visit our <a href="{{url('tour')}}" class="text-primary">Tours and Vacation</a> page, explore our packages, and fill out the booking form. Our team will contact you to finalize the details and provide personalized assistance.
                                </div>
                            </div>
                        </div>

                        <!-- Question 5 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    What payment methods do you accept?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We accept a variety of payment methods including credit/debit cards, bank transfers, and mobile payments. All transactions are secure and processed through our trusted payment gateway partners.
                                </div>
                            </div>
                        </div>

                        <!-- Question 6 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    How do I contact customer support?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    You can reach our customer support team 24/7 via email at <a href="mailto:{{$web->email}}" class="text-primary">{{$web->email}}</a>, call us on Whatsapp at
                                    <a href="{{$web->whatsappSupport}}" target="_blank" class="text-primary"> {{$web->phone}}</a>, or use the live chat feature on our website for immediate assistance.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
