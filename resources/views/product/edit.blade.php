@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height container">
        <div class="content">
            <form method="POST" action='{{url("/update/$product->COD_PRODUTO")}}'>
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="DESCRICAO">Descrição</label>
                    <textarea name="DESCRICAO" class="form-control" id="DESCRICAO" rows="3">{{ $product->DESCRICAO }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Categoria</label>
                    {{$product->COD_CATEGORIA}}
                    <select name="COD_CATEGORIA" class="form-control">
                        @foreach($categories as $category)
                            @if($category->COD_CATEGORIA == $product->COD_CATEGORIA)
                                <option selected="selected" value="{{ $category->COD_CATEGORIA }}">{{ $category->DESCRICAO }}</option>
                            @else
                                <option value="{{ $category->COD_CATEGORIA }}">{{ $category->DESCRICAO }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
            <form method="POST" action='{{url("$product->COD_PRODUTO")}}' class="btn-delete">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
    <style type="text/css">
        form.btn-delete{
            margin-top: 8px;
        }
    </style>
@endsection
