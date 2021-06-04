@extends('layouts.principal.main')
@section('content')
    @component('layouts.principal.partials.top-internal-component', ['title' => 'Categorias de motos'])
        <ul>
            <li>
                <a href="{{ route('home-site') }}">Início</a>
            </li>
            <li>Categorias de moto</li>
        </ul>
    @endcomponent
    <div class="container mb-140">
        <div class="overview-area pt-135">
            <div class="container">

                <div class="row mt-80">
                    @foreach($categories as $category)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-services orange mb-30 text-center">
                                <div class="services-icon">
                                    <img alt="" src="{{ asset('principal/img/logo/logo.png') }}" width="150px">
                                </div>
                                <div class="services-text mt-3">
                                    <h4><a href="{{ route('motorcycle.view-category', $category->slug) }}?category-name={{ $category->name }}">{{ $category->name }}</a></h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
