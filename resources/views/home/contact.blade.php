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

    <!-- Contact Card Section Start -->
    <div class="contact-card-section pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="contact-card">
                        <i class="icofont-phone"></i>
                        <a href="{{$web->whatsappSupport}}" target="_blank">{{$web->phone}} (For Whatsapp Call and Chats)</a>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="contact-card">
                        <i class="icofont-ui-message"></i>
                        <a href="mailto:{{$web->email}}">
                            <span>{{$web->email}}</span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6  ">
                    <div class="contact-card">
                        <i class="icofont-location-pin"></i>
                        <ul>
                            <li>{{$web->address}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Card Section End -->


@endsection
