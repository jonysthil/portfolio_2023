@extends('layouts.main')

@section('title', 'Portfolio')

@section('container')

<!-- About -->
<div class="pb-3">
    <h1 class="title title--h1 title__separate">Portfolio</h1>
</div>

<!-- Filter -->
<div class="select">
    <span class="placeholder">Select category</span>
    <ul class="filter">
        <li class="filter__item">Category</li>
        <li class="filter__item active" data-filter="*"><a class="filter__link active" href="#filter">All</a></li>
        @foreach ($categories as $cat)
        <li class="filter__item" data-filter=".{{ $cat->pc_id }}"><a class="filter__link" href="#filter">{{ $cat->pc_name }}</a></li>
        @endforeach
        {{-- <li class="filter__item" data-filter=".category-design"><a class="filter__link" href="#filter">Web Design</a></li>
        <li class="filter__item" data-filter=".category-applications"><a class="filter__link" href="#filter">Applications</a></li>
        <li class="filter__item" data-filter=".category-web-development"><a class="filter__link" href="#filter">Web Development</a></li> --}}
    </ul>
    <input type="hidden" name="changemetoo"/>
</div>

<!-- Gallery -->
<div class="gallery-grid js-masonry js-filter-container">
    <div class="gutter-sizer"></div>
    <!-- Item 1 -->
    @foreach ($proyects as $proy)
    <div class="gallery-grid__item {{ Tools::yourCategoriesId($proy->prt_id) }}">
        <a href="{{ route('p.portfolio.detail', $proy->prt_slug) }}">
            <div class="gallery-grid__image-wrap">
                <img class="gallery-grid__image cover lazyload" src="{{ route('p.portfolio.image.head', $proy->prt_id) }}" alt="image-{{ $proy->prt_name }}" />
            </div>
            <div class="gallery-grid__caption">
                <h3 class="title gallery-grid__title">{{ $proy->prt_title }}</h3>
                <span class="gallery-grid__category">{{ Tools::yourCategoriesName($proy->prt_id) }}</span>
            </div>
        </a>
    </div>        
    @endforeach
    {{-- <div class="gallery-grid__item category-design">
        <a href="{{ route('p.portfolio.detail') }}">
            <div class="gallery-grid__image-wrap">
                <img class="gallery-grid__image cover lazyload" src="assets/images/280x204.jpg" alt="" />
            </div>
            <div class="gallery-grid__caption">
                <h3 class="title gallery-grid__title">Moonboard</h3>
                <span class="gallery-grid__category">Web Design</span>
            </div>
        </a>
    </div>
    
    <!-- Item 2 -->
    <div class="gallery-grid__item category-applications">
        <a href="{{ route('p.portfolio.detail') }}">
            <div class="gallery-grid__image-wrap">
                <img class="gallery-grid__image cover lazyload" src="assets/images/280x204.jpg" alt="" />
            </div>
            <div class="gallery-grid__caption">
                <h3 class="title gallery-grid__title">Gourmania</h3>
                <span class="gallery-grid__category">Applications</span>
            </div>
        </a>
    </div>
    
    <!-- Item 3 -->
    <div class="gallery-grid__item category-web-development">
        <a href="{{ route('p.portfolio.detail') }}">
            <div class="gallery-grid__image-wrap">
                <img class="gallery-grid__image cover lazyload" src="assets/images/bg1.jpg" alt="" />
            </div>
            <div class="gallery-grid__caption">
                <h3 class="title gallery-grid__title">Rocket</h3>
                <span class="gallery-grid__category">Web Development</span>
            </div>
        </a>
    </div>

    <!-- Item 4 -->
    <div class="gallery-grid__item category-applications">
        <a href="{{ route('p.portfolio.detail') }}">
            <div class="gallery-grid__image-wrap">
                <img class="gallery-grid__image cover lazyload" src="assets/images/280x204.jpg" alt="" />
            </div>
            <div class="gallery-grid__caption">
                <h3 class="title gallery-grid__title">Micro</h3>
                <span class="gallery-grid__category">Applications</span>
            </div>
        </a>
    </div>

    <!-- Item 5 -->
    <div class="gallery-grid__item category-web-development">
        <a href="{{ route('p.portfolio.detail') }}">
            <div class="gallery-grid__image-wrap">
                <img class="gallery-grid__image cover lazyload" src="assets/images/bg1.png" alt="" />
            </div>
            <div class="gallery-grid__caption">
                <h3 class="title gallery-grid__title">Elemento</h3>
                <span class="gallery-grid__category">Web Development</span>
            </div>
        </a>
    </div>

    <!-- Item 6 -->
    <div class="gallery-grid__item category-design">
        <a href="{{ route('p.portfolio.detail') }}">
            <div class="gallery-grid__image-wrap">
                <img class="gallery-grid__image cover lazyload" src="assets/images/280x204.jpg" alt="" />
            </div>
            <div class="gallery-grid__caption">
                <h3 class="title gallery-grid__title">Alpha</h3>
                <span class="gallery-grid__category">Web Design</span>
            </div>
        </a>
    </div>

    <!-- Item 7 -->
    <div class="gallery-grid__item category-web-development">
        <a href="{{ route('p.portfolio.detail') }}">
            <div class="gallery-grid__image-wrap">
                <img class="gallery-grid__image cover lazyload" src="assets/images/280x204.jpg" alt="" />
            </div>
            <div class="gallery-grid__caption">
                <h3 class="title gallery-grid__title">Voltum</h3>
                <span class="gallery-grid__category">Web Development</span>
            </div>
        </a>
    </div>

    <!-- Item 8 -->
    <div class="gallery-grid__item category-applications">
        <a href="{{ route('p.portfolio.detail') }}">
            <div class="gallery-grid__image-wrap">
                <img class="gallery-grid__image cover lazyload" src="assets/images/280x204.jpg" alt="" />
            </div>
            <div class="gallery-grid__caption">
                <h3 class="title gallery-grid__title">Orange</h3>
                <span class="gallery-grid__category">Applications</span>
            </div>
        </a>
    </div>

    <!-- Item 9 -->
    <div class="gallery-grid__item category-design">
        <a href="{{ route('p.portfolio.detail') }}">
            <div class="gallery-grid__image-wrap">
                <img class="gallery-grid__image cover lazyload" src="assets/images/280x204.jpg" alt="" />
            </div>
            <div class="gallery-grid__caption">
                <h3 class="title gallery-grid__title">Omega</h3>
                <span class="gallery-grid__category">Web Design</span>
            </div>
        </a>
    </div> --}}
</div>

@endsection