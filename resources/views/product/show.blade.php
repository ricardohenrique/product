@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height container">
        <div class="content">
            <div class="form-group">
                <p><strong>#ID: </strong> {{ $product->COD_PRODUTO }}</label>
                <p><strong>DESCRIÇÃO: </strong> {{ $product->DESCRICAO }}</label>
                <p><strong>categoria: </strong> {{ $product->category->DESCRICAO }}</label>
            </div>
            <div class="form-group">
                <a class="btn btn-primary btn-sm" href='{{url("edit/$product->COD_PRODUTO")}}'>Editar</a>
                <form method="POST" action='{{url("$product->COD_PRODUTO")}}'>
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </div>
        </div>
    </div>
    <style type="text/css">
        form{
            margin-top: 8px;
        }
    </style>
@endsection
