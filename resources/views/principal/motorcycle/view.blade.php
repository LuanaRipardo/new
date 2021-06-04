@extends('layouts.principal.main')
@section('content')
    @component('layouts.principal.partials.top-internal-component', ['title' => request('category-name') ?? 'Categoria de motos'])
        <ul>
            <li>
                <a href="{{ route('home-site') }}">Início</a>
            </li>
            <li>
                <a href="{{ route('motorcycle.index') }}">Categoria de moto</a>
            </li>
            <li>Lojas</li>
        </ul>
    @endcomponent
    <div class="container mb-140">
        <div class="overview-area pt-70">
            <div class="container">

                <div class="row">
                    @foreach($bikes as $bike)
                        <div class="col-sm-4 mt-5">
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="{{ route('home.motorcycle', $bike->slug) }}">
                                        <img src="{{ asset($bike->path) }}" alt="">
                                    </a>
                                    <div class="product-item-dec">
                                        <ul>
                                        </ul>
                                    </div>
                                    <div class="product-content-wrapper">
                                        <div class="product-title-spreed">
                                            <h4><a href="{{ route('home.motorcycle', $bike->slug) }}">{{ $bike->name }}</a></h4>
                                            <span>{{ $bike->rpm }}</span>
                                        </div>

                                        <div class="product-price">
                                            <span>{{ $bike->price }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
