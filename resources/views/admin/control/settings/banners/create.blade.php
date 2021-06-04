@extends('layouts.admin-master')

@section('title')
    Adicionar novo banner
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Novo banner</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Banner</h4>
                        </div>

                        <form action="{{ route('admin.banners.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nome que ficará no banner</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" required>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Descrição do banner</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="description" maxlength="70" required>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('description') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Imagem <br>
                                        <small>Dimensões: 778x585 pixels</small>
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="file" name="image_path" class="form-control {{ $errors->has('image_path') ? ' is-invalid' : '' }}" required>
                                        @error('image_path')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary"><span>Adicionar</span></button>
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
