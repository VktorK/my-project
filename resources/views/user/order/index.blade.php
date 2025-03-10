

@section('title', 'Products')

    <x-app-layout>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="w-75">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Статус Заказ</th>
                    <th scope="col" class="text-center">Комментарий</th>
                    <th scope="col" class="text-center">Общая сумма заказа</th>
                    <th scope="col" class="text-center">Имя Фамилия покупателя</th>
                    <th scope="col" class="text-center">Действия</th>
                </tr>
                </thead>
                <tbody>
                @if(count($orderResource) === 0)
                    <tr>
                        <td colspan="7" class="text-center">Заказы не найдены</td>
                    </tr>
                @else
                    @foreach($orderResource as $order)
                        <tr>
                            <th scope="row" class="text-center">{{$order['id']}}</th>
                            <td class="text-center" style="cursor: pointer;">{{$order['order_status']}}</td>
                            <td class="text-center" style="cursor: pointer;">{{$order['comment'] ?? 'Комментарий отсутствует'}}</td>
                            <td class="text-center" style="cursor: pointer;">{{$order['total']}} руб.</td>
                            <td class="text-center" style="cursor: pointer;">{{$order['flName']}}</td>
                            <td class="text-center actions">
                                <form action="{{ route('user.order.destroy', $order['id']) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот продукт?');" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" style="cursor: pointer;"><i class="fas fa-trash"></i> Удалить</button>
                                </form>
                                @if($order['order_status'] != 'исполнен')
                                <div class="mr-5">
                                <form action="{{ route('orders.updateStatus', $order['id']) }}" method="POST" onsubmit="return confirm('Заказ был Вам доставлен');" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="order_status" value="{{ 'исполнен' }}">
                                    <button type="submit" class="btn btn-success btn-sm" style="cursor: pointer;"><i class="fas fa-trash"></i>Доставлено</button>
                                </form>
                                </div>
                                    "@endif
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        </tbody>
            </table>
        </div>
    </div>
        </x-app-layout>
