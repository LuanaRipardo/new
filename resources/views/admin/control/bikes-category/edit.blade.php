@extends('layouts.admin-master')

@section('title')
    Adicionar nova moto
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Nova categoria</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.bike-category.update', $category->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <h4>Categoria</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Nome<span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control" required>
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
