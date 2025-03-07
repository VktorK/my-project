
@section('title', 'Products In Cart')
    <x-app-layout>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="w-75">
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
                        <td colspan="8" class="text-center">Товары в корзине не найдены</td>
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
                                <form action="{{ route('user.products.card.edit', $product['id']) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите изменить количество товара?');" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                    <button type="button" class="btn btn-success btn-sm" style="cursor: pointer;" onclick="showInput(this)">
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                    <div class="input-group" style="display: none; margin-top: 5px;" id="input-group">
                                        <input type="number" min="1" value="1" class="form-control" id="qty" name="qty" placeholder="Количество" style="width: auto; height: 10px; display: inline-block;">
                                        <button type="submit" class="btn btn-primary btn-sm">Изменить</button>
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="hideInput(this)">Отмена</button>
                                    </div>
                                </form>
                                <div class="ml-5">
                                <form action="{{ route('user.product.cart.delete', $product['id']) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот продукт?');" style="display: inline;">
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
            @if(count($userCartResource) > 0)
            <div class="text-center">
                <form action="{{ route('user.order.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="total" value="{{ $total_sum_products }}">
                    <button type="button" class="btn btn-success" onclick="showInputOrder(this)">Добавить комментарий</button>
                    <div class="input-group" style="display: none; margin-top: 5px; width: 816px;" id="input-group-order" >
                        <textarea class="form-control" style="width: 816px; margin-bottom: 5px;" id="comment" name="comment" placeholder="Введите ваш комментарий" rows="3"></textarea>
                        <button type="submit" class="btn btn-primary btn-sm rounded-button">Создать заказ</button>
                        <button type="button" class="btn btn-secondary btn-sm rounded-button" onclick="hideInputOrder(this)">Отмена</button>
                    </div>
                </form>
            </div>
            @endif
        </div>
    </div>
    </x-app-layout>

