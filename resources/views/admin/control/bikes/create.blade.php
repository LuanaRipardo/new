@extends('layouts.admin-master')

@section('title')
    Adicionar nova moto
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Nova moto</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.bikes.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4>Moto</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="name">Nome<span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="rpm">RPM<span class="text-danger">*</span></label>
                                            <input type="number" name="rpm" id="rpm" value="{{ old('rpm') }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="price">Preço</label>
                                            <input type="text" name="price" id="price" class="form-control numeric" value="{{ old('price') }}" data-prefix="R$ " data-thousands="." data-decimal=",">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="year">Ano<span class="text-danger">*</span></label>
                                            <input type="text" name="year" id="year" value="{{ old('year') }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="image">Imagem principal<span class="text-danger">*</span></label>
                                            <input type="file" name="image_path" id="image" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="bike-category">Categoria<span class="text-danger">*</span></label>
                                            <select name="bike_category" id="bike-category" class="form-control">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="description">Descrição da moto<span class="text-danger">*</span></label>
                                        <textarea name="description" id="description" rows="5" class="form-control summernote">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Adicionar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </section>
@endsection
@push('css')
    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
@endpush
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <script>
        $('.numeric').maskMoney();
    </script>
@endpush
