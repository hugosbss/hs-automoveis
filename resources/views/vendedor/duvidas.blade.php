@extends('layouts.template')

@section('title', 'Dúvidas - HS Automoveis')

@section('content')
<div class="container mt-4">
    <h1>Dúvidas Frequentes (Vendedor)</h1>
    <p>Reunimos as perguntas mais comuns de nossos clientes vendedores para garantir que você tenha todas as informações necessárias para vender seu veículo com tranquilidade.</p>
    <h2>Perguntas Comuns:</h2>
    <dl>
        <dt><strong>Qual o prazo para a venda do meu carro?</strong></dt>
        <dd>O prazo varia conforme o modelo e as condições de mercado, mas nosso processo de avaliação e compra direta é imediato. Se optar por deixar o carro em consignação, o prazo médio é de 30 a 60 dias.</dd>
        <dt><strong>Preciso pagar alguma taxa para anunciar?</strong></dt>
        <dd>Não cobramos taxas para avaliação ou anúncio. Em caso de venda, nossa comissão é transparente e acordada previamente no contrato de consignação.</dd>
        <dt><strong>Meu carro precisa estar quitado?</strong></dt>
        <dd>Não necessariamente. Podemos intermediar a quitação do financiamento ou consórcio, descontando o valor do saldo devedor no momento do pagamento.</dd>
        <dt><strong>Como é feita a avaliação do meu veículo?</strong></dt>
        <dd>Nossa avaliação é baseada na tabela FIPE, ajustada pelo estado de conservação, quilometragem, opcionais e demanda de mercado.</dd>
    </dl>
    <p>Se sua dúvida não foi respondida, entre em contato com nossa equipe de suporte.</p>
</div>
@endsection
