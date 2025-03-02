@extends('layout.app')

@section('title', 'Products')

@section('content')
    <x-app-layout>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="w-75">
            <form action="{{ route('user.order.store') }}" method="POST">
                @csrf
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Наименование товара</th>
                    <th scope="col" class="text-center">Цена</th>
                    <th scope="col" class="text-center">Категория товара</th>
                    <th scope="col" class="text-center">Количество</th>
                    <th scope="col" class="text-center">Общая сумма</th>
                    <th scope="col" class="text-center">Статус Заказ</th>
                    <th scope="col" class="text-center">Действия</th>
                </tr>
                </thead>
                <tbody>
                @if(count($userCartResource) === 0)
                    <tr>
                        <td colspan="7" class="text-center">Товары не найдены</td>
                    </tr>
                @else
                    @foreach($userCartResource as $product)
                        <tr>
                            <th scope="row" class="text-center">{{$product['id']}}</th>
                            <td class="text-center" onclick="window.location='{{ route('user.products.show', $product['id']) }}'" style="cursor: pointer;">{{$product['title']}}</td>
                            <td class="text-center" onclick="window.location='{{ route('user.products.show', $product['id']) }}'" style="cursor: pointer;">{{$product['price']}} руб</td>
                            <td class="text-center" onclick="window.location='{{ route('user.products.show', $product['id']) }}'" style="cursor: pointer;">{{$product['category_title']}}</td>
                            <td class="text-center" onclick="window.location='{{ route('user.products.show', $product['id']) }}'" style="cursor: pointer;">{{$product['qty']}}</td>
                            <td class="text-center" onclick="window.location='{{ route('user.products.show', $product['id']) }}'" style="cursor: pointer;">{{$product['total_sum']}} руб</td>
                            <td class="text-center" onclick="window.location='{{ route('user.products.show', $product['id']) }}'" style="cursor: pointer;">{{$product['order_status']}}</td>
                            <td class="text-center actions">
                                <a href="{{ route('user.products.edit', $product['id']) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Обновить</a>
                                <div class="ml-5">
                                <form action="{{ route('user.products.destroy', $product['id']) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот продукт?');" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" style="cursor: pointer;"><i class="fas fa-trash"></i>Удалить</button>
                                </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        </tbody>
            </table>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Создать заказ</button>
            </div>
            </form>
        </div>
    </div>
    </x-app-layout>
@endsection
