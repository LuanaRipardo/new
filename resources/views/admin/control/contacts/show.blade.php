@extends('layouts.admin-master')

@section('title')
    Mensagens recebidas &mdash; {{ $contact->name }}
@endsection

@section('content')
    @include('components.notifications')
    <section class="section">
        <div class="section-header">
            <h1>Mensagem &mdash; {{ $contact->name }}</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $contact->name }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2 class="section-title" style="margin-top: 0">Dados pessoais</h2>
                                    <p>
                                        <b>Nome:</b> {{ $contact->name }}
                                    </p>
                                    <p>
                                        <b>Telefone:</b> {{ $contact->phone }}
                                    </p>
                                    <p>
                                        <b>E-mail:</b> <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <h2 class="section-title" style="margin-top: 0">Mensagem</h2>
                                    <p>
                                        {{ $contact->message }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer"><a href="#" class="btn btn-danger btn-xs" id="btn-{{ $contact->id }}"
                                                    onclick="deleteItem('btn-{{ $contact->id }}')"
                                                    data-form-id="form-{{ $contact->id }}">
                                <i class="fa fa-trash"></i> Apagar
                            </a>
                            <form action="{{ route('admin.contacts.destroy', $contact->id) }}"
                                  method="post" id="form-{{ $contact->id }}" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
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
