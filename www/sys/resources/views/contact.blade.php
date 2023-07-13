@extends('layouts.main')

@section('title', 'Home')

@section('container')

<!-- About -->
<div class="pb-0 pb-sm-2">
    <h1 class="title title--h1 title__separate">Contact</h1>
</div>

<!-- Contact -->
{{-- <div class="map" id="map"></div> --}}

<div class="row">
    <div class="col-md-8">
        
        @if (session('success'))
        <p class="text-success">Thank you for contacting me, I will answer you as soon as possible. <br> <strong>Good luck!</strong></p>
        @endif

        <form class="contact-form" action="{{ route('p.contact.message') }}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-12 col-md-4">
                    <input type="text" value="{{ old('name_contact') }}" class="input form-control @error('name_contact') is-invalid @enderror" id="name_contact" name="name_contact" placeholder="Full name">
                    @error('name_contact') <div class="help-block with-errors">{!! $message !!}</div> @enderror
                </div>
                <div class="form-group col-12 col-md-4">
                    <input type="text" value="{{ old('email_contact') }}" class="input form-control @error('email_contact') is-invalid @enderror" id="email_contact" name="email_contact" placeholder="Email address">
                    @error('email_contact') <div class="help-block with-errors">{!! $message !!}</div> @enderror
                </div>
                <div class="form-group col-12 col-md-4">
                    <input type="tel" value="{{ old('phone_contact') }}" class="input form-control @error('phone_contact') is-invalid @enderror" id="phone_contact" name="phone_contact" placeholder="Phone">
                    @error('phone_contact') <div class="help-block with-errors">{!! $message !!}</div> @enderror
                </div>
                <div class="form-group col-12 col-md-12">
                    <textarea class="textarea form-control @error('message_contact') is-invalid @enderror" id="message_contact" name="message_contact" placeholder="Your Message"  rows="4">{{ old('message_contact') }}</textarea>
                    @error('message_contact') <div class="help-block with-errors">{!! $message !!}</div> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 order-1 order-md-1 text-center text-md-center">
                    <div class="g-recaptcha" data-theme="dark" data-sitekey="6LcFD8QcAAAAAGcG9gBBa6DsAlIzusjVBRlxvKIR"></div>
                    @error('g-recaptcha-response') <div class="help-block with-errors">{!! $message !!}</div> @enderror
                </div>
                <div class="col-12 col-md-6 order-2 order-md-2 text-end">
                    <button type="submit" class="btn"><i class="font-icon icon-send"></i> Send Message</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4">
        {{-- <h2 class="title title--h2">More info</h2> --}}
        <p>
            Let me help you create engaging and relevant content that drives results. Contact me now to find out how I can help you.
        </p>
        <div class="separation d-xl-none"></div>

        <!-- Social -->
        <div class="social">
            {{-- <a class="social__link" href="https://www.facebook.com/"><i class="feathericon-facebook"></i></a> --}}
            <a class="social__link" target="_blank" href="https://www.facebook.com/jonysthil"><i class="lab la-facebook-f"></i></a>
            <a class="social__link" target="_blank" href="https://www.linkedin.com/in/jonathan-jimenez-gamero/"><i class="lab la-linkedin-in"></i></a>
            <a class="social__link" target="_blank" href="https://github.com/jonysthil"><i class="lab la-github"></i></a>
            {{-- <a class="social__link" href="https://www.linkedin.com/"><i class="feathericon-instagram"></i></a> --}}
        </div>
        <p>Jonathan Jimenez Web Developer</p>
    </div>
</div>
    

@endsection