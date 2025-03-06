

@section('title', 'Информация о товаре')

    <x-app-layout>
    <div class="container mt-5">
        <h1 class="text-center">Заказчик : {{ $resourceOrder['fio'] }}</h1>
        <p><strong>Статус заказа:</strong> {{ $resourceOrder['order_status'] }} руб</p>
        <p><strong>Комментарий к Заказу:</strong> {{ $resourceOrder['comment'] }}</p>
        <p><strong>Полная сумма всего заказа составляет:</strong> {{ $resourceOrder['total'] }} руб.</p>
        <div class="text-center mt-4">
            <a href="{{ route('user.product.index') }}" class="btn btn-secondary">Назад к списку заказов</a>
        </div>
    </div>
        </x-app-layout>

