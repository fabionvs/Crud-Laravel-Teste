@extends('layouts.app')
@section('css')
    <style>
        a.follow {
            position: absolute;
            left: 0;
            top: 0;
            padding: 10px;
            color: #fff !important;
            z-index: 9999;
            font-family: 'Helvetica';
            font-size: 11px;
            text-transform: uppercase;
            text-decoration: none;
            opacity: .5;
        }

        .card {
            position: relative;
            display: block;
            margin-bottom: .75rem;
            background-color: #fff;
            border: 1px solid #e5e5e5;
            border-radius: .25rem;
        }

        .card-block {
            padding: 1.25rem;
        }

        a.follow svg {
            vertical-align: middle;
            margin-right: 5px;
        }

        a.follow span {
            display: none;
        }

        a.follow:hover {
            opacity: 1;
        }

        a.follow:hover span {
            display: inline;
        }

        body {
            font-family: 'Open Sans', arial;
        }

        html, body {
            min-height: 100%;
            height: 100%;
            background: #f4f4f4;
        }

        .demo-container {
            display: table;
            width: 100%;
            height: 100%;
        }

        .demo-container-inner {
            display: table-cell;
            vertical-align: middle;
        }

        .contents {
            width: 80%;
            margin: auto;
        }

        .s10 {
            height: 10px;
        }

        h1 {
            margin-bottom: 40px;
            font-weight: 300;
            color: #999;
        }

        .flipable {
            -webkit-perspective: 80;
            perspective: 80;
            position: relative;
            display: inline-block;
        }

        .flipable .flipable-group {
            -webkit-transition: 0.3s;
            transition: 0.3s;
            -webkit-transform-origin: center;
            transform-origin: center;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
        }

        .flipable .flipable-group > *:nth-child(1), .flipable .flipable-group > *:nth-child(2) {
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            z-index: 2;
            top: 0;
            left: 0;
        }

        .flipable .flipable-group > *:nth-child(1) {
            position: relative;
            z-index: 1;
        }

        .flipable .flipable-group > *:nth-child(2) {
            -webkit-transform: rotatex(180deg);
            transform: rotatex(180deg);
            position: absolute;
        }

        .flipable.flipped .flipable-group {
            -webkit-transform: rotatex(180deg);
            transform: rotatex(180deg);
        }


        .form-control {
            border-width: 0 0 1px 0;
            border-radius: 0;
            background: transparent;
            color: #000;
            padding: .375rem 0;
        }

        .form-control:focus {
            border-color: #000;
            outline: 0;
        }

        .btn:focus, .btn:active {
            outline: 0 !important;
            box-shadow: none !important;
        }

        .card {
            border-color: #ccc;
        }

        .card .card-title {
            color: #fc5830;
        }

        .cart-price {
            font-size: 1.5rem;
        }

        .add-to-cart span, .remove-from-cart span {
            pointer-events: none;
        }

        .add-to-cart {
            background-color: #fc5830;
            border-color: #fc5830;
        }

        .add-to-cart:hover, .add-to-cart:active, .add-to-cart:focus, .add-to-cart:active:focus {
            background-color: #fc4417;
            border-color: #fc4417;
        }

        .checkout-form {
            color: white;
            padding: 20px;
            z-index: 998;
            top: 50px;
            right: 10px;
            background-color: #fff;
            -webkit-transition: right 0.5s;
            transition: right 0.5s;
            position: absolute;
            width: 420px;
            color: white;
            -webkit-clip-path: inset(0 0 100% 0);
            clip-path: inset(0 0 100% 0);
            -webkit-transition: -webkit-clip-path 0.2s;
            transition: -webkit-clip-path 0.2s;
            transition: clip-path 0.2s;
            transition: clip-path 0.2s, -webkit-clip-path 0.2s;
            border-radius: 0 0 3px 3px;
        }

        .btn-submit {
            background-color: #0da58e;
        }

        .btn-checkout {
            width: 50px;
            height: 50px;
            position: absolute;
            top: 10px;
            right: -60px;
            z-index: 999;
            background-color: #0da58e;
            border-radius: 3px;
            -webkit-transition: all .2s;
            transition: all .2s;
            overflow: hidden;
            cursor: pointer;
        }

        .btn-checkout > .cart-icon {
            width: 50px;
            height: 50px;
            position: absolute;
            top: 0;
            right: 0;
            text-align: center;
            line-height: 50px;
            color: white;
        }

        .btn-checkout span:nth-child(2) {
            position: absolute;
            left: 0;
            line-height: 50px;
            color: white;
            width: 390px;
            text-align: center;
            font-weight: 300;
            text-transform: uppercase;
        }

        .btn-checkout > .close-cart-icon {
            display: none;
        }

        .btn-checkout:hover {
            width: 390px;
        }

        .enable-checkout .btn-checkout {
            right: 10px;
        }

        .overlay {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background-color: black;
            z-index: 989;
            opacity: 0;
            -webkit-transition: opacity 0.2s;
            transition: opacity 0.2s;
            pointer-events: none;
        }

        .card-wrapper {
            opacity: 0;
            -webkit-transition: opacity .1s;
            transition: opacity .1s;
        }

        body.open-checkout .overlay {
            opacity: .8;
            pointer-events: initial;
        }

        body.open-checkout .btn-checkout {
            width: 420px;
            border-radius: 3px 3px 0 0;
        }

        body.open-checkout .checkout-form {
            -webkit-clip-path: inset(0 0 0% 0);
            clip-path: inset(0 0 0% 0);
        }

        body.open-checkout .checkout-form .card-wrapper {
            opacity: 1;
        }

        .jp-card-logo.jp-card-amex {
            text-transform: uppercase;
            font-size: 4px;
            font-weight: bold;
            color: white;
            background-image: -webkit-repeating-radial-gradient(center circle, #FFF 1px, #999 2px);
            background-image: repeating-radial-gradient(circle at center, #FFF 1px, #999 2px);
            border: 1px solid #EEE;
        }

        .jp-card-logo.jp-card-amex:before {
            height: 28px;
            content: "american";
            top: 3px;
            text-align: left;
            padding-left: 2px;
            padding-top: 11px;
            background: #267AC3;
        }

        .jp-card-logo.jp-card-amex:after {
            content: "express";
            bottom: 11px;
            text-align: right;
            padding-right: 2px;
        }

        .jp-card.jp-card-amex.jp-card-identified .jp-card-front:before,
        .jp-card.jp-card-amex.jp-card-identified .jp-card-back:before {
            background-color: #108168;
        }

        .jp-card-logo.jp-card-discover {
            background: #FF6600;
            color: #111;
            text-transform: uppercase;
            font-style: normal;
            font-weight: bold;
            font-size: 10px;
            text-align: center;
            overflow: hidden;
            z-index: 1;
            padding-top: 9px;
            letter-spacing: .03em;
            border: 1px solid #EEE;
        }

        .jp-card-logo.jp-card-discover:before {
            background: white;
            width: 200px;
            height: 200px;
            border-radius: 200px;
            bottom: -5%;
            right: -80%;
            z-index: -1;
        }

        .jp-card-logo.jp-card-discover:after {
            width: 8px;
            height: 8px;
            border-radius: 4px;
            top: 10px;
            left: 27px;
            background-color: #FF6600;
            background-image: -webkit-radial-gradient(#ff6600, #ffffff);
            background-image: radial-gradient(#ff6600, #ffffff);
            content: "network";
            font-size: 4px;
            line-height: 24px;
            text-indent: -7px;
        }

        .jp-card.jp-card-discover.jp-card-identified .jp-card-front:before,
        .jp-card.jp-card-discover.jp-card-identified .jp-card-back:before {
            background-color: #86B8CF;
        }

        .jp-card.jp-card-discover.jp-card-identified .jp-card-front:after {
            -webkit-transition: 400ms;
            transition: 400ms;
            content: " ";
            display: block;
            background-color: #FF6600;
            background-image: -webkit-linear-gradient(#FF6600, #ffa366, #FF6600);
            background-image: linear-gradient(#FF6600, #ffa366, #FF6600);
            height: 50px;
            width: 50px;
            border-radius: 25px;
            position: absolute;
            left: 100%;
            top: 15%;
            margin-left: -25px;
            box-shadow: inset 1px 1px 3px 1px rgba(0, 0, 0, 0.5);
        }

        .jp-card-logo.jp-card-visa {
            background: white;
            color: #1A1876;
        }

        .jp-card-logo.jp-card-visa:before {
            background: #1A1876;
        }

        .jp-card-logo.jp-card-visa:after {
            background: #E79800;
        }

        .jp-card.jp-card-visa.jp-card-identified .jp-card-front:before,
        .jp-card.jp-card-visa.jp-card-identified .jp-card-back:before {
            background-color: #191278;
        }

        .jp-card-logo.jp-card-mastercard {
            color: white;
            font-weight: bold;
            text-shadow: none !important;
        }

        .jp-card-logo.jp-card-mastercard:before,
        .jp-card-logo.jp-card-mastercard:after {
            border-radius: 18px;
        }

        .jp-card-logo.jp-card-mastercard:before {
            background: #FF0000;
        }

        .jp-card-logo.jp-card-mastercard:after {
            background: #FFAB00;
        }

        .jp-card.jp-card-mastercard.jp-card-identified .jp-card-front:before,
        .jp-card.jp-card-mastercard.jp-card-identified .jp-card-back:before {
            background-color: #0061A8;
        }

        .jp-card-logo.jp-card-maestro {
            color: white;
            text-shadow: 1px 1px rgba(0, 0, 0, 0.6);
        }

        .jp-card-logo.jp-card-maestro:before {
            background: #0064CB;
        }

        .jp-card-logo.jp-card-maestro:after {
            background: #CC0000;
        }

        .jp-card.jp-card-maestro.jp-card-identified .jp-card-front:before,
        .jp-card.jp-card-maestro.jp-card-identified .jp-card-back:before {
            background-color: #0B2C5F;
        }

        .jp-card-logo.jp-card-dankort {
            border-radius: 8px;
            border: #000000 1px solid;
            background-color: #FFFFFF;
        }

        .jp-card-logo.jp-card-dankort .dk:before {
            background-color: #ED1C24;
            border-radius: 6px;
        }

        .jp-card-logo.jp-card-dankort .dk:after {
            border-style: solid;
            border-width: 7px 7px 10px 0;
            border-color: transparent #ED1C24 transparent transparent;
        }

        .jp-card-logo.jp-card-dankort .d,
        .jp-card-logo.jp-card-dankort .k {
            background: white;
        }

        .jp-card-logo.jp-card-dankort .d:before {
            background: #ED1C24;
            border-radius: 2px 4px 6px 0px;
        }

        .jp-card-logo.jp-card-dankort .k:before {
            border-width: 8px 5px 0 0;
            border-color: #ED1C24 transparent transparent transparent;
        }

        .jp-card-logo.jp-card-dankort .k:after {
            border-width: 0 5px 8px 0;
            border-color: transparent transparent #ED1C24 transparent;
        }

        .jp-card.jp-card-dankort.jp-card-identified .jp-card-front:before,
        .jp-card.jp-card-dankort.jp-card-identified .jp-card-back:before {
            background-color: #0055C7;
        }

        .jp-card-logo.jp-card-elo .o {
            position: relative;
            display: inline-block;
            width: 12px;
            height: 12px;
            right: 0;
            top: 7px;
            border-radius: 100%;
            background-image: -webkit-linear-gradient(yellow 50%, red 50%);
            background-image: linear-gradient(yellow 50%, red 50%);
            -webkit-transform: rotate(40deg);
            transform: rotate(40deg);
            text-indent: -9999px;
        }

        .jp-card-logo.jp-card-elo .o:before {
            content: "";
            position: absolute;
            width: 49%;
            height: 49%;
            background: black;
            border-radius: 100%;
            text-indent: -99999px;
            top: 25%;
            left: 25%;
        }

        .jp-card.jp-card-elo.jp-card-identified .jp-card-front:before,
        .jp-card.jp-card-elo.jp-card-identified .jp-card-back:before {
            background-color: #6F6969;
        }

        .jp-card .jp-card-front,
        .jp-card .jp-card-back {
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.3) !important;
            border: 2px solid white !important;
        }

        .jp-card .jp-card-front:before,
        .jp-card .jp-card-back:before {
            border-radius: 10px;
        }

        .jp-card .jp-card-front .jp-card-display,
        .jp-card .jp-card-back .jp-card-display {
            color: white;
            font-weight: normal;
            opacity: 1;
        }

        .jp-card .jp-card-front .jp-card-shiny,
        .jp-card .jp-card-back .jp-card-shiny {
            background: rgba(255, 255, 255, 0.5) !important;
        }

        .jp-card .jp-card-front .jp-card-shiny:before,
        .jp-card .jp-card-back .jp-card-shiny:before {
            background: rgba(255, 255, 255, 0.5) !important;
        }

        .jp-card .jp-card-back .jp-card-bar {
            background-color: #444;
            background-image: -webkit-linear-gradient(#444, #333);
            background-image: linear-gradient(#444, #333);
        }

        .jp-card .jp-card-back:after {
            background-color: #FFF;
            background-image: -webkit-linear-gradient(#FFF, #FFF);
            background-image: linear-gradient(#FFF, #FFF);
        }

        .jp-card .jp-card-back .jp-card-shiny:after {
            content: "This card has been issued by Jesse Pollak and is licensed for anyone to use anywhere for free.AIt comes with no warranty.A For support issues, please visit: github.com/jessepollak/card.";
            position: absolute;
            left: 120%;
            top: 5%;
            color: white;
            font-size: 7px;
            width: 230px;
            opacity: .5;
        }

        .jp-card.jp-card-identified {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        .jp-card.jp-card-identified .jp-card-front,
        .jp-card.jp-card-identified .jp-card-back {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .jp-card.jp-card-identified .jp-card-front .jp-card-logo,
        .jp-card.jp-card-identified .jp-card-back .jp-card-logo {
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.3);
        }

        .jp-card.jp-card-identified .jp-card-front:before,
        .jp-card.jp-card-identified .jp-card-back:before {
            background-image: none !important;
        }

        .cart-price {
            font-family: "Raleway", sans-serif;
            font-size: 28px;
            font-weight: 400;
            letter-spacing: 2px;
            margin: 0;
            padding: 0;
            text-transform: uppercase;
        }

        .form-container {
            color: #000;
        }

        .pt-2 {
            padding-top: 6px;
        }

        .input-number {
            border-bottom: 0px;
        }
    </style>
@endsection
@section('content')
    <div class="btn-checkout">
        <span class="fa fa-shopping-cart cart-icon"></span>
        <span>Finalizar Compra</span>
    </div>
    <div class="checkout-form" id="pedido-form">
        {!! Form::open(['route' => 'pedidos.store']) !!}
        <div class="card-wrapper">
        </div>
        <div class="s10"></div>
        <div class="form-container active">
            <h3>Quantidades</h3>
            <div id="product-list">
            </div>
            <h3>Informações</h3>
            <div class="row">
                <div class="col-xs-12">
                    {!! Form::number('solicitante', null, ['class' => 'form-control', 'placeholder' => 'Solicitante']) !!}
                </div>
            </div>
            <div class="s10"></div>
            <div class="row">
                <div class="col-xs-12">
                    {!! Form::number('despachante', null, ['class' => 'form-control', 'placeholder' => 'Despachante']) !!}
                </div>
            </div>
            <div class="s10"></div>
            <h3>Endereço do Solicitante</h3>
            <div class="row">
                <div class="col-xs-6">
                    <input placeholder="CEP" type="text" name="cep" class="form-control">
                </div>
                <div class="col-xs-6">
                    <input placeholder="UF" type="text" name="uf" class="form-control" maxlength="2">
                </div>
                <div class="col-xs-6">
                    <input placeholder="Município" type="text" name="uf" class="form-control">
                </div>
                <div class="col-xs-6">
                    <input placeholder="Bairro" type="text" name="uf" class="form-control">
                </div>
                <div class="col-xs-8">
                    <input placeholder="Rua" type="text" name="uf" class="form-control">
                </div>
                <div class="col-xs-4">
                    <input placeholder="Número" type="text" name="uf" class="form-control">
                </div>
            </div>
            <div class="s10"></div>
            <div class="row">

                <div class="col-xs-12">
                    <button type="button" class="btn btn-primary btn-block postfix">Finalizar Compra
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="demo-container">
        <div class="demo-container-inner">
            <div class="container">

                <h1>Minha Loja Teste</h1>
                <div class="row">
                    @foreach($produtos as $produtos)
                        <div class="col-xs-12 col-md-4">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title">{!! $produtos->nome !!}</h4>
                                    @if ($produtos->quantidade > 0)
                                        <span class="label label-success pull-right">Disponível</span>
                                    @endif
                                    @if ($produtos->quantidade == 0)
                                        <span class="label label-danger pull-right">Indisponível</span>
                                    @endif
                                    <p class="card-text">Em estoque: <span
                                                class="badge">{!! $produtos->quantidade !!}</span></p>
                                </div>
                                <div class="card-block">
                                    <div class="pull-xs-right flipable" data-id="{!! $produtos->id !!}"
                                         data-nome="{!! $produtos->nome !!}">
                                        <div class="flipable-group">
                                            <button class="btn btn-primary add-to-cart"><i
                                                        class="fa fa-cart-plus"></i> Comprar
                                            </button>
                                            <button class="btn btn-danger remove-from-cart"><i
                                                        class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                    <h3 class="card-text cart-price pull-right">{!! $produtos->valor !!} R$</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>$(document).ready(function () {
            $('.add-to-cart, .remove-from-cart').on('click', function () {
                $(this).parents('.flipable').toggleClass('flipped product-added');
                if ($('.product-added').length > 0) {
                    $('body').addClass('enable-checkout');
                    $('body').addClass('open-checkout');
                    atualizaCarrinho();
                } else {
                    $('body').removeClass('enable-checkout');
                    $('body').removeClass('open-checkout');
                }
            });
            $('.btn-checkout').on('click', function () {
                $('body').toggleClass('open-checkout');
            });

            var card = new Card({
                // a selector or DOM element for the form where users will
                // be entering their information
                form: '.form-container.active', // *required*
                // a selector or DOM element for the container
                // where you want the card to appear
                container: '.card-wrapper', // *required*


                //width: 200, // optional — default 350px
                formatting: true, // optional - default true

                // Strings for translation - optional
                messages: {
                    validDate: 'valid\ndate', // optional - default 'valid\nthru'
                    monthYear: 'mm/yyyy', // optional - default 'month/year'
                },

                // Default placeholders for rendered fields - optional
                placeholders: {
                    number: '•••• •••• •••• ••••',
                    name: 'Full Name',
                    expiry: '••/••',
                    cvc: '•••'
                },

                // if true, will log helpful messages for setting up Card
                debug: true // optional - default false
            });

        })

        function atualizaCarrinho() {
            $('#product-list').html('');
            $('.product-added').each(function (index) {
                console.log($(this).attr('data-nome'), $(this).attr('data-id'));
                var row = '<div class="row"> <div class="col-xs-6 pt-2 text-center"> <label>' + $(this).attr('data-nome') + '</label> </div><div class="col-xs-4"> <div class="input-group"> <span class="input-group-btn"> <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[' + $(this).attr('data-id') + ']"> <span class="glyphicon glyphicon-minus"></span> </button> </span> <input type="hidden" name="product[' + $(this).attr('data-id') + ']" class="form-control input-number text-center" value="1"> <input type="text" name="quant[' + $(this).attr('data-id') + ']" class="form-control input-number text-center" value="1" min="1" max="10"> <span class="input-group-btn"> <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[' + $(this).attr('data-id') + ']"> <span class="glyphicon glyphicon-plus"></span> </button> </span> </div></div> <div class="col-xs-1"></div><button class="btn btn-danger"><i class="fa fa-times"></i></button></div>';
                $('#product-list').append(row);
                configInputs();
            });
        }


        function demo() {
            setTimeout(function () {
                $('.add-to-cart:eq(0)').click();
                setTimeout(function () {
                    $('.add-to-cart:eq(1)').click();
                    setTimeout(function () {
                        $('.btn-checkout').click()
                    }, 500);
                }, 500);
            }, 1500);
        }

        function configInputs() {
            //# sourceURL=pen.js
            //plugin bootstrap minus and plus
            //http://jsfiddle.net/laelitenetwork/puJ6G/
            $('.btn-number').click(function (e) {
                e.preventDefault();

                fieldName = $(this).attr('data-field');
                type = $(this).attr('data-type');
                var input = $("input[name='" + fieldName + "']");
                var currentVal = parseInt(input.val());
                if (!isNaN(currentVal)) {
                    if (type == 'minus') {

                        if (currentVal > input.attr('min')) {
                            input.val(currentVal - 1).change();
                        }
                        if (parseInt(input.val()) == input.attr('min')) {
                            $(this).attr('disabled', true);
                        }

                    } else if (type == 'plus') {

                        if (currentVal < input.attr('max')) {
                            input.val(currentVal + 1).change();
                        }
                        if (parseInt(input.val()) == input.attr('max')) {
                            $(this).attr('disabled', true);
                        }

                    }
                } else {
                    input.val(0);
                }
            });
            $('.input-number').focusin(function () {
                $(this).data('oldValue', $(this).val());
            });
            $('.input-number').change(function () {

                minValue = parseInt($(this).attr('min'));
                maxValue = parseInt($(this).attr('max'));
                valueCurrent = parseInt($(this).val());

                name = $(this).attr('name');
                if (valueCurrent >= minValue) {
                    $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
                } else {
                    alert('Sorry, the minimum value was reached');
                    $(this).val($(this).data('oldValue'));
                }
                if (valueCurrent <= maxValue) {
                    $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
                } else {
                    alert('Sorry, the maximum value was reached');
                    $(this).val($(this).data('oldValue'));
                }


            });
            $(".input-number").keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                    // Allow: Ctrl+A
                    (e.keyCode == 65 && e.ctrlKey === true) ||
                    // Allow: home, end, left, right
                    (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
        }
    </script>
@endsection
