<section id="image-grid" class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Image gallery</h4>
            </div>
            <div class="col-md-6 text-right">
                <button 
                    class="btn btn-sm btn-primary"
                    data-toggle="modal" 
                    data-target="#portfolio-new-image">
                    <i class="la la-plus"></i> New image
                </button>
            </div>
        </div>
    </div>
    @include('admin/portfolio-gallery/new')
    <div class="card-content">
        <div class="card-body">
            <div class="card-text">
                <p class="text-info">Just move the images in the order you want</p>
            </div>
        </div>
        <div class="card-body  my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
            <div class="card-deck-wrapper">
                <div class="card-deck"></div>
                <div class="row changeOrder" id="sec_gallery" data-url="{{ route('portfolio.gallery.order') }}">
                    @foreach ($gallery as $ga)
                    <div id="ord-{{ $ga->pg_id }}" class="col-md-3" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                        <figure  class="card card-img-top card-img-bottom border-grey border-lighten-2 mb-0" >
                            <a href="{{ asset('uploads/portfolio/'.$ga->pg_name) }}" itemprop="contentUrl" data-size="560x340">
                                <img class="gallery-thumbnail card-img-top" src="{{ asset('uploads/portfolio/'.$ga->pg_name) }}" itemprop="thumbnail" alt="Image description" />
                            </a>
                        </figure>
                        <div class="card-body px-0 mt-0">
                            <div class="row">
                                <div class="col-md-7 text-left">
                                    <button data-head="{{ $ga->pg_head }}" data-id="{{ $ga->pg_id }}" data-proy="{{ $proyect->prt_id }}" data-url="{{ route('portfolio.gallery.head') }}" class="btn btn-sm btn-secondary isHeadElement">
                                        <span id="select-head-{{ $loop->iteration }}">
                                            <i class="la la-trophy text-{{ ($ga->pg_head) ? 'warning' : '' }}"></i> My head
                                        </span>
                                    </button>
                                </div>
                                <div class="col-md-5 text-right">
                                    <a class="btn btn-sm btn-danger" 
                                        href="javascript:return false;" 
                                        onclick="document.modelFormImage.action='{{ route('portfolio.gallery.delete', [$proyect->prt_id, $ga->pg_id]) }}';" 
                                        data-toggle="modal" 
                                        data-target="#portfolio-gallery-delete">
                                        <i class="la la-trash font-medium-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
        </div>

        @include('admin/portfolio-gallery/delete')
        <!-- Root element of PhotoSwipe. Must have class pswp. -->
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

            <!-- Background of PhotoSwipe. 
It's a separate element as animating opacity is faster than rgba(). -->
            <div class="pswp__bg"></div>

            <!-- Slides wrapper with overflow:hidden. -->
            <div class="pswp__scroll-wrap">

                <!-- Container that holds slides. 
PhotoSwipe keeps only 3 of them in the DOM to save memory.
Don't modify these 3 pswp__item elements, data is added later on. -->
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>

                <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                <div class="pswp__ui pswp__ui--hidden">

                    <div class="pswp__top-bar">

                        <!--  Controls are self-explanatory. Order can be changed. -->

                        <div class="pswp__counter"></div>

                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                        <button class="pswp__button pswp__button--share" title="Share"></button>

                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                        <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                        <!-- element will get class pswp__preloader-active when preloader is running -->
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

                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                    </button>

                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                    </button>

                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div> 

                </div>

            </div>
        </div>
    </div>
    <!--/ PhotoSwipe -->
</section>
