@extends('layout')
@section('title')
<title>Porto - {{ __('Contact') }}</title>
@endsection
@section('content')
<div role="main" class="main">

    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">

                <div class="col-md-12 align-self-center p-static order-2 text-center">


                    <h1 class="font-weight-bold text-dark">{{ __('Contact') }}</h1>

                </div>

                <div class="col-md-12 align-self-center order-1">


                    <ul class="breadcrumb d-block text-center">
                        <li><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
                        <li class="active"></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4">

        <div class="row mb-2">
            <div class="col">

                <h2 class="font-weight-bold text-7 mt-2 mb-0">{{ __('Contact Us') }}</h2>
                <p class="mb-4">{{ __("Feel free to ask for details, don't save any questions!") }}</p>

                <form class="contact-form-recaptcha-v3" action="{{ route('contact') }}" method="POST">
                    @csrf
                    <div class="contact-form-success alert alert-success d-none mt-4">
                        <strong>{{ __('Success') }}!</strong> {{ __("Your message has been sent to us") }}.
                    </div>

                    <div class="contact-form-error alert alert-danger d-none mt-4">
                        <strong>Error!</strong> There was an error sending your message.
                        <span class="mail-error-message text-1 d-block"></span>
                    </div>

                    <div class="form-row">
                        <div class="form-group col">
                            <label class="mb-1 text-2 text-capitalize">{{ __('subject') }}</label>
                            <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control text-3 h-auto py-2" name="subject" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="mb-1 text-2 text-capitalize">{{ __('message') }}</label>
                            <textarea maxlength="5000" data-msg-required="Please enter your message." rows="5" class="form-control text-3 h-auto py-2" name="message" required></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <input type="submit" value="{{ __('Send Message') }}" class="btn btn-primary btn-modern" data-loading-text="Loading...">
                        </div>
                    </div>
                </form>

            </div>
        </div>
        {{-- <div class="row mb-5">
            <div class="col-lg-4">

                <div class="overflow-hidden mb-3">
                    <h4 class="pt-5 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200" data-plugin-options="{'accY': -200}">Get in <strong>Touch</strong></h4>
                </div>
                <div class="overflow-hidden mb-3">
                    <p class="lead text-4 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="400" data-plugin-options="{'accY': -200}">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius.</p>
                </div>
                <div class="overflow-hidden">
                    <p class="mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="600" data-plugin-options="{'accY': -200}">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius.</p>
                </div>

            </div>
            <div class="col-lg-4 offset-lg-1 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="800" data-plugin-options="{'accY': -200}">

                <h4 class="pt-5">Our <strong>Office</strong></h4>
                <ul class="list list-icons list-icons-style-3 mt-2">
                    <li><i class="fas fa-map-marker-alt top-6"></i> <strong>Address:</strong> 1234 Street Name, City Name</li>
                    <li><i class="fas fa-phone top-6"></i> <strong>Phone:</strong> (123) 456-789</li>
                    <li><i class="fas fa-envelope top-6"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></li>
                </ul>

            </div>
            <div class="col-lg-3 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="1000" data-plugin-options="{'accY': -200}">

                <h4 class="pt-5">Business <strong>Hours</strong></h4>
                <ul class="list list-icons list-dark mt-2">
                    <li><i class="far fa-clock top-6"></i> Monday - Friday - 9am to 5pm</li>
                    <li><i class="far fa-clock top-6"></i> Saturday - 9am to 2pm</li>
                    <li><i class="far fa-clock top-6"></i> Sunday - Closed</li>
                </ul>

            </div>
        </div> --}}

    </div>

    <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
    {{-- <div id="googlemaps" class="google-map m-0 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300" style="height:450px;"></div> --}}

</div>
@endsection
@section('page-js')
    <script>
        @if(session('status'))
        swal({
            icon: "{!! session('status') !!}",
            title: "{!! session('msg') !!}",
            button:false,
            timer: 1500
        });
        @endif
    </script>
@endsection
