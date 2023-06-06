@extends('layouts.main')

@section('title', 'Home')

@section('container')
<!-- About -->
<div class="pb-0 pb-sm-2">
    <h1 class="title title--h1 title__separate">About Me</h1>
    {!! nl2br($about->ab_about) !!}
    {{-- <p>I'm Creative Director and UI/UX Designer from Sydney, Australia, working in web development and print media. I enjoy turning complex problems into simple, beautiful and intuitive designs.</p>
    <p>My job is to build your website so that it is functional and user-friendly but at the same time attractive. Moreover, I add personal touch to your product and make sure that is eye-catching and easy to use. My aim is to bring across your message and identity in the most creative way. I created web design for many famous brand companies.</p> --}}
</div>

<!-- What -->
<h2 class="title title--h2 mt-3">What I'm Doing</h2>
<div class="row">
    <!-- Case Item -->
    @foreach ($services as $service)
    <div class="col-12 col-lg-6">
        <div class="case-item box box-inner">
            <img class="case-item__icon" src="{{ asset('uploads/service/' . $service->ser_icon) }}" alt="" />
            <div>
                <h3 class="title title--h3">{{ $service->ser_name }}</h3>
                <p class="case-item__caption">{!! $service->ser_description !!}</p>
            </div>	
        </div>
    </div>
    @endforeach
        
    <!-- Case Item -->
    {{-- <div class="col-12 col-lg-6">
        <div class="case-item box box-inner">
            <img class="case-item__icon" src="{{ asset('assets/icons/icon-dev.png') }}" alt="" />
            <div>
                <h3 class="title title--h3">Web Development</h3>
                <p class="case-item__caption">High-quality development of sites at the professional level.</p>
            </div>
        </div>
    </div> --}}
        
    <!-- Case Item -->
    {{-- <div class="col-12 col-lg-6">
        <div class="case-item box box-inner">
            <img class="case-item__icon" src="{{ asset('assets/icons/icon-app.png') }}" alt="" />
            <div>
                <h3 class="title title--h3">Mobile Apps</h3>
                <p class="case-item__caption">Professional development of applications for iOS and Android.</p>
            </div>
        </div>
    </div> --}}
        
    <!-- Case Item -->
    {{-- <div class="col-12 col-lg-6">
        <div class="case-item box box-inner">
            <img class="case-item__icon" src="{{ asset('assets/icons/icon-photo.png') }}" alt="" />
            <div>
                <h3 class="title title--h3">Photography</h3>
                <p class="case-item__caption">I make high-quality photos of any category at a professional level.</p>
            </div>
        </div>
    </div> --}}
</div>	

@endsection