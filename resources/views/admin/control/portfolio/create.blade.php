@extends('layouts.admin-master')

@section('title')
    Inserir imagem
@endsection

@section('content')
    @include('components.notifications')
    <section class="section">
        <div class="section-header">
            <h1>Inserir nova imagem</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Publicação</h4>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('admin.portfolio.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 offset-3">
                                        <div class="form-group">
                                            <label for="image">Selecione a imagem</label>
                                            <input type="file" name="image_path" class="form-control" id="image">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block float-right">Salvar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
@endpush
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
    <script>
        $('#editor').summernote({
            placeholder: 'Escreva sua publicação aqui',
            tabsize: 2,
            height: 100
        });
    </script>
@endpush
