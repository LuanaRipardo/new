@extends('layouts.admin-master')

@section('title')
    Motos registradas
@endsection

@section('content')
    @include('components.notifications')
    <section class="section">
        <div class="section-header">
            <h1>Listagem de motos</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Motos <span>({{ $bikes->total() }})</span></h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.bikes.create') }}" class="btn btn-primary">Adicionar <i
                                        class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped table-md">
                                <tbody>
                                <tr>
                                    <th>Nome</th>
                                    <th>RPM</th>
                                    <th>Ano</th>
                                    <th>Registrado em</th>
                                    <th></th>
                                </tr>
                                @foreach($bikes as $bike)
                                    <tr>
                                        <td><span class="badge badge-light">{{ $bike->name }}</span></td>
                                        <td>{{ $bike->rpm }}</td>
                                        <td>
                                            <span class="badge badge-primary">{{ $bike->year }}</span>
                                        </td>
                                        <td>{{ $bike->created_at_formatted }}</td>
                                        <td class="text-right">
                                            <a href="#" class="btn btn-danger btn-xs" id="btn-{{ $bike->id }}" onclick="deleteItem('btn-{{ $bike->id }}')" data-form-id="form-{{ $bike->id }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form action="{{ route('admin.bikes.destroy', $bike->id) }}" method="post" id="form-{{ $bike->id }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a href="{{ route('admin.bikes.edit', $bike->id) }}" class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            {{ $bikes->links() }}
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
