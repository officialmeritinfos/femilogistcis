@extends('home.base')
@section('content')
    @push('css')
        <script src='https://www.google.com/recaptcha/api.js'></script>
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


    <!-- Contact Section Start -->
    <section class="contact-section contact-style-two pb-100 mt-5">
        <div class="container">
            <div class="section-title text-center">
                <h2>Book your flight</h2>
                <p>It is easy to book your flight with us, and we will help you secure everything you need for it.</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10 ">
                    <div class="contact-area">
                        <form id="contactForm" action="{{route('flight-booking.process')}}" method="post">
                            @include('templates.notification')
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Trip Type</label>
                                        <select name="tripType" id="subject" class="form-control" required >
                                            <option value="">Select Trip Type</option>
                                            <option value="one-way">One-Way Trip</option>
                                            <option value="round-trip">Round Trip</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Departure Date</label>
                                        <input type="date" name="departureDate" id="number" class="form-control" required data-error="Please enter a date"
                                               placeholder="Departure Date">
                                    </div>
                                </div>
                                <div class="col-md-6" id="returnDateGroup">
                                    <div class="form-group">
                                        <label>Return Date</label>
                                        <input type="date" name="returnDate" id="number" class="form-control"  data-error="Please enter a date"
                                               placeholder="Return Date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name"
                                               placeholder="Your Name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">.
                                        <label>Email</label>
                                        <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email"
                                               placeholder="Your Email">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="tel" name="phone" id="number" class="form-control" required data-error="Please enter your number"
                                               placeholder="Phone Number">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Departure Country</label>
                                        <select name="residence" id="subject" class="form-control" required >
                                            <option value="">Departure Country</option>
                                            @foreach($froms as $from)
                                                <option value="{{$from->name}}">{{$from->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Destination Country</label>
                                        <select name="destination" id="subject" class="form-control" required >
                                            <option value="">Select Destination</option>
                                            @foreach($tos as $to)
                                                <option value="{{$to->name}}">{{$to->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nationality/Country of Birth</label>
                                        <select name="nationality" id="subject" class="form-control" required >
                                            <option value="">Select Nationality</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Flight Class</label>
                                        <select name="class" id="subject" class="form-control" required >
                                            <option value="">Select Class</option>
                                            <option>Economy</option>
                                            <option>Business Class</option>
                                            <option>First Class</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Number of Adults</label>
                                        <input type="number" name="numberOfAdults" value="1" id="number" class="form-control" required data-error="Please enter a number"
                                               placeholder="Number of Adults">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Number of Children</label>
                                        <input type="number" name="numberOfChildren" value="0" id="number" class="form-control" required data-error="Please enter a number"
                                               placeholder="Number of Children">
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <strong>ReCaptcha:</strong>

                                            <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>

                                            @if ($errors->has('g-recaptcha-response'))

                                                <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>

                                            @endif

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-12 col-md-12 text-center">
                                    <button type="submit" class="default-btn contact-btn">
                                        Submit Booking Request
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    @push('js')
        <script>
            $(document).ready(function() {
                // Hide return date field initially
                $('#returnDateGroup').hide();

                // Show/hide based on trip type
                $('select[name="tripType"]').change(function() {
                    const tripType = $(this).val();
                    if (tripType === 'round-trip') {
                        $('#returnDateGroup').show();
                    } else {
                        $('#returnDateGroup').hide();
                    }
                });
            });

        </script>
    @endpush
@endsection
