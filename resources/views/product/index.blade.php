@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height container">
        <div class="content">
            <div class="title m-b-md">
                <h1>Produtos</h1>
                <a href="{{url('create')}}" class="btn btn-primary">Novo Produto</a>
                <br/><br/>
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">DESCRIÇÃO</th>
                        <th scope="col">AÇÃO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <th scope="row">{{ $product->COD_PRODUTO }}</th>
                        <td>{{ $product->DESCRICAO }}</td>
                        <td>
                            <a href='{{url("edit/$product->COD_PRODUTO")}}'>Editar</a>|<a href="">Excluir</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
    </script>
@endsection
