@extends('layouts.admin-master')

@section('title')
    Administração do portfólio
@endsection

@section('content')
    @include('components.notifications')
    <section class="section">
        <div class="section-header">
            <h1>Administração de imagens</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Imagens <span>({{ $images->total() }})</span></h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">Adicionar <i
                                        class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped table-md">
                                <tbody>
                                <tr>
                                    <th>Imagem</th>
                                    <th></th>
                                </tr>
                                @foreach($images as $image)
                                    <tr>
                                        <td><img src="{{ $image->path == null ? 'https://via.placeholder.com/100x100' : asset($image->path) }}" width="50" alt=""></td>
                                        <td class="text-right">
                                            <a href="#" class="btn btn-danger btn-xs" id="btn-{{ $image->id }}" onclick="deleteItem('btn-{{ $image->id }}')" data-form-id="form-{{ $image->id }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form action="{{ route('admin.portfolio.destroy', $image->id) }}" method="post" id="form-{{ $image->id }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            {{ $images->links() }}
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
