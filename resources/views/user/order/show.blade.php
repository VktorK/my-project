@extends('layout.app')

@section('title', 'Информация о товаре')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">{{ $product['title'] }}</h1>
        <p><strong>Цена:</strong> {{ $product['price'] }} руб</p>
        <p><strong>Категория:</strong> {{ $product['category_title'] }}</p>
        <p><strong>Описание:</strong> {{ $product['description'] }}</p>
        <div class="text-center mt-4">
            <a href="{{ route('user.products.edit', $product['id']) }}" class="btn btn-primary">Редактировать товар</a>
            <a href="{{ route('user.product.index') }}" class="btn btn-secondary">Назад к списку товаров</a>
        </div>
    </div>
@endsection
