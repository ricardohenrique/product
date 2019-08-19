@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height container">
        <div class="content">
            <form method="POST" action="{{url('/store')}}">
                @csrf
                <div class="form-group">
                    <label for="DESCRICAO">Descrição</label>
                    <textarea name="DESCRICAO" class="form-control" id="DESCRICAO" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Categoria</label>
                    <select name="COD_CATEGORIA" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{ $category->COD_CATEGORIA }}">{{ $category->DESCRICAO }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection
