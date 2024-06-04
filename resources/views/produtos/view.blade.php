@extends('layouts.app')

@section('title', 'Lista de Produtos')

@section('content')
<style>
    .card {
        width: 300px;
        height: 300px;
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 20px;
    }

    .card::before {
        content: "";
        z-index: -1;
        position: absolute;
        inset: 0;
        background: linear-gradient(-45deg, #f89b29 0%, #ff0f7b 100%);
        transform: translate3d(0, 0, 0) scale(0.95);
        filter: blur(20px);
    }

    .card:hover::before {
        filter: none;
    }

    .card .img-content {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(-45deg, #f89b29 0%, #ff0f7b 100%);
        transition: scale 0.6s, rotate 0.6s, filter 1s;
    }

    .card .img-content svg {
        width: 50px;
        height: 50px;
        fill: #e8e8e8;
        transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
    }

    .card .content {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        gap: 10px;
        color: #e8e8e8;
        padding: 20px;
        line-height: 1.5;
        border-radius: 5px;
        opacity: 0;

        transform: translateY(50px);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
    }

    .card .content .heading {
        font-size: 32px;
        font-weight: 700;
    }

    .card:hover .content {
        opacity: 1;
        transform: translateY(0);
    }

    .card:hover .img-content {
        scale: 2.5;
        rotate: 30deg;
    }

    .card:hover .img-content svg {
        fill: transparent;
    }

    /* Esta é a nova regra */
    .card:hover h2 {
        display: none;
    }

    .card .actions {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }

    .card .actions a {
        margin-right: 10px;
    }

    .cards {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .checkout-btn {
        margin-top: 20px;
        padding: 20px 0;
        border-radius: 25px;
        font-weight: 700;
        transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
        cursor: pointer;
        font-size: 20px;
        font-weight: 500;
        display: flex;
        align-items: center;
        border: none;
        justify-content: center;
        fill: #fff;
        color: #fff;
        border: 2px solid transparent;
        background: #d17842;
        transition: all 200ms;
    }

    .checkout-btn:active {
        scale: 0.95;
    }

    .checkout-btn:hover {
        color: #d17842;
        border: 2px solid #d17842;
        background: transparent;
    }

    .div-botao {
        display: flex;
        justify-content: center;
        padding: 20px;
    }

    .div-botao a {
        text-decoration: none;
    }

    .search {
        display: flex;
        align-items: center;
        justify-content: center:
        text-align: center;
        padding: 20px;
    }

    .search__input {
        font-family: inherit;
        font-size: inherit;
        background-color: #f4f2f2;
        border: none;
        color: #646464;
        padding: 0.7rem 1rem;
        border-radius: 30px;
        width: 100%;
        transition: all ease-in-out .5s;
        margin-right: -2rem;
    }

    .search__input:hover,
    .search__input:focus {
        box-shadow: 0 0 1em #00000013;
    }

    .search__input:focus {
        outline: none;
        background-color: #f0eeee;
    }

    .search__input::-webkit-input-placeholder {
        font-weight: 100;
        color: #ccc;
    }

    .search__input:focus+.search__button {
        background-color: #f0eeee;
    }

    .search__button {
        border: none;
        background-color: #f4f2f2;
        margin-top: .1em;
        border-radius: 15px;
    }

    .search__button:hover {
        cursor: pointer;
    }

    .search__icon {
        height: 1.3em;
        width: 1.3em;
        fill: #b4b4b4;
    }
</style>

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Produtos Cadastrados</h1>
        </div>
    </div>
    <div class="div-botao">
        <a href="{{ route('produtos-cadastro') }}" class="checkout-btn" type="submit" name="submit">Cadastrar novo
            produto</a>
    </div>
    <form action="{{ route('buscar-produtos') }}" method="GET" class="search-form">
        <div class="search">
            <input type="text" class="search__input" placeholder="Type your text" name="pesquisa"
                placeholder="Buscar produtos" aria-label="Buscar produtos">
            <button class="search__button">
                <svg class="search__icon" aria-hidden="true" viewBox="0 0 24 24">
                    <g>
                        <path
                            d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                        </path>
                    </g>
                </svg>
            </button>
        </div>
    </form>
    <div class="cards">
        @foreach($produtos as $produto)
            <div class="card">
                <div class="img-content">
                    <h2>{{ $produto->nome }}</h2>

                </div>
                <div class="content">
                    <h2>{{ $produto->nome }}</h2>
                    <p>R$ {{ $produto->valor }}</p>
                    <p>Quantidade: {{ $produto->quantidade }}</p>
                    <p>Data de cadastro: {{ $produto->validade }}</p>
                    <div class="actions">
                        <a href="{{ route('editar-produtos', ['id' => $produto->id]) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('excluir-produtos', ['id' => $produto->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @if ($produtos->count() == 0)
        <p class="text-center">Nenhum produto encontrado.</p>
    @endif
</div>
@endsection