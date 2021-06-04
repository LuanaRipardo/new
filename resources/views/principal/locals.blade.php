@extends('layouts.principal.main')
@section('content')
    @component('layouts.principal.partials.top-internal-component', ['title' => 'Nossas lojas'])
        <ul>
            <li>
                <a href="{{ route('home-site') }}">Início</a>
            </li>
            <li>Lojas</li>
        </ul>
    @endcomponent
    <div class="container mb-140">
        <div class="overview-area pt-135">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="overview-content">
                            <h1 class="mb-3">Onde encontrar concessionárias</h1>
                            <p>
                                Encontre uma <strong><span>Moto Formosa</span></strong> pertinho de você. Estamos em <strong><span>Formosa-GO</span></strong>, <strong><span>Planaltina-GO</span></strong>, <strong><span>São João d’Aliança-GO</span></strong>, <strong><span>Campos Belos-GO</span></strong> e <strong><span>Posse-GO</span></strong>. Com uma equipe preparada para melhor atendê-lo.
                            </p>
                            <div class="question-area">
                                <h4>TEM ALGUMA DÚVIDA? </h4>
                                <div class="question-contact">
                                    <div class="question-icon">
                                        <i class="icofont icofont-page text-white"></i>

                                    </div>
                                    <div class="question-content-number">
                                        <h6><a href="{{ route('contato.index') }}">Deixe sua mensagem</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="overview-img">
                            <img class="tilter" src="{{ asset('images/banner-1.svg') }}" style="width: 470px">
                        </div>
                    </div>
                </div>

                <div class="row mt-80">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-services orange mb-30 text-center">
                            <div class="services-icon">
                                <img alt="" src="{{ asset('principal/img/logo/logo.png') }}" width="150px">
                            </div>
                            <div class="services-text">
                                <h5>Formosa &mdash; GO</h5>
                                <p>Av. Tancredo Neves, 980 - St. Bosque, Formosa - GO</p>
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
                    <div class="col-lg-4 col-md-6">
                        <div class="single-services orange mb-30 text-center">
                            <div class="services-icon">
                                <img alt="" src="{{ asset('principal/img/logo/logo.png') }}" width="150px">
                            </div>
                            <div class="services-text">
                                <h5>Planaltina &mdash; GO</h5>
                                <p>QUADRA 01 MR 07 LOTE 24 - St. Leste, Planaltina - GO</p>
                                <div class="question-contact">
                                    <div class="question-icon">
                                        <i class="icofont icofont-phone text-white"></i>
                                    </div>
                                    <div class="question-content-number">
                                        <h6>(61) 3637 0505</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-services orange mb-30 text-center">
                            <div class="services-icon">
                                <img alt="" src="{{ asset('principal/img/logo/logo.png') }}" width="150px">
                            </div>
                            <div class="services-text">
                                <h5>São João d'Aliança &mdash; GO</h5>
                                <p>Av. Teotonio Fernandes Graças 410, São João D'Aliança - GO</p>
                                <div class="question-contact">
                                    <div class="question-icon">
                                        <i class="icofont icofont-phone text-white"></i>
                                    </div>
                                    <div class="question-content-number">
                                        <h6>(62) 3438 1184</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 offset-md-2">
                        <div class="single-services orange mb-30 text-center">
                            <div class="services-icon">
                                <img alt="" src="{{ asset('principal/img/logo/logo.png') }}" width="150px">
                            </div>
                            <div class="services-text">
                                <h5>Campos Belos &mdash; GO</h5>
                                <p>R. do Comércio, 4 - Vila Baiana, Campos Belos - GO, 73840-000</p>
                                <div class="question-contact">
                                    <div class="question-icon">
                                        <i class="icofont icofont-phone text-white"></i>
                                    </div>
                                    <div class="question-content-number">
                                        <h6>(62) 3451 1851</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-services orange mb-30 text-center">
                            <div class="services-icon">
                                <img alt="" src="{{ asset('principal/img/logo/logo.png') }}" width="150px">
                            </div>
                            <div class="services-text">
                                <h5>Posse &mdash; GO</h5>
                                <p>Av. Juscelino Kubitscheck de Oliveira, s/n - St. Guarani, Posse - GO, 73900-000</p>
                                <div class="question-contact">
                                    <div class="question-icon">
                                        <i class="icofont icofont-phone text-white"></i>
                                    </div>
                                    <div class="question-content-number">
                                        <h6>(62) 3481 1558</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
