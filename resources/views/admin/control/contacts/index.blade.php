@extends('layouts.admin-master')

@section('title')
    Mensagens recebidas
@endsection

@section('content')
    @include('components.notifications')
    <section class="section">
        <div class="section-header">
            <h1>Mensagens recebidas</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Mensagens <span>({{ $contacts->total() }})</span></h4>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped table-md">
                                <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Telefone</th>
                                    <th>E-mail</th>
                                    <th>Lido?</th>
                                    <th>Registrado em</th>
                                    <th></th>
                                </tr>
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->id }}</td>
                                        <td><span class="badge badge-light w-100">{{ $contact->name }}</span></td>
                                        <td><span class="badge badge-info">{{ $contact->phone }}</span></td>
                                        <td><span class="badge badge-info">{{ $contact->email }}</span></td>
                                        <td>{!! $contact->read_formatted !!}</td>
                                        <td>{{ $contact->created_at_formatted }}</td>
                                        <td class="text-right">
                                            <a href="#" class="btn btn-danger btn-xs" id="btn-{{ $contact->id }}"
                                               onclick="deleteItem('btn-{{ $contact->id }}')"
                                               data-form-id="form-{{ $contact->id }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form action="{{ route('admin.contacts.destroy', $contact->id) }}"
                                                  method="post" id="form-{{ $contact->id }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a href="{{ route('admin.contacts.show', $contact->id) }}"
                                               class="btn btn-primary">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            {{ $contacts->links() }}
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
@push('css')
    <style>
        tr td {
            vertical-align: middle;
            text-align: center;
        }
    </style>
@endpush
