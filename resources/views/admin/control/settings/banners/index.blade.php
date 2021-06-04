@extends('layouts.admin-master')

@section('title')
    Configuração de banners
@endsection

@section('content')
    @include('components.notifications')
    <section class="section">
        <div class="section-header">
            <h1>Configuração de banners</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Banners <span>({{ $banners->total() }})</span></h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">Adicionar <i
                                        class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped table-md">
                                <tbody>
                                <tr>
                                    <th>Nome</th>
                                    <th>Posição</th>
                                    <th>Local</th>
                                    <th>Registrado em</th>
                                    <th></th>
                                </tr>
                                @foreach($banners as $banner)
                                    <tr>
                                        <td><span class="badge badge-light">{{ $banner->name }}</span></td>
                                        <td>{{ $banner->created_at_formatted }}</td>
                                        <td>
                                            <span class="badge badge-primary">Principal</span>
                                        </td>
                                        <td>{{ $banner->created_at_formatted }}</td>
                                        <td class="text-right">
                                            <a href="#" class="btn btn-danger btn-xs" id="btn-{{ $banner->id }}" onclick="deleteItem('btn-{{ $banner->id }}')" data-form-id="form-{{ $banner->id }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="post" id="form-{{ $banner->id }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            {{ $banners->links() }}
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
