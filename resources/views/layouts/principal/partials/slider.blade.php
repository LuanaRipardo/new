@inject('bannerPrincipal', '\App\Models\Banner',)

<div class="slider-area" style="z-index: 9">
    <div class="slider-active owl-carousel">


        @foreach($bannerPrincipal->orderBy('id', 'asc')->principal()->get() as $principal)
            <div class="single-slider slider-1" style="background-image: url({{ asset('principal/img/slider/slider-bg.jpg') }})">
                <div class="container">
                    <div class="slider-content slider-animated-1">
                        <div class="slider-img text-center">
                            <img class="animated" src="{{ asset($principal->path) }}" alt="slider images">
                        </div>
                        <div class="slider-text-img">
                            <h6 class="animated">{{ $principal->description }}</h6>
                            <img class="animated" src="{{ asset('principal/img/icon-img/bike.png') }}" alt="slider images">
                        </div>
                        <h2 class="animated">{{ $principal->name }}</h2>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
    <div class="slider-social">
        <ul>
            <li class="facebook"><a href="https://pt-br.facebook.com/motoformosa/" target="_blank"><i class="lni-facebook-filled"></i></a></li>
            <li class="pinterest"><a href="https://www.instagram.com/motoformosa/" target="_blank"><i class="lni-instagram-original"></i></a></li>
        </ul>
    </div>
</div>
