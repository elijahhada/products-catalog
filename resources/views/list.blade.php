@extends('layout')

@section('content')
    <div class="container">
        <a href="{{ route('create') }}" class="btn btn-success mt-3 mb-3">Добавить продукт</a>
    </div>
    
    @foreach($products->chunk(3) as $chunk)
        <div class="row mb-3">
            @foreach($chunk as $product)
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('/storage') . "/" . explode(",", $product->pictures)[0] }}" alt="Card image cap" style="max-height: 150px;">
                        <div class="card-body">
                          <h5 class="card-title">{{ $product->title }}</h5>
                          <p class="card-text">Стоимость: {{ $product->price }}</p>
                          <p class="card-text">Цвет: {{ $product->color }}</p>
                          <p class="card-text">Размер: {{ $product->size }}</p>
                          <a href="{{ route('show', $product->id) }}" class="btn btn-primary">Подробнее</a>
                        </div>
                      </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection