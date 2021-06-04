@inject('motorcycles', '\App\Models\Bikes\Bike')
@inject('bikeCategory', '\App\Models\Bikes\BikeCategory')

<div class="product-area pb-190">
    <div class="container">
        <div class="section-title text-center mb-50">
            <h2>ESCOLHA UMA MOTO</h2>
            <p>A <strong>Moto Formosa</strong> tem sempre uma Honda perfeita para você com os melhores preços da cidade. Confira nossos modelos e venha até a nossa loja. </p>
        </div>

        <div class="button-group filter-button-group bar-category-search">
            @foreach($bikeCategory->orderBy('id', 'asc')->get() as $category)
                <button data-filter="{{ $category->id }}" class="button-category-search">{{ $category->name }}</button>
            @endforeach
        </div>

        <div class="row multiple-items" id="motorcycles-slider">
            @foreach($motorcycles->all() as $bike)
                <div class="col-sm-4 mt-5 grid-item {{ $bike->category->slug }}-{{ $bike->category->id }}">
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="http://mformosa.test/motos/cg-160-fan">
                                <img src="{{ asset($bike->path) }}" alt="">
                            </a>
                            <div class="product-content-wrapper">
                                <div class="product-title-spreed">
                                    <h4><a href="http://mformosa.test/motos/cg-160-fan">{{ $bike->name }}</a></h4>
                                    <span>{{ $bike->rpm }} RPM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-3">
            <img src="https://image.flaticon.com/icons/svg/96/96947.svg" class="flash animated infinite slower" width="50">
        </div>
    </div>
</div>

@push('css')
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <style>
        @media screen and (max-width: 500px) {
            .d-xs-none {
                display: none
            }
        }
    </style>
@endpush

@push('js')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
    <script src="{{ asset('principal/js/filter-bikes.js') }}"></script>
@endpush
