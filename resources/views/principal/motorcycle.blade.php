@extends('layouts.principal.main')
@section('content')
    @component('layouts.principal.partials.top-internal-component', ['title' => $bike->name])
        <ul>
            <li>
                <a href="{{ route('home-site') }}">Início</a>
            </li>
            <li>{{ $bike->name }}</li>
        </ul>
    @endcomponent

    <div class="product-details-area fluid-padding-3 ptb-130">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-details-img-content">
                        <div class="product-details-tab mr-40">
                            <div class="product-details-large tab-content">
                                <div class="tab-pane active" id="pro-details1">
                                    <div class="easyzoom easyzoom--overlay is-ready">
                                        <a href="null">
                                            <img src="{{ asset($bike->path) }}" alt="">
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-details-content">
                        <h2>{{ $bike->name }} &mdash; {{ $bike->year }}</h2>
                        <div class="quick-view-rating">
                            <i class="fa fa-star reting-color"></i>
                            <i class="fa fa-star reting-color"></i>
                            <i class="fa fa-star reting-color"></i>
                            <i class="fa fa-star reting-color"></i>
                            <i class="fa fa-star reting-color"></i>
                        </div>

                        @if($bike->price != null)
                            <div class="product-price">
                                <span>R$ {{ number_format($bike->price, 2, ',', '.') }}</span>
                            </div>
                        @endif

                        <div class="product-overview">
                            <h5 class="pd-sub-title">Detalhes da moto</h5>
                            <p>{!! strip_tags($bike->description)  !!}</p>
                        </div>
                        @if($bike->attributes()->exists())
                            <div class="product-categories">
                                <h5 class="pd-sub-title">Detalhes</h5>
                                <ul>
                                    @foreach($bike->attributes as $key => $attr)
                                        <li>
                                            <a href="#">{{ $attr->name }},</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="product-share">
                            <h5 class="pd-sub-title">Compartilhe</h5>
                            <div id="share"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-3">
            @if($bike->images()->exists())
                <div id="nanoGallery3">
                    @foreach($bike->images as $image)
                        <a href="{{ $image->path }}" data-ngthumb="{{ $image->thumb_path }}"></a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

@endsection
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsSocials/1.5.0/jssocials.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsSocials/1.5.0/jssocials-theme-flat.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nanogallery/5.10.3/css/nanogallery.min.css" />
    <style>
        .jssocials-share-link { border-radius: 50%; }
    </style>
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsSocials/1.5.0/jssocials.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nanogallery/5.10.3/jquery.nanogallery.min.js"></script>
    <script>
        $("#share").jsSocials({
            showLabel: false,
            showCount: false,
            shareIn: "popup",
            shares: ["twitter", "facebook", "googleplus", "whatsapp"]
        });
        $("#nanoGallery3").nanoGallery({
            itemsBaseURL:'http://mformosa.test/',
            thumbnailWidth: 200,
            "thumbnailLabel": {
                "display": false
            },
        });
    </script>
@endpush
