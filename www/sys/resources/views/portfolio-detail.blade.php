@extends('layouts.main')

@section('title', 'Proyect :: '.$proyect->prt_title)

@section('container')
<!-- About -->
<div class="pb-3">
    <h1 class="title title--h1 title__separate">Portfolio</h1>
</div>

<!-- Project details -->
<a class="btn-back" href="{{ route('p.portfolio') }}"><i class="feathericon-arrow-left"></i>Back Portfolio</a>

<header class="header-project">
    <h1 class="title title--h1">{{ $proyect->prt_title }}</h1>
    <div class="header-project__image-wrap">
        <img class="cover lazyload" src="{{ route('p.portfolio.image.head', $proyect->prt_id) }}" alt="{{ $proyect->prt_title }}" />
    </div>
</header>

<ul class="details-info details-info--inline">
    <!-- Client -->
    {{-- <li class="details-info__item">
        <span class="box icon-box"><i class="font-icon feathericon-user"></i></span>
        <div class="details-info__info">
            <span class="overhead">Client</span>
            ArtTemplate
        </div>
    </li> --}}
    <!-- Category -->
    <li class="details-info__item">
        <span class="box icon-box"><i class="font-icon feathericon-layers"></i></span>
        <div class="details-info__info">
            <span class="overhead">Category</span>
            {{ Tools::yourCategoriesName($proyect->prt_id) }}
        </div>
    </li>
    <!-- Date -->
    <li class="details-info__item">
        <span class="box icon-box"><i class="font-icon icon-calendar"></i></span>
        <div class="details-info__info">
            <span class="overhead">Date</span>
            {{ $proyect->prt_date->format('F, Y') }}
        </div>
    </li>
</ul>

{!! $proyect->prt_description !!}

<div class="swiper-container js-carousel-project">
    <div class="swiper-wrapper project-gallery">
        <!-- Item -->
        @foreach ($gallery as $img)
        <figure class="swiper-slide swiper-slide-project">
            <a id="first" title="click to zoom-in" href="{{ route('p.portfolio.images', $img->pg_id) }}" data-size="1920x1080">
                <img class="lazyload" src="{{ route('p.portfolio.images', $img->pg_id) }}" alt="{{ $img->pg_name }}" />
            </a>
        </figure>
        @endforeach
                
        {{-- <!-- Item -->
        <figure class="swiper-slide swiper-slide-project">
            <a title="click to zoom-in" href="{{ asset('assets/images/bg1.jpg') }}" data-size="1920x1080">
                <img class="lazyload" src="{{ asset('assets/images/bg1.jpg') }}" alt="" />
            </a>
        </figure>

        <!-- Item -->
        <figure class="swiper-slide swiper-slide-project">
            <a title="click to zoom-in" href="{{ asset('assets/images/560x340.jpg') }}" data-size="1920x1080">
                <img class="lazyload" src="{{ asset('assets/images/560x340.jpg') }}" alt="" />
            </a>
        </figure>

        <!-- Item -->
        <figure class="swiper-slide swiper-slide-project">
            <a title="click to zoom-in" href="{{ asset('assets/images/bg1.png') }}" data-size="1920x1080">
                <img class="lazyload" src="{{ asset('assets/images/bg1.png') }}" alt="" />
            </a>
        </figure> --}}
    </div>
    <div class="swiper-pagination"></div>
</div>

<!-- PhotoSwipe -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>

    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>

<div class="back-to-top"></div>	

@endsection