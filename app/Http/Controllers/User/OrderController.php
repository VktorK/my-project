<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Order\Cart\StoreCartRequest;
use App\Http\Requests\User\Order\UserOrderStoreRequest;
use App\Http\Requests\User\Order\UserOrderUpdateRequest;
use App\Http\Resources\User\Order\OrderIndexResource;
use App\Http\Resources\User\Order\UserOrderStoreResource;
use App\Http\Resources\User\Product\UserProductUpdateResource;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Services\User\OrderService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use function Sodium\compare;

class OrderController extends Controller
{
    public function index(): Factory|View|Application
    {
        $order = OrderService::index();
        $orderResource = OrderIndexResource::collection($order)->resolve();
//        dd($orderResource);
        return view('user/order/index', compact('orderResource'));
    }

    public function show(Order $order): Factory|View|Application
    {
        $order = OrderIndexResource::make($order)->resolve();
        return view('user/order/show', compact('order'));
    }

    public function store(UserOrderStoreRequest $request): Factory|View|Application
    {
        $data = $request->validated();
        $order = OrderService::store($data)->resolve();
        $resourceOrder = UserOrderStoreResource::make($order)->resolve();
        return view('user/product/index', compact('resourceOrder'));

    }

    public function edit($id): Factory|View|Application
    {
        $order = Order::findOrFail($id);
        return view('user/order/edit', compact('order'));

    }

    public function update(UserOrderUpdateRequest $request,Order $order,): RedirectResponse
    {
        $data = $request->validated();
        $order = OrderService::update($order, $data);
        $resourceOrder = UserProductUpdateResource::make($order)->resolve();
        return redirect()->route('user.product.index',compact('resourceOrder'))->with('success', 'Продукт успешно обновлён');
    }

    public function destroy(Order $product): RedirectResponse
    {
        OrderService::destroy($product);
        return redirect()->route('user.order.index');
    }
}
