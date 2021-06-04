@extends('layouts.principal.main')
@section('content')
    @component('layouts.principal.partials.top-internal-component', ['title' => 'Entre em contato'])
        <ul>
            <li>
                <a href="{{ route('home-site') }}">Início</a>
            </li>
            <li>Contato</li>
        </ul>
    @endcomponent

    <div class="container">
        <div class="overview-area mt-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="overview-content">
                            <h1 class="mb-3">Prepare-se para se surpreender <br> com o <strong>novo</strong></h1>
                            <p>A <strong><span>CB 1000R</span></strong> está sempre pronta para te levar aonde quiser. O seu motor de <strong><span>4 cilindros</span></strong> proporciona maior torque e mais potência na hora de pilotar,
                                garantindo uma melhor performance. Venha conhecer uma de nossas concessionárias e
                                <strong><span>garanta a sua Honda</span></strong>.</p>
                            <div class="question-area">
                                <h4>TEM ALGUMA DÚVIDA? </h4>
                                <div class="question-contact">
                                    <div class="question-icon">
                                        <i class="icofont icofont-phone text-white"></i>
                                    </div>
                                    <div class="question-content-number">
                                        <h6>(61) 3631-0918</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="overview-img">
                            <img class="tilter" src="{{ asset('principal/img/banner/banner-1.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-area mt-30">
        <div class="all-info ptb-130">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-info-wrapper">
                            <h4 class="contact-title">NOSSAS LOJAS</h4>
                            <div class="communication-info">
                                <div class="single-communication">
                                    <div class="communication-icon">
                                        <i class="ti-home" aria-hidden="true"></i>
                                    </div>
                                    <div class="communication-text">
                                        <h4>Formosa:</h4>
                                        <p>Av. Tancredo Neves, 980 - St. Bosque, Formosa - GO &mdash; (61) 3631-0918</p>
                                    </div>
                                </div>
                                <div class="single-communication">
                                    <div class="communication-icon">
                                        <i class="ti-home" aria-hidden="true"></i>
                                    </div>
                                    <div class="communication-text">
                                        <h4>Planaltina:</h4>
                                        <p>QUADRA 01 MR 07 LOTE 24 - St. Leste, Planaltina - GO &mdash; (61) 3637 0505</p>
                                    </div>
                                </div>
                                <div class="single-communication">
                                    <div class="communication-icon">
                                        <i class="ti-home" aria-hidden="true"></i>
                                    </div>
                                    <div class="communication-text">
                                        <h4>São João d’Aliança:</h4>
                                        <p>Av. Tancredo Neves, 980 - St. Bosque, Formosa - GO, 73802-005 &mdash; (62) 3438 1184</p>
                                    </div>
                                </div>
                                <div class="single-communication">
                                    <div class="communication-icon">
                                        <i class="ti-home" aria-hidden="true"></i>
                                    </div>
                                    <div class="communication-text">
                                        <h4>Campos Belos:</h4>
                                        <p>R. do Comércio, 4 - Vila Baiana, Campos Belos - GO, 73840-000 &mdash; (62) 3451 1851</p>
                                    </div>
                                </div>
                                <div class="single-communication">
                                    <div class="communication-icon">
                                        <i class="ti-home" aria-hidden="true"></i>
                                    </div>
                                    <div class="communication-text">
                                        <h4>Posse:</h4>
                                        <p>Av. Juscelino Kubitscheck de Oliveira, s/n - St. Guarani, Posse - GO, 73900-000 &mdash; (62) 3481 1558</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-message-wrapper">
                            <h4 class="contact-title">DEIXE SUA MENSAGEM</h4>
                            <div class="contact-message">
                                <form action="{{ route('contato.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="contact-form-style mb-20">
                                                <input name="name" placeholder="Nome completo" type="text" style="background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg=='); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="contact-form-style mb-20">
                                                <input name="email" placeholder="Endereço de e-mail" type="email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="contact-form-style mb-20">
                                                <input name="phone" placeholder="Número de telefone" data-mask="(99) 9 9999-9999" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="contact-form-style">
                                                <textarea name="message" placeholder="Mensagem"></textarea>
                                                <button class="submit cr-btn btn-style" type="submit"><span>ENVIAR MENSAGEM</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
@endpush
