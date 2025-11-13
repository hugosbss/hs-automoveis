@extends('layouts.template')

@section('title', 'Blog - HS Automoveis')

@section('content')
<div class="container mt-4">
    <h1>Blog HS Automoveis: Notícias e Dicas</h1>
    <p>Bem-vindo ao Blog da HS Automoveis, seu ponto de encontro para ficar por dentro das novidades do mercado automotivo, receber dicas de manutenção, guias de compra e venda, e análises aprofundadas sobre os modelos mais procurados.</p>
    
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://picsum.photos/300/200?random=1" class="card-img-top" alt="Imagem Quem Somos">
                <div class="card-body">
                    <h5 class="card-title">Conheça a História da HS Automoveis</h5>
                    <p class="card-text">Descubra nossa missão, visão e os valores que nos movem no mercado de veículos seminovos.</p>
                    <a href="{{ route('quem-somos' ) }}" class="btn btn-primary">Continuar Lendo</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://picsum.photos/300/200?random=2" class="card-img-top" alt="Imagem Como Comprar">
                <div class="card-body">
                    <h5 class="card-title">Guia Passo a Passo: Como Comprar Seu Carro Novo</h5>
                    <p class="card-text">Simplificamos o processo de compra. Veja nosso guia completo para garantir o melhor negócio.</p>
                    <a href="{{ route('como-comprar' ) }}" class="btn btn-primary">Continuar Lendo</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://picsum.photos/300/200?random=3" class="card-img-top" alt="Imagem Financiamento">
                <div class="card-body">
                    <h5 class="card-title">As Melhores Taxas de Financiamento para Seu Veículo</h5>
                    <p class="card-text">Conheça nossos parceiros e simule as condições ideais para financiar seu próximo carro.</p>
                    <a href="{{ route('financiamento' ) }}" class="btn btn-primary">Continuar Lendo</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://picsum.photos/300/200?random=4" class="card-img-top" alt="Imagem Seguro">
                <div class="card-body">
                    <h5 class="card-title">Proteção Completa: Por Que Fazer o Seguro Conosco?</h5>
                    <p class="card-text">Descubra as vantagens de cotar e fechar seu seguro automotivo com a HS Automoveis.</p>
                    <a href="{{ route('seguro' ) }}" class="btn btn-primary">Continuar Lendo</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://picsum.photos/300/200?random=5" class="card-img-top" alt="Imagem Vender Carro">
                <div class="card-body">
                    <h5 class="card-title">Venda Seu Carro de Forma Rápida e Segura</h5>
                    <p class="card-text">Nosso processo de avaliação e compra garante o melhor preço e a maior comodidade para você.</p>
                    <a href="{{ route('vender-carro' ) }}" class="btn btn-primary">Continuar Lendo</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://picsum.photos/300/200?random=6" class="card-img-top" alt="Imagem Dúvidas">
                <div class="card-body">
                    <h5 class="card-title">Tire Suas Dúvidas: FAQ para Compradores e Vendedores</h5>
                    <p class="card-text">Respostas para as perguntas mais frequentes sobre nossos serviços e transações.</p>
                    <a href="{{ route('duvidas' ) }}" class="btn btn-primary">Continuar Lendo</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://picsum.photos/300/200?random=7" class="card-img-top" alt="Imagem Termos de Uso">
                <div class="card-body">
                    <h5 class="card-title">Termos de Uso: Conheça Nossas Regras</h5>
                    <p class="card-text">Informações importantes sobre o uso do nosso website e os seus direitos e deveres.</p>
                    <a href="" class="btn btn-primary">Continuar Lendo</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://picsum.photos/300/200?random=8" class="card-img-top" alt="Imagem Privacidade">
                <div class="card-body">
                    <h5 class="card-title">Sua Privacidade é Nossa Prioridade</h5>
                    <p class="card-text">Leia nossa política e entenda como seus dados pessoais são coletados e protegidos.</p>
                    <a href="" class="btn btn-primary">Continuar Lendo</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://picsum.photos/300/200?random=9" class="card-img-top" alt="Imagem Cookies">
                <div class="card-body">
                    <h5 class="card-title">Política de Cookies: O Que Você Precisa Saber</h5>
                    <p class="card-text">Entenda como utilizamos cookies para melhorar sua experiência de navegação em nosso site.</p>
                    <a href="" class="btn btn-primary">Continuar Lendo</a>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
