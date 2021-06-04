@extends('layouts.principal.main')
@section('content')
    @include('layouts.principal.partials.slider')
    <div id="number-mobile" role="tablist" aria-multiselectable="true" class="d-md-none">
        <div class="card">
            <div class="card-header" role="tab" id="section1HeaderId" data-toggle="collapse" data-parent="#number-mobile" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
                <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#number-mobile" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
                       <i class="fa fa-phone"></i> Escolha a sua cidade
                    </a>
                </h5>
            </div>
            <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                <div class="card-body">
                    <ul class="list-mobile">
                        <li><h5><a href="#">Formosa-GO (61) 3631 0918</a></h5></li>
                        <li><h5><a href="#">Planaltina-GO (61) 3637 0505</a></h5></li>
                        <li><h5><a href="#">Campos Belos-GO (62) 3451 1851</a></h5></li>
                        <li><h5><a href="#">Posse-GO (62) 3481 1558</a></h5></li>
                        <li><h5><a href="#">São João d’Aliança-GO (62) 3438 1184</a></h5></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="phone-numbers">
        <ul>
            <li><h5><a href="#">Formosa-GO (61) 3631 0918 <span class="pipe">&nbsp;</span></a></h5></li>
            <li><h5><a href="#">Planaltina-GO (61) 3637 0505 <span class="pipe">&nbsp;</span></a></h5></li>
            <li><h5><a href="#">Campos Belos-GO (62) 3451 1851 <span class="pipe">&nbsp;</span></a></h5></li>
            <li><h5><a href="#">Posse-GO (62) 3481 1558 <span class="pipe">&nbsp;</span></a></h5></li>
            <li><h5><a href="#">São João d’Aliança-GO (62) 3438 1184</a></h5></li>
        </ul>
    </div>
    @include('layouts.principal.partials.about-section')

    <div class="banner-area pt-135 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="banner-wrapper mb-30">
                        <a href="{{ route('motorcycle.index') }}"><img src="{{ asset('principal/img/banner/banner-1.jpg') }}" alt="image"></a>
                        <div class="banner-content">
                            <h2>MOTOS</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="banner-wrapper mb-30">
                        <a href="{{ route('locals') }}"><img src="{{ asset('principal/img/banner/banner-2.jpg') }}" alt="image"></a>
                        <div class="banner-content">
                            <h2>LOJAS</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="banner-wrapper mb-30">
                        <a href="{{ route('contato.index') }}"><img src="{{ asset('principal/img/banner/banner-3.jpg') }}" alt="image"></a>
                        <div class="banner-content">
                            <h2>ATENDIMENTO</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.principal.partials.motorcycle')
    @include('layouts.principal.partials.banner-bikes')
    @include('layouts.principal.partials.testmonials')

    <div class="blog-area pt-150 pb-110">
        <div class="container">
            <div class="section-title text-center mb-60">
                <h2>NOSSO BLOG</h2>
            </div>
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-hm-wrapper mb-40">
                            <div class="blog-img">
                                <a href="{{ route('blog.show', $post->slug) }}"><img src="{{ asset($post->thumb_path) }}" alt="image"></a>
                                <div class="blog-date">
                                    <h4>{{ $post->created_at->format('d\/m\/Y') }}</h4>
                                </div>
                                <div class="blog-hm-social">
                                    <ul>
                                        <li><a href="https://pt-br.facebook.com/motoformosa/" target="_blank"><i class="fa fa-facebook text-white"></i></a></li>
                                        <li><a href="https://www.instagram.com/motoformosa/" target="_blank"><i class="fa fa-instagram text-white"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-hm-content">
                                <h3><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h3>
                                <p>
                                    {!! \Illuminate\Support\Str::limit(strip_tags($post->content), 130) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="newsletter-area">
        <div class="container">
            <div class="newsletter-wrapper-all theme-bg-2">
                <div class="row">
                    <div class="col-lg-5 col-12 col-md-12">
                        <div class="newsletter-img bg-img" style="background-image: url({{ asset('principal/img/banner/newsletter-bg.png') }})">
                            <img alt="image" src="{{ asset('principal/img/team/newsletter-img.png') }}">
                        </div>
                    </div>
                    <div class="col-lg-7 col-12 col-md-12">
                        <div class="newsletter-wrapper text-center">
                            <div class="newsletter-title">
                                <h3 class="text-white">FIQUE POR DENTRO DAS NOVIDADES</h3>
                            </div>
                            <div id="mc_embed_signup" class="subscribe-form">
                                <form action="" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                    <div id="mc_embed_signup_scroll" class="mc-form">
                                        <input type="email" value="" name="EMAIL" class="email" placeholder="Digite seu e-mail aqui..." required>
                                        <div class="mc-news" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                        <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" />
@endpush
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/jquery-sticky@1.0.4/jquery.sticky.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
@endpush
