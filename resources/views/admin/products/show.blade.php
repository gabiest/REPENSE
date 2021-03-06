@extends('admin.templates.main')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center py-4 pr-5">
        <div class="">
            <h2 class="mb-4">{{$products->name}}</h2>
            <div class="">
                <a href="{{route('products.index')}}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
        <img class="imagem-outros" src="{{ asset('assets/admin/produto.svg') }}" alt="">
    </div>

    <h3 class="realce">Características</h3>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Quantidade</label>
                    <input class="form-control bg-light" type="text" placeholder="{{$products->quantity}}" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Tamanho</label>
                    <input class="form-control bg-light" type="text" placeholder="{{$products->size}}" readonly>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="">Cor</label>
                    <input class="form-control bg-light" type="text" placeholder="{{$products->color}}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Preço</label>
                    <input class="form-control bg-light" type="text" placeholder="{{$products->price}}" readonly>
                </div>

            </div>
            <div class="form-group">
                <label for="">Descrição</label>
                <textarea class="form-control bg-light" type="text" rows="3" placeholder="{{$products->description}}" readonly></textarea>
            </div>
        </div>
        <div class="col-md-4">
            <img class="imagem-produto" src="{{asset('storage/'.$products->image)}}" alt="Imagem do produto">
        </div>
    </div>

</div>
@endsection