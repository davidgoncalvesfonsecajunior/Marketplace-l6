@extends('layouts.app')


@section('content')

    @if (session('sucesso'))
    <div class="alert alert-success" role="alert">
        {{session('sucesso')}}

    @endif

 </div>

<div class="container">
    <a href="{{route('admin.products.create')}}" class="btn btn-lg btn-success">Criar Produto</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Loja</th>
                <th>Ações</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($products as $p )
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->name}}</td>
                <td>R$ {{number_format($p->price, 2, ',', '.')}}</td>
                <td>{{$p->store->name}}</td>
                <td>
                    <a href="{{route('admin.products.edit', ['product'=> $p->id])}}" class="btn btn-sn btn-primary">Editar</a>

                    <div class="btn-group">
                        <form action="{{route('admin.products.destroy', ['product'=> $p->id])}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-sn btn-danger">REMOVER</button>
                        </form>
                    </div>


                </td>
            </tr>

            @endforeach
        </tbody>
    </table>



            {{$products->links()}}



</div>

@endsection
