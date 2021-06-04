@extends('layouts.principal.main')
@section('content')
    @component('layouts.principal.partials.top-internal-component', ['title' => 'Sobre a Moto Formosa'])
        <ul>
            <li>
                <a href="{{ route('home-site') }}">Início</a>
            </li>
            <li>Contato</li>
        </ul>
    @endcomponent
    <div class="container">
        <div class="overview-area pt-135">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="overview-content">
                            <h1 class="mb-3">Prepare-se para se surpreender <br> com o <strong>novo</strong></h1>
                            <p>
                                <span>Há 16 anos</span> no mercado, a <span>Moto Formosa</span> é uma das pioneiras em vendas, manutenção e consórcio da região, sempre promovendo ações para que a população possa realizar o sonho de ter uma <span>Honda</span>. Atualmente, a
                                concessionária possui quatro lojas e três pontos de vendas, sendo líder na região, oferecendo um atendimento diferenciado de alta qualidade em instalações de primeira linha.
                            </p>
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

    <div class="services-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single-services orange mb-30 text-center">
                        <div class="services-icon">
                            <img alt="" src="https://image.flaticon.com/icons/svg/115/115778.svg" width="50">
                        </div>
                        <div class="services-text">
                            <h5>16 ANOS NO MERCADO</h5>
                            <p>Nossos clientes confiam em nós a mais de 16 anos</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-services yellow mb-30 text-center">
                        <div class="services-icon">
                            <img alt="" src="https://image.flaticon.com/icons/svg/1077/1077198.svg" width="50">
                        </div>
                        <div class="services-text">
                            <h5>MANUTENÇÃO</h5>
                            <p>Uma das pioneiras em manutenção</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-services purple mb-30 text-center">
                        <div class="services-icon">
                            <img src="https://image.flaticon.com/icons/svg/503/503080.svg" width="50">
                        </div>
                        <div class="services-text">
                            <h5>UMA MOTO FORMOSA PERTO DE VOCÊ</h5>
                            <p>Formosa, Planaltina, Campos Belos, Posse e São João d'Aliança</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-services sky mb-30 text-center">
                        <div class="services-icon">
                            <img src="https://image.flaticon.com/icons/svg/2344/2344228.svg" width="50">
                        </div>
                        <div class="services-text">
                            <h5>Melhores peças</h5>
                            <p>Tem as melhores peças, equipamentos e acessórios</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top: -100px;">@include('layouts.principal.partials.testmonials')</div>
@endsection
