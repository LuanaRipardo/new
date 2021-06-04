@extends('layouts.admin-master')

@section('title')
    Administração de publicações
@endsection

@section('content')
    @include('components.notifications')
    <section class="section">
        <div class="section-header">
            <h1>Administração de publicações</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Publicações <span>({{ $posts->total() }})</span></h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Adicionar <i
                                        class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped table-md">
                                <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Título</th>
                                    <th>Autor</th>
                                    <th>Categoria</th>
                                    <th>Registrado em</th>
                                    <th></th>
                                </tr>
                                @foreach($posts as $post)
                                    <tr>
                                        <td><img src="{{ $post->thumb_path == null ? 'https://via.placeholder.com/100x100' : asset($post->thumb_path) }}" width="50" alt=""></td>
                                        <td style="vertical-align: middle;text-align: center;"><span class="badge badge-light w-100">{{ $post->title }}</span></td>
                                        <td><a href="{{ route('admin.users.edit', $post->user->id) }}" target="_blank">{{ $post->user->name }}</a></td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ $post->created_at_formatted }}</td>
                                        <td class="text-right">
                                            <a href="#" class="btn btn-danger btn-xs" id="btn-{{ $post->id }}" onclick="deleteItem('btn-{{ $post->id }}')" data-form-id="form-{{ $post->id }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post" id="form-{{ $post->id }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
