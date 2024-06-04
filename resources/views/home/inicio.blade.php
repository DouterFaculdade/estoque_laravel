<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Controle de Estoque</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
</head>
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

<body>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <h1 class="navbar-brand">Controle de Estoque</h1>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>

  <main class="container mt-5">
    <div class="row">
      <div class="col-lg-6 mx-auto">
        <h1 class="text-center mb-4">Bem-vindo</h1>
        <p class="text-center">Clique no botão abaixo para acessar a lista de produtos cadastrados:</p>
        <div class="div-botao">
          <a href="{{ route('login') }}" class="checkout-btn" type="submit" name="submit">Lista de Produtos</a>
        </div>
      </div>
    </div>
  </main>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>
</body>

</html>