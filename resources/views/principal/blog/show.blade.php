@extends('layouts.principal.main')
@section('content')
    @component('layouts.principal.partials.top-internal-component', ['title' => $post->title])
        <ul>
            <li>
                <a href="{{ route('home-site') }}">Início</a>
            </li>
            <li><a href="{{ route('blog') }}">Blog</a></li>
            <li>{{ $post->title }}</li>
        </ul>
    @endcomponent

    <div class="blog-area pt-120 pb-130">
        <div class="container">
            <div class="row">

                <div class="col-lg-4">
                    <div class="product-sidebar-area pr-30">
                        <div class="sidebar-widget pb-55">
                            <h3 class="sidebar-widget">Buscar no blog</h3>
                            <div class="sidebar-search">
                                <form action="{{ route('blog') }}" method="get">
                                    <input type="text" name="q" placeholder="Pesquise aqui...">
                                    <button><i class="ti-search text-white"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget pb-50">
                            <h3 class="sidebar-widget">Categorias</h3>
                            <div class="widget-categories">
                                <ul>
                                    @foreach($categories as $category)
                                        <li><a href="{{ route('blog', ['category' => $category->id]) }}">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget mb-40">
                            <h3 class="sidebar-widget">Siga-nos </h3>
                            <div class="blog-social">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://pt-br.facebook.com/motoformosa/" target="_blank">
                                            <i class="icofont icofont-social-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="https://www.instagram.com/motoformosa/" target="_blank">
                                            <i class="icofont icofont-social-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h3 class="sidebar-widget">Notícias relacionadas</h3>
                            <div class="best-seller">

                                @foreach($others as $other)
                                    <div class="single-best-seller">
                                        <div class="best-seller-img">
                                            <a href="{{ route('blog.show', $other->slug) }}"><img src="{{ asset($other->path) }}" width="100px"></a>
                                        </div>
                                        <div class="best-seller-text">
                                            <h3><a href="{{ route('blog.show', $other->slug) }}">{{ $other->title }}</a></h3>
                                            <span>{{ $other->created_at->format('d\/m\/Y') }}</span>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="blog-details-wrapper res-mrg-top">
                        <div class="blog-img mb-30">
                            <img src="{{ asset($post->path) }}" alt="image">
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
                        <h2>{{ $post->title }}</h2>

                        {!! $post->content !!}
                        
                        <div class="blog-dec-tags-social">
                            <div class="blog-dec-tags">
                                <span>Categoria :</span>
                                <a href="#">{{ $post->category->name }}</a>
                            </div>
                            <div class="blog-dec-social">
                                <span>compartilhe :</span>
                                <div id="share"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsSocials/1.5.0/jssocials.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsSocials/1.5.0/jssocials-theme-flat.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nanogallery/5.10.3/css/nanogallery.min.css" />
    <style>
        .jssocials-share-link { border-radius: 50%; }
        .blog-date h4 {
            padding: 35px 15px 9px 14px;
        }
    </style>
@endpush

@push('css')

@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsSocials/1.5.0/jssocials.min.js"></script>
    <script>
        $("#share").jsSocials({
            showLabel: false,
            showCount: false,
            shareIn: "popup",
            shares: ["twitter", "facebook", "whatsapp", "linkedin"]
        });
    </script>
@endpush
