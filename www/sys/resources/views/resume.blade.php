@extends('layouts.main')

@section('title', 'Resume')

@section('container')

<!-- About -->
<div class="pb-3">
    <h1 class="title title--h1 title__separate">Resume</h1>
</div>

<h2 class="title title--h2"><span class="box icon-box"><i class="font-icon feathericon-briefcase"></i></span>Experience</h2>
<div class="timeline">
    <!-- Item -->
    @foreach ($experience as $exp)    
    <article class="timeline__item">
        <h5 class="title title--h4 timeline__title">{{ $exp->exp_place }}</h5>
        <h3 class="title title--h4 timeline__title"><small><i>{{ $exp->exp_title }}</i></small></h3>
        <span class="timeline__period">
            {{ Tools::months($exp->exp_month_start) }} {{ $exp->exp_year_start }} - 
            @if ($exp->exp_current)
                Present
            @else
            {{ Tools::months($exp->exp_month_finish) }} {{ $exp->exp_year_finish }}
            @endif
        </span>
        <p class="timeline__description">{!! $exp->exp_description !!}</p>
    </article>
    @endforeach
                
    {{-- <!-- Item -->
    <article class="timeline__item">
        <h5 class="title title--h4 timeline__title">Art Director</h5>
        <span class="timeline__period">2013 — 2015</span>
        <p class="timeline__description">Nemo enims ipsam voluptatem, blanditiis praesentium voluptum delenit atque corrupti, quos dolores et quas molestias exceptur.</p>
    </article>
                
    <!-- Item -->
    <article class="timeline__item">
        <h5 class="title title--h4 timeline__title">Web Designer</h5>
        <span class="timeline__period">2010 — 2013</span>
        <p class="timeline__description">Nemo enims ipsam voluptatem, blanditiis praesentium voluptum delenit atque corrupti, quos dolores et quas molestias exceptur.</p>
    </article> --}}
</div>

<!-- Experience -->
<h2 class="title title--h2"><span class="box icon-box"><i class="font-icon feathericon-book-open"></i></span>Education</h2>
<div class="timeline">
    <!-- Item -->
    @foreach ($education as $edu)
    <article class="timeline__item">
        <h5 class="title title--h4 timeline__title">{{ $edu->edu_place }}</h5>
        <h3 class="title title--h4 timeline__title"><small><i>{{ $edu->edu_title }}</i></small></h3>
        <span class="timeline__period">
            {{ Tools::months($edu->edu_month_start) }} {{ $edu->edu_year_start }}
            @if ($edu->edu_current)
                
            @else
            - {{ Tools::months($edu->edu_month_finish) }} {{ $edu->edu_year_finish }}
            @endif
        </span>
        <p class="timeline__description">{!! $edu->edu_description !!}</p>
    </article>
    @endforeach
                
    {{-- <!-- Item -->
    <article class="timeline__item">
        <h5 class="title title--h4 timeline__title">New York Academy of Art</h5>
        <span class="timeline__period">2005 — 2007</span>
        <p class="timeline__description">Ratione voluptatem sequi nesciunt, facere quisquams facere menda ossimus, omnis voluptas assumenda est omnis..</p>
    </article>
                
    <!-- Item -->
    <article class="timeline__item">
        <h5 class="title title--h4 timeline__title">High School of Art and Design</h5>
        <span class="timeline__period">2003 — 2005</span>
        <p class="timeline__description">Duis aute irure dolor in reprehenderit in voluptate, quila voluptas  mag odit aut fugit, sed consequuntur magni dolores eos.</p>
    </article> --}}
</div>

<!-- Skills -->
<h2 class="title title--h2 mt-3">My Skills</h2>
<div class="swiper-container js-carousel-clients">
    <div class="swiper-wrapper">
        <!-- Item client -->
        @foreach ($skill as $sk)
        <figure class="swiper-slide">
            <img height="131px" width="209px" class="img-gray" src="{{ asset('uploads/skill/' . $sk->sk_image) }}" alt="{{ $sk->sk_title }}" title="{{ $sk->sk_title }}" />
        </figure>
        @endforeach
            
        {{-- <!-- Item client -->
        <figure class="swiper-slide">
            <img class="img-gray" src="assets/images/clients/logo-2-color.png" alt="Logo" />
        </figure>

        <!-- Item client -->
        <figure class="swiper-slide">
            <img class="img-gray" src="assets/images/clients/logo-3-color.png" alt="Logo" />
        </figure>

        <!-- Item client -->
        <figure class="swiper-slide">
            <img class="img-gray" src="assets/images/clients/logo-4-color.png" alt="Logo" />
        </figure>
            
        <!-- Item client -->
        <figure class="swiper-slide">
            <img class="img-gray" src="assets/images/clients/logo-5-color.png" alt="Logo" />
        </figure>
            
        <!-- Item client -->
        <figure class="swiper-slide">
            <img class="img-gray" src="assets/images/clients/logo-6-color.png" alt="Logo" />
        </figure> --}}
    </div>
        
    <div class="swiper-pagination"></div>
</div>

@endsection