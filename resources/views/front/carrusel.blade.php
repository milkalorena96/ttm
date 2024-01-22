
<section class="hero-wrap degree-right js-fullheight">
    <div class="home-slider js-fullheight owl-carousel">
        @forelse ($carrusel as $item)
        <div class="slider-item js-fullheight" style="background-image:url('/img/carrusel/{{$item->imagen}}');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center">
                    <div class="col-md-12 ftco-animate">
                        <div class="absolute">
                            <h4 class="number" data-number="200">0</h4>
                            <p style="color:white;">{{ __("More than a hundred beautiful places to enjoy")}}</p>
                        </div>
                        <div class="text">
                            <h1 class="mb-4">Tingo María</h1>
                            <p>{{ __("Here you can find the best tourist places.") }}</p>
                            <p class="mb-0"><a href="#visitados" class="btn btn-primary py-md-3 py-2 px-2 px-md-4">{{ __("Explore")}}</a></p>
                        </div>
                    </div>
                    <a href="https://www.youtube.com/watch?v=1ysLRqEwxY0" class="img-video popup-vimeo d-flex align-items-center justify-content-center">
                        <span class="fa fa-play"></span>
                    </a>
                </div>
            </div>
        </div>
        @empty
        @endforelse
    </div>
</section>
