<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marketplace L6</title>

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 40px;">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('home')}}">Marketplace L6</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              @auth
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link @if(request()->is('admin/stores*')) active @endif" aria-current="page" href="{{route('admin.stores.index')}}">Lojas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(request()->is('admin/products*')) active @endif" href="{{route('admin.products.index')}}">Produtos</a>
              </li>

            </ul>
            <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link " aria-current="page" href="#" onclick="event.preventDefault(); document.querySelector('form.logout').submit(); ">Sair</a>
                      <form action="{{route('logout')}}" class="logout" method="POST" style="display:none;">
                        @csrf
                    </form>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link "> {{auth()->user()->name}}</span>
                    </li>
                  </ul>
            </div>
            @endauth
        </div>
      </nav>


    <div class="container">
        @yield('content')
    </div>

</body>
</html>
