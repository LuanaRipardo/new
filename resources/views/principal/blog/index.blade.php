@extends('layouts.principal.main')
@section('content')
    @component('layouts.principal.partials.top-internal-component', ['title' => 'Blog'])
        <ul>
            <li>
                <a href="{{ route('home-site') }}">Início</a>
            </li>
            <li>Blog</li>
        </ul>
    @endcomponent

    <div class="blog-area pt-120 pb-130">
        <div class="container">
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
            {{ $posts->links() }}

        </div>
    </div>

@endsection

@push('css')
    <style>
        .blog-date h4 {
            padding: 35px 15px 9px 14px;
        }
    </style>
@endpush
