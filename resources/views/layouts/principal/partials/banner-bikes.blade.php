@inject('bannerBikes', '\App\Models\Banner')

<div class="latest-product-area pt-205 pb-145 bg-img" style="background-image: url({{ asset('principal/img/banner/banner-4.jpg') }})">
    <div class="container-fluid">
        <div class="latest-product-slider owl-carousel">

            @foreach($bannerBikes->banner()->orderBy('id', 'asc')->get() as $bike)
                <div class="single-latest-product slider-animated-2 owl-carousel">
                    <div class="row">
                        <div class="col-lg-7 col-md-12 col-12">
                            <div class="latest-product-img">
                                <img class="animated" src="{{ asset($bike->path) }}" alt="image">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12 col-12">
                            <div class="latest-product-content">
                                <h2 class="animated">{{ $bike->name }}</h2>
                                <p class="animated" style="text-align: justify">{!! $bike->description !!}</p>
                                <div class="latest-price">
                                    <h3 class="animated">MODELO <span>{{ $bike->year }}</span></h3>
                                </div>
                                <div class="latext-btn">
                                    <a class="animated" href="{{ $bike->link }}" target="_blank">VER A MOTO</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
