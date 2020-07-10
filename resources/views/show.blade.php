@extends('layout')

@section('content')
<h1 class="mt-3 mb-3">Single Product Page</h1>
<div class="card" style="width: 26rem;">
    <img class="card-img-top" src="{{ asset('/storage') . "/" . explode(",", $product->pictures)[0] }}" alt="Card image cap" style="max-height: 300px;">
    <div class="card-body">
      <h5 class="card-title">{{ $product->title }}</h5>
      <p class="card-text">Стоимость: {{ $product->price }}</p>
      <p class="card-text">Цвет: {{ $product->color }}</p>
      <p class="card-text">Размер: {{ $product->size }}</p>
      <p class="card-text">Каталог: {{ $product->catalog->title }}</p>
    </div>
</div>
<div class="slider">
    @foreach(explode(",", $product->pictures) as $path)
        <div class="slider__item">
            <img src="{{ asset('/storage') . "/" . $path }}" alt="" style="width: 300px; height: 300px;">
        </div>
    @endforeach
</div>
<script>
    $( document ).ready(function() {
        $('.slider').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true
        });
    });
</script>
@endsection