@extends('layouts.admin-master')

@section('title')
    Atualizar moto &mdash; {{ $bike->name }}
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Atualizando &mdash; {{ $bike->name }}</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-sm-6">
                    <form action="{{ route('admin.bikes.update', $bike->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $bike->name }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="name">Nome<span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" value="{{ $bike->name }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="rpm">RPM<span class="text-danger">*</span></label>
                                            <input type="number" name="rpm" id="rpm" value="{{ $bike->rpm }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="price">Preço &mdash; R$ {{ number_format($bike->price, 2, ',', '.') }}</label>
                                            <input type="text" name="price" id="price" class="form-control numeric" data-prefix="R$ " data-thousands="." data-decimal=",">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="year">Ano<span class="text-danger">*</span></label>
                                            <input type="text" name="year" id="year" value="{{ $bike->year }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
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
                                    <div class="col-sm-6">
                                        <label for="description">Descrição da moto<span class="text-danger">*</span></label>
                                        <textarea name="description" id="description" rows="5" class="form-control summernote">{{ $bike->description }}</textarea>
                                    </div>
                                    <div class="col-sm-6 text-center">
                                        <label for="image">Imagem principal</label>
                                        <input type="file" name="image_path" id="image" class="form-control">
                                        <img src="{{ $bike->path == null ? 'http://via.placeholder.com/370x488?text=Sua%20imagem%20aqui' : asset($bike->path) }}" width="300px" height="300px" alt="">
                                    </div>
                                </div>
                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Adicionar</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detalhes da moto</h4>
                            <div class="card-header-action">
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#new-attr">
                                    Adicionar <i class="fas fa-plus"></i>
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="new-attr" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <form action="{{ route('admin.bikes.attribute') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="bike_id" value="{{ $bike->id }}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Novo detalhe</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="name">Detalhe</label>
                                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($attributes as $attribute)
                                    <tr>
                                        <td>{{ $attribute->name }}</td>
                                        <td>
                                            <a href="#" class="btn btn-danger btn-xs" id="btn-{{ $attribute->id }}" onclick="deleteItem('btn-{{ $attribute->id }}')" data-form-id="form-{{ $attribute->id }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form action="{{ route('admin.bikes.destroy-attribute', $attribute->id) }}" method="post" id="form-{{ $attribute->id }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{ $attributes->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header"><h4>Imagens da moto {{ $bike->name }}</h4></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div id="image" role="tablist" aria-multiselectable="true">
                                        <div class="card" style="box-shadow: none">
                                            <div class="card-header" role="tab" id="section1HeaderId">
                                                <h5 class="mb-0">
                                                    <a data-toggle="collapse" data-parent="#image" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
                                                        Nova imagem
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                                                <div class="card-body">
                                                    <form action="{{ route('admin.bike-images.store') }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="bike_id" value="{{ $bike->id }}">
                                                        <div class="form-group">
                                                            <label for="path">Seleciona a imagem</label>
                                                            <input type="file" name="image_path" id="path" class="form-control">
                                                        </div>
                                                        <button class="btn btn-success" type="submit">Adicionar</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                @foreach($images as $image)
                                    <div class="col-sm-2">
                                        <div class="card-deck">
                                            <div class="card">
                                                <img class="card-img-top" src="{{ asset($image->path) }}" alt="">
                                                <div class="card-body">
                                                    <p class="card-text">Registrado em: {{ $image->created_at->format('d/m/Y') }}</p>
                                                    <form action="{{ route('admin.bike-images.destroy', $image->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm">Apagar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('css')
    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <style>
        .modal-backdrop.show {
            display: none;
        }
    </style>
@endpush
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="{{ asset('js/delete.js') }}"></script>
    <script>
        $('.numeric').maskMoney();
    </script>
@endpush
